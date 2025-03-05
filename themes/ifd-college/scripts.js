(function(){
    const header = document.querySelector(".header-widgets");
    const screenTogglePoint = 20;
    const stickyHeaderClassName = 'scrolled';

    // If top is offset on page load, make header sticky.
    window.onload = function () {
        if (this.window.scrollY > screenTogglePoint){
            header.classList.add(stickyHeaderClassName);
        }
    }

    // Monitor scroll activity to toggle sticky header as necessary.
    window.addEventListener("scroll", function () {
        if (window.scrollY > screenTogglePoint) { // Adjust threshold as needed
            header.classList.add(stickyHeaderClassName);
        } else {
            header.classList.remove(stickyHeaderClassName);
        }
        
    });
})();
