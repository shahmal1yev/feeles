function turnOffScrolling() {
	$('html').css('overflow', 'hidden');
}

function turnOnScrolling() {
	$('html').css('overflow', 'auto');
}

function fromDaysToMilliseconds(days) {
	return days * 24 * 60 * 60 * 1000;
}

function setCookie(key, value, exdays) {
	let date = new Date();
	let milliseconds = fromDaysToMilliseconds(exdays);

	date.setTime(date.getTime() + milliseconds);

	let cookie = key.concat('=', value);
	let expirationDate = 'expires='.concat(date.toUTCString());
	let path = 'path=/';

	document.cookie = cookie.concat(';', expirationDate, ';', path);
}

function removeCookie(key) {
	document.cookie = key.concat('=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;');
}

function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let cookies = decodedCookie.split(';');

	for(let cookie of cookies) {
		while (cookie.charAt(0) == ' ') {
			cookie = cookie.substring(1);
		}
		if (cookie.indexOf(name) == 0) {
			return cookie.substring(name.length, cookie.length);
		}
	}

	return false;
}

function getElement(id) {
	if (document.getElementById(id)) {
		return document.getElementById(id);
	}

	return false;
}

function inputFilter(inputID, regex) {
	[
		'input',
		'keyup',
		'keydown',
		'mousedown',
		'mouseup',
		'select',
		'contextmenu',
		'drop'
	].forEach(function(event){
		document.getElementById(inputID).addEventListener(e, function() {
			if (this.value.test(regex)) {
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
		        this.oldSelectionEnd = this.selectionEnd;
			} else if (this.hasOwnProperty('oldValue')) {
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			} else {
				this.value = '';
			}
		});
	});
}

function getTokenFromMeta(name) {
	name = '[name='.concat(name, ']');

	if (document.querySelector(name)) {
		return document.querySelector(name).content;
	}

	return false;
}

function setToken(name, value) {
	let selector = '[name='.concat(name, ']');

	if (document.querySelector(selector)) {
		document.querySelector(selector).remove();
	}

	let meta = (function() {
		let element = document.createElement('meta');
		element.name = name;
		element.content = value;

		return element;
	})();

	document.head.prepend(meta);
}

function isEmpty(obj) {
	for (let prop in obj) {
		if (obj.hasOwnProperty(prop)) {
			return false;
		}
	}

	return JSON.stringify(obj) === JSON.stringify({});
}

export {
	turnOnScrolling,
	turnOffScrolling,
	fromDaysToMilliseconds,
	setCookie,
	removeCookie,
	getCookie,
	getElement,
	getTokenFromMeta,
	setToken,
	isEmpty
}