(function(){
    const header = document.querySelector(".header-widgets");
    const screenTogglePoint = 20;
    const stickyHeaderClassName = 'scrolled';


    // Function to toggle header styles
    function toggleStickyHeader() {
        if (window.scrollY > screenTogglePoint) { // Adjust threshold as needed
            header.classList.add(stickyHeaderClassName);
        } else {
            header.classList.remove(stickyHeaderClassName);
        }
        return;
    }

    // If top is offset on page load, make header sticky.
    window.onload = function () {
        if (this.window.scrollY > screenTogglePoint){
            header.classList.add(stickyHeaderClassName);
        }
    }

    // Create timeout handler to prevent fractional /subpixel rendering on scroll up, which is causing multiple calls to toggleStickyHeader in the one scroll.
    let timeout;
    window.addEventListener("scroll", () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => toggleStickyHeader(), 20); // This sets the delay to 20ms to allow the scrollY to settle before calling the function.
    });
})();