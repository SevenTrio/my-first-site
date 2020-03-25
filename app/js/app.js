document.addEventListener("DOMContentLoaded", function() {

	dropdownsNames = ['language', 'contacts'];

	dropdownsNames.forEach(dropdownName => {
		var dropdown = document.getElementsByClassName('js-'+dropdownName+'__dropdown')[0];
		dropdown.onclick = function(){
			var dropdownContainer = dropdown.nextElementSibling;
			if (dropdown.classList.contains('dropdown_active')) {
				dropdown.classList.remove('dropdown_active');
				dropdownContainer.classList.remove('dropdown__container_active');
			} else {
				dropdown.classList.add('dropdown_active');
				dropdownContainer.classList.add('dropdown__container_active')
			}
		}
	})

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
	}

});
