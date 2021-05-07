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

	this.count = +currentVal;
	this.max   = +max;
	this.min   = +min;

	this.increment = function() {
		if (this.max <= this.count) {
			return;
		}

		return ++this.count;
	}

	this.decrement = function() {
		if (this.min >= this.count) {
			return;
		}

		return --this.count;
	}

	Object.defineProperty(this, '_count', {
		get() {
			return this.count;
		},

		set(val) {
			this.count = +val;
		}
	});
}

function BookmarkController(id) {
	this.productID = id;
	this.cookieKey = 'bookmarks['.concat(this.productID, ']');
	this.cookieExpirationDays = 90;

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

function BookmarkTrigger(productID, trigger) {
	this.productID = productID;
	this.trigger = $(trigger);
	this.activeClass = 'active';

	this.__proto__ = new BookmarkController(this.productID);

	this.activate = function() {
		this.trigger.addClass(this.activeClass);
	};

	this.deactivate = function label() {
		this.trigger.removeClass(this.activeClass);
	};

	this.trigger.bind('click', {self: this}, function label(s) {
		let self;

		if (this == null) {
			self = s;
		} else {
			self = s.data.self;
			s.preventDefault();
		}

		if (self.isAvailable()) {
			if (this == null)
				self.activate();
			else
				self.remove(self.deactivate.bind(self));
		} else {
			if (this == null)
				self.deactivate();
			else
				self.add(self.activate.bind(self));
		}

		return label;
	}.call(null, this));
}

function ColorChooser(
	container = '#colorChooser',
	activeClass = 'active',
	callback = () => {},
	multiple = false
) {
	this.activeClass = activeClass || 'active';
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

		if ($(element).hasClass('active')) {
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
	this.activeClass = activeClass || 'active';
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

function Quantity(container, callback = () => {}, currentVal = null) {
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
	
	this.setValue = function (value) {
		this.counter._count = value;
		this.show(value);
	};

	this.incrementer.click(e => {
		e.preventDefault();

		if (this.counter.increment()) {
			this.show(this.counter.count);
			this.callback(
				this.counter.count,
				this.container.children(),
				this.setValue.bind(this)
			);
		}

	});

	this.decrementer.click(e => {
		e.preventDefault();

		if (this.counter.decrement()) {
			this.show(this.counter.count);
			this.callback(
				this.counter.count,
				this.container.children(),
				this.setValue.bind(this)
			);
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
			this.setValue(this.oldValue);

			return;
		}

		if (!(this.max >= this.currentval() && this.currentval() >= this.min)) {
			this.setValue(this.oldValue);
			
			return;
		}
		
		this.setValue(this.currentval());
		
		this.callback(
			this.counter.count,
			this.container.children(),
			this.setValue.bind(this)
		);
	});

	this.showing.val(this.counter.count);
}

function ProductCard(card, obj = null) {
	if ( obj ) {

		this.card = $(tmpl('productCard', obj.data)).appendTo(obj.container);
		this.productID = obj.data.id;

	} else {

		this.card = $(card);
		this.productID = this.card.data().id;
		
	}

	this.bookmark = new BookmarkTrigger(this.productID, this.card.find('.addToBookmark'));
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

function BasketController(productID) {
	this.tokenName = 'basketToken';
	this.details = {
		id: productID,
		quantity: 1
	};

	this.getToken = function(obj) {
		obj[this.tokenName] = Helper.getTokenFromMeta(this.tokenName) || '';
		
		return obj;
	};

	this.setToken = function(token) {
		if (token) {
			Helper.setToken(this.tokenName, token);
		}

		return this;
	}

	this.ajax = axios.create({
		method: 'POST',
		baseURL: window.location.origin.concat('/api/basket'),
	});

	this.add = function(
		beforeRequest = () => {},
		success = () => {}, 
		error 	= () => {},
		final 	= () => {}
	) {
		beforeRequest();

		this.ajax.request('/add', {
			params: this.getToken(this.details)
		})
		.then(response => {
			this.setToken(response.data.token);
			success(response.data.product);
		})
		.catch(e => error(e))
		.finally(e => final());
	}

	this.remove = function(
		beforeRequest = () => {},
		success = () => {}, 
		error 	= () => {},
		final 	= () => {}
	) {
		beforeRequest();

		this.ajax.request('/remove', {
			params: this.getToken(this.details)
		})
		.then((e) => success())
		.catch(e => error(e))
		.finally(e => final());
	}

	this.increment = function(
		beforeRequest,
		success,
		error,
		final
	) {
		beforeRequest();

		this.ajax.request('/increment', {
			params: this.getToken(this.details)
		})
		.then((e) => success(e))
		.catch((e) => error(e))
		.final(() => final());
	}
}

function Product(selector) {

	this.card = $(selector);
	this.productID = this.card.data().id;

	this.bookmark = new BookmarkTrigger(this.productID, this.card.find('#addToBookmark'));
	
	this.basket = {
		controller: new BasketController(this.productID),
		trigger: this.card.find('#addToBasket')
	};

	this.productUpdateCallback = function(key, value) {
		this.basket.controller.details[key] = value;
	}

	this.color = new ColorChooser(
		'#productColorChooser',
		'active',
		this.productUpdateCallback.bind(this, 'color')
	);

	this.size = new SizeChooser(
		'#productSizeChooser',
		'active',
		this.productUpdateCallback.bind(this, 'size')
	);

	this.basket.trigger.click(e => {
		this.basket.controller.add(
			function beforeRequest()
			{
				this.basket.trigger
				.prop('disabled', true);
			}
			.bind(this),
			
			function success(product)
			{
				this.basket.trigger
				.addClass('active')
			}
			.bind(this), 
			
			function error(e)
			{
				console.error(e, e.response);

				this.basket.trigger
				.addClass('error');
			}
			.bind(this),
			
			function final()
			{
				setTimeout(function() {
					this.basket.trigger
					.removeClass('error')
					.removeClass('active')
					.prop('disabled', false);
				}.bind(this), 500);
			}
			.bind(this)
		);

	});
}

function DeleteTrigger(trigger, callback) {
	this.trigger = $(trigger);
	this.callback = callback;

	this.trigger.click((e) => {
		e.preventDefault();

		this.callback(this.trigger);
	});
}

function Basket() {
	this.container = $('#basketContainer');
	this.cardSelector = '.basket-card';

	this.priceShower = $('.total-price');
	this.emptyBasketTemp = 'emptyBasketTemp';
	
	this.products = [];
	this.sum = 0;

	Object.defineProperty(this, '_product', {
		set(product) {
			this.products.push(product);
		}
	});

	this.calculateTotalPrice = function() {
		this.sum = this.products

		.map(function(product){
			return +(product.price * product.quantity).toFixed(2);
		})
		.reduce(function(total, next){
			return total + next;
		});
	};

	this.showPrice = function() {
		this.priceShower.text(this.sum);
	}
}

function BasketCard(card) {
	this.card = $(card);
	this.product = this._product = this.card.data().details;

	this.bookmark = new BookmarkTrigger(this.product.id, this.card.find('.addToBookmark'));

	this.basket = new BasketController();

	this.quantity = new Quantity(this.card.find('.product-quantity'), function(quantityValue, elements, setValue) {
		
		this.product.quantity = quantityValue;
		
		this.basket.details = this.product;

		this.basket.add(
			function beforeRequest()
			{
				elements.prop('disabled', true);
			},
			function success(product)
			{
				setValue(product.quantity);
			},
			function error()
			{
				console.error('Server error');
			},
			function final()
			{
				this.calculateTotalPrice();
				this.showPrice();

				elements.prop('disabled', false);
			}.bind(this)
		);
	}.bind(this));

	this.delete = new DeleteTrigger(this.card.find('.deleteFromBasket'), function callback(element){

		this.basket.details = this.product;

		this.basket.remove(
			function beforeRequest()
			{
				console.log(this.products);
				element
				.addClass('disabled')
				.unbind('click');
			}
			.bind(this),

			function success()
			{
				let index = this.products.indexOf(this.product);

				if (index > -1)
					this.products.splice(index, 1);

				this.card.remove();

				this.calculateTotalPrice();
				this.showPrice();
			}
			.bind(this),

			function error()
			{
				element
				.addClass('animating-btn action')
				.css('animation-name', 'shake');

				setTimeout(() =>{ 
					element
					.removeClass('animating-btn action')
					.css('animation-name', 'none')
				}, 1000);
			},

			function final()
			{
				element
				.removeClass('disabled')
				.bind('click', {}, function(e) {
					e.preventDefault();

					callback(element);
				});

				if (!this.container.find(this.cardSelector).length) {
					this.container
					.empty()
					.append(tmpl(this.emptyBasketTemp));
				}
			}
			.bind(this)
		);

	}.bind(this));
}

BasketCard.prototype = new Basket();

export {
	Sidebar,
	Product,
	ProductCard,
	BasketCard,
	Filter
}