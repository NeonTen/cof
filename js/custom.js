jQuery(document).ready(function() {

    // Mobile menu
    // Grab HTML Elements
	const btnWrap = document.querySelector(".mobile-menu-wrapper");
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".overlay");
    const close = document.querySelector(".mobile-menu .close");

	// Search box
	btn.addEventListener("click", () => {
	    btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});
	overlay.addEventListener("click", () => {
        btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});
	close.addEventListener("click", () => {
        btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});

    // redirect
    jQuery(".animate-redirect a[href^='#']").click(function(e) {
        e.preventDefault();

        var position = jQuery(jQuery(this).attr("href")).offset().top;

        jQuery("body, html").animate({
            scrollTop: position
        }, 1000);
    });

	jQuery('.main-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		autoplay: true,
		prevArrow: '<div class="w-11 h-11 grid place-content-center bg-primary hover:bg-secondary hover:fill-white rounded-full transition-all cursor-pointer absolute top-1/2 -translate-y-1/2 -left-6 z-20"><svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.6339 22.1339C14.1457 22.622 13.3543 22.622 12.8661 22.1339L6.61612 15.8839C6.12796 15.3957 6.12796 14.6043 6.61612 14.1161L12.8661 7.86612C13.3543 7.37796 14.1457 7.37796 14.6339 7.86612C15.122 8.35427 15.122 9.14573 14.6339 9.63388L10.5178 13.75L22.5 13.75C23.1904 13.75 23.75 14.3096 23.75 15C23.75 15.6904 23.1904 16.25 22.5 16.25H10.5178L14.6339 20.3661C15.122 20.8543 15.122 21.6457 14.6339 22.1339Z" fill=""/></svg></div>',
		nextArrow: '<div class="w-11 h-11 grid place-content-center bg-primary hover:bg-secondary hover:fill-white rounded-full transition-all cursor-pointer absolute top-1/2 -translate-y-1/2 -right-6 z-20 rotate-180"><svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.6339 22.1339C14.1457 22.622 13.3543 22.622 12.8661 22.1339L6.61612 15.8839C6.12796 15.3957 6.12796 14.6043 6.61612 14.1161L12.8661 7.86612C13.3543 7.37796 14.1457 7.37796 14.6339 7.86612C15.122 8.35427 15.122 9.14573 14.6339 9.63388L10.5178 13.75L22.5 13.75C23.1904 13.75 23.75 14.3096 23.75 15C23.75 15.6904 23.1904 16.25 22.5 16.25H10.5178L14.6339 20.3661C15.122 20.8543 15.122 21.6457 14.6339 22.1339Z" fill=""/></svg></div>',
	});

	jQuery('.testimonial-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		prevArrow: '<div class="w-11 h-11 grid place-content-center bg-primary hover:bg-secondary hover:fill-white rounded-full transition-all cursor-pointer absolute top-1/2 -translate-y-1/2 -left-7 z-20"><svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.6339 22.1339C14.1457 22.622 13.3543 22.622 12.8661 22.1339L6.61612 15.8839C6.12796 15.3957 6.12796 14.6043 6.61612 14.1161L12.8661 7.86612C13.3543 7.37796 14.1457 7.37796 14.6339 7.86612C15.122 8.35427 15.122 9.14573 14.6339 9.63388L10.5178 13.75L22.5 13.75C23.1904 13.75 23.75 14.3096 23.75 15C23.75 15.6904 23.1904 16.25 22.5 16.25H10.5178L14.6339 20.3661C15.122 20.8543 15.122 21.6457 14.6339 22.1339Z" fill=""/></svg></div>',
		nextArrow: '<div class="w-11 h-11 grid place-content-center bg-primary hover:bg-secondary hover:fill-white rounded-full transition-all cursor-pointer absolute top-1/2 -translate-y-1/2 -right-7 z-20 rotate-180"><svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.6339 22.1339C14.1457 22.622 13.3543 22.622 12.8661 22.1339L6.61612 15.8839C6.12796 15.3957 6.12796 14.6043 6.61612 14.1161L12.8661 7.86612C13.3543 7.37796 14.1457 7.37796 14.6339 7.86612C15.122 8.35427 15.122 9.14573 14.6339 9.63388L10.5178 13.75L22.5 13.75C23.1904 13.75 23.75 14.3096 23.75 15C23.75 15.6904 23.1904 16.25 22.5 16.25H10.5178L14.6339 20.3661C15.122 20.8543 15.122 21.6457 14.6339 22.1339Z" fill=""/></svg></div>',
		responsive: [
			{
				breakpoint: 1280,
				settings: {
				  slidesToShow: 2,
				}
			},
			{
				breakpoint: 768,
				settings: {
				  slidesToShow: 1,
				}
			}
		]
	});

});

jQuery(document).ready(function() {
	
	const submitIcon = jQuery(".search-icon button");
	const closeIcon = jQuery(".search-box .close");
	const inputBox = jQuery(".search-form .search-input");
	const searchBox = jQuery(".search-box");
	const overlay = jQuery(".search-overlay");
	let isOpen = false;
	
	submitIcon.click(function(e) {
		if (!isOpen) {
			e.preventDefault();
			inputBox.focus();
			searchBox.addClass("search-box-open");
			overlay.removeClass("hidden");
			isOpen = true;
		} else {
			inputBox.focusout();
			searchBox.removeClass("search-box-open");
			overlay.addClass("hidden");
			isOpen = false;
		}
	});
	closeIcon.click(function(e) {
		searchBox.removeClass("search-box-open");
		overlay.addClass("hidden");
		isOpen = false;
	});

	submitIcon.mouseup(function() {
		return false;
	});
	searchBox.mouseup(function() {
		return false;
	});
	jQuery(document).mouseup(function() {
		if (isOpen) {
			inputBox.focusout();
			searchBox.removeClass("search-box-open");
			overlay.addClass("hidden");
			isOpen = false;
		}
	});
	
});
