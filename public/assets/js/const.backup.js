import * as Helper from './helpers.js';

function Sidebar(sidebarID, openerID, closerID, activeClass) {
	this.sidebarSelector = '#'.concat(sidebarID);
	this.openerSelector  = '#'.concat(openerID);
	this.closerSelector  = '#'.concat(closerID);

	this.sidebar = $(this.sidebarSelector);
	this.opener = $(this.openerSelector);
	this.closer = $(this.closerSelector);
	this.activeClass = activeClass;

	this.open = function() {
		Helper.turnOffScrolling();
		this.sidebar.addClass(this.activeClass);
	}

	this.close = function() {
		Helper.turnOnScrolling();
		this.sidebar.removeClass(this.activeClass);
	}

	this.isActive = function() {
		if (this.sidebar.hasClass(this.activeClass)) {
			return true;
		}
			
		return false;
	}

	this.clickInSidebar = function(e) {
		if ( e.target.matches(''.concat(this.sidebarSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	this.isCloser = function(e) {
		if ( e.target.matches(''.concat(this.closerSelector, ', ', this.closerSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	this.isOpener = function(e) {
		if ( e.target.matches(''.concat(this.openerSelector, ', ', this.openerSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	$(document)
	.click((function(e) {

		if (this.isActive()) {
			if ( !this.clickInSidebar(e) || this.isCloser(e) ) {
				this.close();
			}
		} else {
			if ( this.isOpener(e) ) {
				e.preventDefault();
				this.open();
			}
		}

	}).bind(this))
	
	.keyup(function(e) {
		
		if (!this.isActive()) {
			return;	
		}

		if (e.keyCode === 27) {
			this.close();
		}

	}.bind(this));
}

function Counter(min, currentVal, max) {

	if (!new.target) {
		return new Counter(min, currentVal, max);
	}

	if (currentVal > max || currentVal < min) {
		throw 'min > currentval || currentval > max';
		return;
	}

	let countKey = Symbol('countKey');
	let maxKey   = Symbol('maxKey');
	let minKey   = Symbol('minKey');

	this[countKey] = +currentVal;
	this[maxKey]   = +max;
	this[minKey]   = +min;

	this.increment = function() {
		if (this[countKey] + 1 > this[maxKey]) {
			return;
		}

		return ++this[countKey];
	}

	this.decrement = function() {
		if (this[countKey] - 1 < this[minKey]) {
			return;
		}

		return --this[countKey];
	}

	Object.defineProperty(this, 'count', {
		get() {
			return this[countKey];
		},

		set(val) {
			this[countKey] = val;
		}
	});
}

function Bookmark(id) {
	this.productID = id;
	this.cookieKey = 'bookmarks['.concat(this.productID, ']');
	this.cookieExpirationDays = 90;
	this.activeClass = 'active';

	this.isAvailable = function() { 
		if (Helper.getCookie(this.cookieKey)) {
			return true;
		}

		return false;
	}

	this.add = function(callback = () => {}) {
		Helper.setCookie(
			this.cookieKey,
			this.productID,
			this.cookieExpirationDays
		);
		console.log(document.cookie);
		callback();
	}

	this.remove = function(callback = () => {}) {
		Helper.removeCookie(this.cookieKey);
		callback();
	}
}

function ColorChooser(
	container = '#colorChooser',
	activeClass = 'active',
	callback = () => {},
	multiple = false
) {
	this.activeClass = activeClass;
	this.callback = callback;
	this.multiple = multiple;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(
		Array.from($(container).children())
		.map(element => [element.dataset.color, element])
	);

	this.isAvailable = function(key) {
		return this.availableValues.has(key);
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			return this.selectedValues.has(key);
		}
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		
		if (this.isAvailable(key)) {

			$(this.availableValues.get(key))
			.removeClass(this.activeClass);

		} else {

			$(this.elements)
			.removeClass(this.activeClass);

		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			
			$(this.availableValues.get(key))
			.addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});

	for (let item of this.availableValues) {
		let [key, element] = item;

		$(element).click(e => {
			e.preventDefault();

			if (this.multiple) {
				if (this.isSelected(key)) {
					this.remove(key);
					this.markFalse(key);
				} else {
					this.select(key);
					this.mark(key);
				}
			} else {
				this.select(key);
				this.markFalse();
				this.mark(key);
			}
		});

		if ($(element).children().hasClass('active')) {
			this.select(key);
			this.mark(key);
		}
	}
}

function SizeChooser(
	container = '#sizeChooser',
	activeClass = 'active',
	callback = () => {},
	multiple = false
) {
	this.activeClass = activeClass;
	this.callback = callback;
	this.multiple = multiple;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(
		Array.from($(container).children())
		.map(element => [element.dataset.size, element])
	);

	this.isAvailable = function(key) {
		return this.availableValues.has(key);
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			return this.selectedValues.has(key);
		}
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		
		if (this.isAvailable(key)) {

			$(this.availableValues.get(key))
			.children()
			.removeClass(this.activeClass);

		} else {

			$(this.elements)
			.children()
			.removeClass(this.activeClass);

		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			
			$(this.availableValues.get(key))
			.children()
			.addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});

	for (let item of this.availableValues) {
		let [key, element] = item;

		$(element).click(e => {
			e.preventDefault();

			if (this.multiple) {
				if (this.isSelected(key)) {
					this.remove(key);
					this.markFalse(key);
				} else {
					this.select(key);
					this.mark(key);
				}
			} else {
				this.select(key);
				this.markFalse();
				this.mark(key);
			}
		});

		if ($(element).children().hasClass('active')) {
			this.select(key);
			this.mark(key);
		}
	}
}

function Quantity(container, currentVal = 1, callback = () => {}) {
	this.container = $(container);

	this.callback = callback;
	
	this.incrementer = this.container.children('.incrementer');
	this.decrementer = this.container.children('.decrementer');
	this.showing     = this.container.children('.showing');

	this.min = +this.showing.attr('min');
	this.max = +this.showing.attr('max');
	this.currentval = () => +$(this.showing).val();
	this.oldValue = null;

	this.counter = new Counter(
		this.min, 
		currentVal ? currentVal : this.currentval(), 
		this.max
	);

	this.show = (val) => this.showing.val(val);

	this.incrementer.click(e => {
		e.preventDefault();

		if (this.counter.increment()) {
			this.show(this.counter.count);
			this.callback(this.counter.count);
		}

	});

	this.decrementer.click(e => {
		e.preventDefault();

		if (this.counter.decrement()) {
			this.show(this.counter.count);
			this.callback(this.counter.count);
		}
	});

	Object.defineProperty(this, 'value', {
		get() {
			return this.counter.count;
		}
	});

	this.showing
	.click(e => e.preventDefault())
	.focus(() => this.oldValue = this.currentval())
	.change(e => {
		e.preventDefault();

		if (!isFinite(this.currentval())) {
			this.show(this.oldValue);

			return;
		}

		if (!(this.max >= this.currentval() && this.currentval() >= this.min)) {
			this.show(this.oldValue);

			return;
		}
		
		this.counter.count = this.currentval();
		this.callback(this.counter.count);
	});

	this.showing.val(this.counter.count);
}

function Basket() {
	
	this.products = function() {
		
		return (
			document.cookie.split('; ').map((cookie) => {
				let cookieParts = cookie.split('=');

				let [
					cookieKey,
					cookieVal
				] = cookieParts;

				if (cookieKey) {
					if (cookieKey.includes('basket[')) {
						try {
							return JSON.parse(cookieVal);
						} catch {
							Helper.removeCookie(cookieKey);
						}
					}
				}
			}).filter(item => item)
		);
	};

	this.bookmarkKeys = function() {
		return (
			document.cookie.split('; ').map(cookie => {
				let [cookieKey, value] = cookie.split('=');

				if (cookieKey) {
					if (cookieKey.includes('bookmarks[')) {
						return value;
					}
				}
			}).filter(item => item)
		);
	};

	this.total = function() {
		if (this.products().map((product) => product.price * product.quantity).length) {
			return this.products().map((product) => product.price * product.quantity).reduce((total, next) => total + next).toFixed(2);
		}

		return 0..toFixed(2);
	};

	this.showTotal = function() {
		$('#totalPrice').text(this.total());
	}

	this.quantities = this.products().map((productDetail) => {
		let product = new BasketItem(productDetail.id);
		
		let quantity = new Quantity(
			$("[data-quantity-id='".concat(productDetail.id, "']")), 
			
			productDetail.quantity,

			function(quantity) {
				productDetail.quantity = quantity;
				product.add(productDetail);

				this.showTotal();
			}.bind(this)
		);

		return quantity;
	});

	this.bookmarks = this.bookmarkKeys().map(bookmarkKey => {
		return new Bookmark(bookmarkKey);
	});

	this.showTotal();

	$('.like-button').each((index, element) => { 
		let bookmark = this.bookmarks[index];
		
		if (bookmark) {
			$(element).click((e) => {
				e.preventDefault();

				if (bookmark.isAvailable()) {
					bookmark.remove(() => $(element).removeClass('active'));
				} else {
					bookmark.add(() => $(element).addClass('active'));
				}
			});

			if (bookmark.isAvailable()) {
				$(element).addClass('active');
			}
		}

	});

	for (let product of this.products()) {

		$('.delete-button[data-target='.concat(product.id, ']')).click((e) => {
			e.preventDefault();

			new BasketItem(product.id).remove(() => {
				$('[data-id='.concat(product.id, ']')).remove();
			});
		});

	}
}

function BasketItem(id) {
	this.productID = id;
	this.cookieKey = 'basket['.concat(this.productID, ']');
	this.cookieExpirationDays = 90;

	this.isAvailable = function() {
		if (Helper.getCookie(this.cookieKey)) {
			return true;
		}

		return false;
	}

	this.add = function(productDetail, callback = () => {}) {
		Helper.setCookie(
			this.cookieKey,
			JSON.stringify(productDetail),
			this.cookieExpirationDays
		);
		callback();
	}

	this.remove = function(callback = () => {}) {
		Helper.removeCookie(this.cookieKey);
		callback();
	}
}

function Product(id) {
	this.id = id;

	this.price = +$('#price').text();

	this.size  = new SizeChooser('#productSizeChooser', 'active');
	this.color = new ColorChooser('#productColorChooser', 'active');

	this.productDetail = () => {
		return {
			id: this.id,
			quantity: 1,
			color: this.color.values,
			size: this.size.values,
			price: this.price
		}
	}

	this.bookmark = new Bookmark(this.id);
	this.basket   = new BasketItem(this.id);

	this.addToBookmarkCallback = () => {
		if (this.bookmark.isAvailable()) {
			this.bookmark.remove(() => this.bookmarkTrigger.removeClass('active'));
		} else {
			this.bookmark.add(() => this.bookmarkTrigger.addClass('active'));
		}
	}

	this.addToBasketCallback = (edit = false) => {
		if (edit) {
			if (this.basket.isAvailable()) {
				this.basket.add(this.productDetail(), () => this.basketTrigger.addClass('active'));
			}

			return;
		}

		if (this.basket.isAvailable()) {
			this.basket.remove(() => this.basketTrigger.removeClass('active'));

			return;
		}

		this.basket.add(this.productDetail(), () => this.basketTrigger.addClass('active'));

	}

	this.bookmarkTrigger = $('#addToBookmark');
	this.basketTrigger   = $('#addToBasket');

	this.bookmarkTrigger.click(this.addToBookmarkCallback);

	this.basketTrigger.click(this.addToBasketCallback.bind(null, false));

	$(this.size.elements).click(this.addToBasketCallback.bind(null, true));
	$(this.color.elements).click(this.addToBasketCallback.bind(null, true));

	if (this.basket.isAvailable()) {
		try {
			(function() {

				let details = JSON.parse(Helper.getCookie(this.basket.cookieKey));

				if (this.color.isAvailable(details.color) && this.size.isAvailable(details.size)) {
					
					this.color
					.select(details.color)
					.markFalse()
					.mark(details.color);

					this.size
					.select(details.size)
					.markFalse()
					.mark(details.size);

					this.basketTrigger.addClass('active');

					return;
				}

				throw '';

			}.bind(this))();
		} catch {
			Helper.removeCookie(this.basket.cookieKey);
		}
	}

	if (this.bookmark.isAvailable()) {
		this.bookmarkTrigger.addClass('active');
	}
}

function ProductCard(card, obj = null) {
	if ( obj ) {

		this.card = $(tmpl('productCard', obj.data)).appendTo(obj.container);
		this.productID = obj.data.id;

	} else {

		this.card = $(card);
		this.productID = this.card.data().id;
		console.log('ee');
		
	}

	this.bookmark = {
		id: null,
		object: null,
		trigger: this.card.find('.addToBookmark'),
		
		added: function(){
			this.trigger.addClass(this.object.activeClass);
		},
		
		removed: function(){
			this.trigger.removeClass(this.object.activeClass);
		},
		
		init: function() {
			this.trigger.click(e => {
				e.preventDefault();

				if (this.object.isAvailable())
					this.object.remove(this.removed.bind(this));
				else
					this.object.add(this.added.bind(this));
			});

			if (this.object.isAvailable())
				this.added();
			else
				this.removed();
		},

		set productID(id) {
			this.id = id;
			this.object = new Bookmark(this.id);

			this.init();
		}
	}

	this.bookmark.productID = this.productID;
}

function Filter(
	filter = '#filterSidebar', 
	resultSection = '#filterResultSection',
	resultContainer = '#filterResult'
) {
	this.filter = $(filter);
	this.resultSection  = $(resultSection);
	this.resultContainer = $(resultContainer);

	if (!this.filter.length || !this.resultSection.length) {
		return {};
	}

	this.queryObject   	  = {};

	this.loadingStatus 	  = false;
	this.loadPermission   = true;
	this.data 			  = [];

	this.requestPage      = 1;
	this.numOfData 		  = 20;

	this.queryStringBuilder = function() {
		let result = [];

		for(let item of Object.entries(this.queryObject)) {

			let [key, value] = item;
			let queryPieceString;

			if (Array.isArray(value)) {
				queryPieceString = ''.concat(key, '=[', value, ']');
			} else {
				queryPieceString = ''.concat(key, '=', value);
			}

			result.push(queryPieceString);
		}

		if (result.length) {
			result.push(
				'page='.concat(this.requestPage),
				'size='.concat(this.numOfData)
			);
		}

		return result.join('&');
	}

	this.reset = function() {
		$(document)
		.scrollTop(this.resultSection.offset().top)
		.find(this.resultContainer)
		.scrollTop(0);

		this.resultContainer.empty();

		this.data = [];
		this.requestPage = 1;
	}

	this.callback = function(key, values) {
		this.reset();

		this.queryPiece = [key, values];
		this.loading = true;
	}

	this.minPrice = new NumberInput(
		'#filterMinPrice',
		this.callback.bind(this, 'minPrice'),
		[0, null, 10000]
	);

	this.maxPrice = new NumberInput(
		'#filterMaxPrice',
		this.callback.bind(this, 'maxPrice'),
		[0, null, 10000]
	);

	this.color = new ColorChooser(
		'#filterColorChooser',
		'active',
		this.callback.bind(this, 'color'),
		true
	);

	this.size = new SizeChooser(
		'#filterSizeChooser',
		'active',
		this.callback.bind(this, 'size'),
		true
	);

	this.category = new CheckboxGroup(
		'#filterCategoryChooser',
		'active',
		this.callback.bind(this, 'category')
	);

	Object.defineProperty(this, 'queryPiece', {
		set(piece) {
			let [key, value] = piece;

			if (value.toString()) {
				this.queryObject[key] = value;
			} else {
				if (key in this.queryObject) {
					delete this.queryObject[key];
				}
			}
		}
	});

	Object.defineProperty(this, 'loading', {
		set(bool) {
			this.loadingStatus = bool;
			
			this.showStatus();
			this.setInfiniteScroll();

			if (this.loadingStatus) {
				this.loadData();
			}
		}
	});

	this.showStatus = function() {
		if (this.loadingStatus) {
			this.resultSection
			.find('#filterLoading')
			.addClass('active')
		} else {
			this.resultSection
			.find('#filterHeader, #filterResult')
			.removeClass('d-none')
			.siblings('#filterLoading')
			.removeClass('active');
		}
	}

	this.setInfiniteScroll = function() {
		$(this.resultContainer).scroll(() => {

			if ( this.resultContainer.scrollTop() + 1000 > this.resultContainer.prop('scrollHeight') ){
				
				if (!this.loadingStatus && this.loadPermission){
					this.loading = true;
				}

			}

		});
	}

	this.changeLoadPermission = function() {
		if (this.numOfData > this.data.length) {
			this.loadPermission = false;
		} else {
			this.loadPermission = true;
		}

		return this;
	}

	this.showProducts = function(){
		for (let product of this.data) {
			new ProductCard(null, {
				data: product,
				container: this.resultContainer
			});
		}		

		return this;
	}

	Object.defineProperty(this, 'setData', {
		set(data) {
			this.data = data;
			this.showProducts();
		}
	});

	this.updateAddressBar = function() {
		window.history.pushState(
			{},
			'',
			location.pathname.concat(this.queryString)
		);
	}

	this.loadData = function() {
		if (this.loadPermission) {
			console.log(this.queryString);
			axios({
				method: 'GET',
				baseURL: 'https://my-json-server.typicode.com/shahmal1yev/feeles',
				url: '/products',
			})
			.then(response => {
				this.setData = response.data;
				this.updateAddressBar();
			})
			.catch(error => {
				console.log(error);
				console.log('unknown error occured...');
			})
			.finally(() => {
				this.changeLoadPermission();
				this.loading = false;
				this.requestPage++;
			});
		}
	}

	Object.defineProperty(this, 'queryString', {
		get() {
			return '?'.concat(this.queryStringBuilder())
		}
	});
}

function CheckboxGroup(
	container = '#checkboxGroup',
	activeClass = 'active',
	callback = () => {},
	multiple = true
) {

	this.activeClass = activeClass;
	this.callback = callback;
	this.multiple = multiple;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(Array.from($(container).children()).map(element => [element.dataset.id, element]));

	this.isAvailable = function(key) {
		if (this.multiple) {
			if (this.availableValues.has(key)) {
				return true;
			}
		}

		return false;
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			if (this.selectedValues.has(key)) {
				return true;
			}
		} else {
			if (this.selectedValues == key) {
				return true;
			}
		}

		return false;
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		if (this.isAvailable(key)) {
			$(this.availableValues.get(key)).removeClass(this.activeClass);
		} else {
			$(this.elements).removeClass(this.activeClass);
		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			$(this.availableValues.get(key)).addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});


	for(let item of this.availableValues) {
		let [key, element] = item;

		$(element).click(e => {
			e.preventDefault();

			if (this.multiple) {
				if (this.isSelected(key)) {
					this.markFalse(key).remove(key);
				} else {
					this.mark(key).select(key);
				}
			} else {
				this.markFalse().mark(key).select(key);
			}
		});

		if ($(element).hasClass(this.activeClass)) {
			if (this.multiple) {
				this.mark(key).select(key);
			} else {
				this.markFalse().mark(key).select(key);
			}
		}
	}
}

function NumberInput(
	input = '#numberInput',
	callback = () => {},
	args = []
) {
	this.input = $(input);
	this.callback = callback;

	this.min 	= args[0] || 0;
	this.value 	= args[1] || null;
	this.max 	= args[2] || null;

	this.oldValue = null;
	this.currentval = () => this.input.val()
	this.show = value => this.input.val(value);

	Object.defineProperty(this, 'inputValue', {
		set(value) {
			this.value = value;
			this.callback(value);
		}
	});

	this.input
	.click(e => e.preventDefault())
	.focus(() => this.oldValue = this.value)
	.change(() => {

		if (!this.currentval() == '') {
			if (!isFinite(+this.currentval())) {
				this.show(this.oldValue);

				return;
			}

			if (+this.currentval() < this.min) {
				this.show(this.oldValue);

				return;
			}

			if (this.max) {
				if (+this.currentval() > this.max) {
					this.show(this.oldValue);

					return;
				}
			}

			this.inputValue = +this.currentval();

			return;
		}

		this.inputValue = null;
	});

	for(let event of ['input', 'keyup', 'keydown']) {
		this.input[0]
		.addEventListener(event, function(e) {
			if (/^\d*\.?\d*$/.test(e.target.value)) {
				this.oldValue = e.target.value;
			} else if ('oldValue' in this) {
				this.value = this.oldValue
			} else {
				this.value = '';
			}
		});
	}

	this.show(this.value);
}

export {
	Sidebar,
	Counter,
	Bookmark,
	Basket,
	BasketItem,
	ColorChooser,
	SizeChooser,
	Quantity,
	Product,
	ProductCard,
	Filter,
	NumberInput
}