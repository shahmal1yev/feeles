import * as Helper from './helpers.js';
import * as Constructor from './constructors.js';

Array.prototype.remove = function(index) {
	if (this[index]) {
		this.splice(index, 1);
	}

	return this;
}

{

	(function() {

		for(let sidebar of [
			{
				id: 'categoriesSidebar',
				opener: 'openCategoriesSidebar',
				closer: 'closeCategoriesSidebar',
				activeClass: 'active'
			},
			{
				id: 'filterSidebar',
				opener: 'openFilterSidebar',
				closer: 'closeFilterSidebar',
				activeClass: 'active'
			}
		]) {
			new Constructor.Sidebar(
				sidebar.id,
				sidebar.opener,
				sidebar.closer,
				sidebar.activeClass
			);
		}

	})();

	(function() {
		$('.product-card').each(function(){
			new Constructor.ProductCard(this);
		});
	})();

	(function() {
		if (!Helper.getElement('filterSidebar')) {
			return;
		}

		$(document).ready(function() {
			let filter = new Constructor.Filter();
		})
	})();

	(function() {
		if (!Helper.getElement('product')) {
			return;
		}

		let product = new Constructor.Product('#product');
	})();

	(function() {
		$('.basket-card').each(function() {
			new Constructor.BasketCard(this);
		});
	})();

}