(function(){
    const lmsCourseNav = document.querySelector('.courses-category-list');
    const marker = document.querySelector('.marker');
    const screenTogglePoint = 20;
    
    
    // Function to toggle header styles
    function toggleStickyHeader() {

        const header = document.querySelector(".header-widgets");
        const stickyHeaderClassName = 'scrolled';
        
        if (window.scrollY > screenTogglePoint) { // Adjust threshold as needed
            header.classList.add(stickyHeaderClassName);
        } else {
            header.classList.remove(stickyHeaderClassName);
        }
        return;
    }


    // Fuction for toggling the UI nav docker.
    function triggerDockedMenuComponent(element) {
        
        const dockableComponent = element;
        const scrollY = window.scrollY;
        const theParent = dockableComponent.parentNode;

        let headerHeight = document.querySelector('header').clientHeight;

        // Set the parent height, so that when it docks the wrapper doesn't collapse.
        theParent.style.setProperty('height', dockableComponent.clientHeight+'px'); 

        if (scrollY > screenTogglePoint) {
            // Dock the element when we reach the touch point
            if ((scrollY + headerHeight) >= (theParent.offsetTop)) {
                dockableComponent.classList.add("scrolled"); // Start with adding the class.
                dockableComponent.style.setProperty("top", headerHeight+"px"); // Now add the live header height as the top postion, so it sits tight to the header.
            } else if(dockableComponent.classList.contains("scrolled")) {
                dockableComponent.classList.remove("scrolled"); // Drop the class to drop it back to it's native place on the page.
                dockableComponent.style.removeProperty("top"); // Drop the top property back off again to keep things clean.
            }
        }
    }

    // If top is offset on page load, make header sticky.
    window.onload = function () {
        toggleStickyHeader();
        if(lmsCourseNav) triggerDockedMenuComponent(lmsCourseNav);
    }

    // Create timeout handler to prevent fractional /subpixel rendering on scroll up, which is causing multiple calls to toggleStickyHeader in the one scroll.
    let timeout;
    window.addEventListener("scroll", () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            toggleStickyHeader();
        }, 20); // This sets the delay to 20ms to allow the scrollY to settle before calling the function.
        
        if(lmsCourseNav){
            //let headerHeight = document.querySelector('header').clientHeight;
            triggerDockedMenuComponent(lmsCourseNav);
        }
            
            
    });
})();