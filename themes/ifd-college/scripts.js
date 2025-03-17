(function(){
    const header = document.querySelector(".header-widgets");
    const logo = document.querySelector(".header-widget img");
    const screenTogglePoint = 20;
    const stickyHeaderClassName = 'scrolled';
    const smallLogoClass = 'logo-small';

    // Function to toggle header styles
    function toggleHeader() {
        if (window.scrollY > screenTogglePoint) {
            header.classList.add(stickyHeaderClassName);
            logo.classList.add(smallLogoClass);
        } else {
            header.classList.remove(stickyHeaderClassName);
            logo.classList.remove(smallLogoClass);
        }
    }

    // Run on load
    window.onload = toggleHeader;

    // Monitor scroll activity
    window.addEventListener("scroll", toggleHeader);
})();
