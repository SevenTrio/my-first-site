document.addEventListener("DOMContentLoaded", function() {

	var dropdownsNames = ['language', 'contacts'];

	dropdownsNames.forEach(dropdownName => {
		var dropdown = document.getElementsByClassName('js-'+dropdownName+'__dropdown')[0];
		dropdown.onclick = function(){
			var dropdownContainer = dropdown.nextElementSibling;
			if (dropdown.classList.contains('dropdown_active')) {
				dropdown.classList.remove('dropdown_active');
				dropdownContainer.classList.remove('dropdown__container_active');
			} else {
				dropdown.classList.add('dropdown_active');
				dropdownContainer.classList.add('dropdown__container_active');
			}
		}
	});

	var phoneDropdownsNames = ['language', 'contacts'];

	phoneDropdownsNames.forEach(phoneDropdownName => {
		var phoneDropdown = document.getElementsByClassName('js-'+phoneDropdownName+'__phone-dropdown')[0];
		phoneDropdown.onclick = function(){
			var phoneDropdownContainer = phoneDropdown.nextElementSibling;
			if (phoneDropdown.classList.contains('phone-dropdown_active')) {
				phoneDropdown.classList.remove('phone-dropdown_active');
				phoneDropdownContainer.classList.remove('phone-dropdown__container_active');
			} else {
				phoneDropdown.classList.add('phone-dropdown_active');
				phoneDropdownContainer.classList.add('phone-dropdown__container_active');
			}
		}
	});

	// var hamburgerMenuButton = document.getElementsByClassName('hamburger-menu__button')[0];
	// var hamburgerMenuContainer = document.getElementsByClassName('hamburger-menu__container')[0];
	// hamburgerMenuButton.onclick = function(){
	// 	if (hamburgerMenuButton.classList.contains('hamburger-menu__button_active')) {
	// 		console.log('снимаю класс');
	// 		hamburgerMenuButton.classList.remove('hamburger-menu__button_active');
	// 		hamburgerMenuContainer.classList.remove('hamburger-menu__container_active');
	// 	} else {
	// 		console.log('добавляю класс');
	// 		hamburgerMenuButton.classList.add('hamburger-menu__button_active');
	// 		hamburgerMenuContainer.classList.add('hamburger-menu__container_active');
	// 	}
	// }

	var hamburgerMenuContainer = document.getElementsByClassName('hamburger-menu__container')[0];
	
	var hamburgerMenuOpenButton = document.getElementsByClassName('hamburger-menu__button_open')[0];
	hamburgerMenuOpenButton.onclick = function(){
		document.body.classList.add('page_overflow_hidden');
		hamburgerMenuContainer.classList.add('hamburger-menu__container_active');
	};

	var hamburgerMenuCloseButton = document.getElementsByClassName('hamburger-menu__button_close')[0];
	hamburgerMenuCloseButton.onclick = function(){
		document.body.classList.remove('page_overflow_hidden');
		hamburgerMenuContainer.classList.remove('hamburger-menu__container_active');
	};




	// document.getElementsByClassName('language__link')[0].onclick = function(){
	// 	var dropdown = document.getElementsByClassName('language__dropdown')[0];
	// 	if (dropdown.classList.contains('dropdown_open')) {
	// 		dropdown.classList.remove('dropdown_open');
	// 	} else {
	// 		dropdown.classList.add('dropdown_open');
	// 	}
	// }

	// document.getElementsByClassName('contacts__link')[0].onclick = function(){
	// 	var dropdown = document.getElementsByClassName('contacts__dropdown')[0];
	// 	if (dropdown.classList.contains('dropdown_open')) {
	// 		dropdown.classList.remove('dropdown_open');
	// 	} else {
	// 		dropdown.classList.add('dropdown_open');
	// 	}
	// }

	window.onclick = function(event) {
		if (!event.target.matches('.dropdown__container, .dropdown__content')) {
			var dropdowns = document.getElementsByClassName('dropdown');
			for (var i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				var openContainer = openDropdown.nextElementSibling;
				if (openDropdown.classList.contains('dropdown_active')) {
					var dropdownName = event.target.classList.value.match(/js-(\w+)__dropdown/);
					if (dropdownName == null) {
						openDropdown.classList.remove('dropdown_active');
						openContainer.classList.remove('dropdown__container_active');
					} else {
						if (!openDropdown.classList.contains('js-'+dropdownName[1]+'__dropdown')){
							openDropdown.classList.remove('dropdown_active');
							openContainer.classList.remove('dropdown__container_active');
						}
					}
				}
			}
		}
	};

	var reverseButton = document.getElementsByClassName('search-form__reverse-button')[0];
	reverseButton.onclick = function(){
		if(reverseButton.classList.contains('search-form__reverse-button_scale')){
			reverseButton.classList.remove('search-form__reverse-button_scale');
			reverseButton.classList.add('search-form__reverse-button_rotate');
		} else {
			reverseButton.classList.add('search-form__reverse-button_scale');
			reverseButton.classList.remove('search-form__reverse-button_rotate');
		};

		var inputFrom = document.getElementById('from');
		var temp = inputFrom.value;
		var inputTo = document.getElementById('to');
		inputFrom.value = inputTo.value;
		inputTo.value = temp;
	};

	var calendarButton = document.getElementsByClassName('search-form__calendar-button')[0];
	calendarButton.onclick = function(){
		document.getElementById('date').focus();
	}

});


;(function($, undefined){
	$picker = $('#date');
	$picker.datepicker({
		minDate: new Date()
	});
	$picker.data('datepicker').selectDate(new Date());

})(jQuery);