(function(){
    const lmsCourseNav = document.querySelector('.courses-category-list');
    const screenTogglePoint = 100;
    const header = document.querySelector(".header-widgets");
    
    // Function to toggle header styles
    function toggleStickyHeader() {

        const stickyHeaderClassName = 'scrolled';
        
        // If past the screenTogglePoint, and sticky class is not there, apply it and exit.             
        if (window.scrollY > screenTogglePoint && !header.classList.contains(stickyHeaderClassName)) {
            header.classList.add(stickyHeaderClassName);
            return;
        } 

        // When docked back to scroll-zero, drop off the sticky class and exit.
        if(window.scrollY == 0 && header.classList.contains(stickyHeaderClassName)){
            header.classList.remove(stickyHeaderClassName);
            return;
        }

        
        return;
    }


    /* Mobile Nav functionality */
    const menu = document.querySelector("header .menu");
    const menuWrapper = menu.parentNode;
    const hamburger = document.querySelector(".menu-toggle");
    const body = document.querySelector("body");

    function toggleMenu() {
        
        if (menuWrapper.classList.contains("visible")) {
            menuWrapper.classList.remove("visible");
            hamburger.classList.remove('active');
            body.classList.remove('nav-ui-lock');
            header.classList.remove('full-height');
        } else {
            menuWrapper.classList.add("visible");
            hamburger.classList.add('active');
            body.classList.add('nav-ui-lock');
            header.classList.add('full-height');
        }
        
    }

    if(hamburger) hamburger.addEventListener("click", toggleMenu);


    /* Header image link functionality */
    function wrapElementWithLink(selector, url) {

        // If selector is not already an element itself (i.e just a class name), query for the selected element;
        const element = !selector ? document.querySelector(selector) : selector;
        
        // CATCH: if element is not fond, exit out.
        if (!element) return;
        
        // Create the anchor element
        const link = document.createElement('a');
        link.href = url;
        
        // Move any child nodes into the anchor element
        while (element.firstChild) {
            link.appendChild(element.firstChild);
        }
        
        // Append the anchor element inside the original element
        element.appendChild(link);
    }
    
    const headerLogo = document.querySelector("header.header-widgets .header-widget .wp-block-image"); // Query for the header logo image (assuming it's in this sructure and no image is there).
    const homeLink = menu.querySelector(".menu-item-home a"); // Query for the home-link in the nav menu.

    // If the selectors are good, let's do some magic.
    if(headerLogo && homeLink.href) wrapElementWithLink(headerLogo, homeLink.href);



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
        
        // Run toggle sticky header
        toggleStickyHeader();

        // If LMS Course Nav exists on page, run the docking component as we scroll.
        if(lmsCourseNav) triggerDockedMenuComponent(lmsCourseNav);
    });

    document.addEventListener("DOMContentLoaded", function () {
        const header = document.querySelector("header"); // Adjust selector as needed
        const offset = header ? header.offsetHeight + 10 : 50; // Adjust extra padding if needed

        function stripLeadingSlash(url) {
            return url.startsWith("/") ? url.substring(1) : url;
        }

        function smoothScrollToTarget(targetId) {
            const targetElement = typeof targetId === 'object' ? targetId : document.getElementById(targetId);

            if (targetElement) {

                const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        }
    
        // Handle anchor clicks
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                const url = new URL(this.href);
                const targetId = document.getElementById(url.hash.substring(1));

                if (targetId) {
                    e.preventDefault();
                    smoothScrollToTarget(targetId);
                }
            });
        });
    
        // Handle page load with hash
        if (window.location.hash) {
            const targetId = window.location.hash.substring(1);
            setTimeout(() => smoothScrollToTarget(targetId), 100); // Delay to allow rendering
        }
    });
})();