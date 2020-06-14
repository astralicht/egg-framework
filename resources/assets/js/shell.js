let arrowDown = document.createElement("arrow-down");
let isOpen = false;
let dropdowns = document.getElementsByTagName("dropdown");
let navs = document.getElementsByTagName("nav");
let inputFields = document.getElementsByTagName("input");

Array.from(dropdowns).forEach(function(dropdown) {
	let dropdownTitle = dropdown.children[0];
	let dropdownItems = dropdown.children[1];

	dropdownTitle.appendChild(arrowDown);

	dropdownTitle.onclick = function() {
		openDropdown(dropdownTitle, dropdownItems);
	}
});

function openDropdown(dropdownTitle, dropdownItems) {
	if(!isOpen) {
		dropdownTitle.style.borderRadius = "5px 5px 0px 0px";
		dropdownItems.style.display = "block";
		isOpen = true;
	}
	else {
		dropdownTitle.style.borderRadius = "5px";
		dropdownItems.style.display = "none";
		isOpen = false;
	}
}

Array.from(navs).forEach(function(nav) {
	let navToggle = nav.children[0];

	navToggle.onclick = function() {
		nav.style.display = "block";
		nav.style.height = "auto";
		nav.children[2].style.paddingTop = "64px";
		for (var i = 1; i < nav.children.length; i++) {
			nav.children[i].style.display = "block";
		}
	}
});

Array.from(inputFields).forEach(function(inputField) {
	if(inputField.attributes.getNamedItem("incrementer")) {
		let negativeIncrementer = document.createElement("negativeIncrementer");
		negativeIncrementer.style.display = "block";
		negativeIncrementer.style.padding = "20px";
		negativeIncrementer.style.borderRadius = "5px 5px 0px 0px";
		negativeIncrementer.style.backgroundColor = "#666";
		negativeIncrementer.style.marginTop = "10px";

		inputField.style.marginTop = 0;

		inputField.parentElement.insertBefore(negativeIncrementer, inputField.parentElement.childNodes[3]);
	}
});
