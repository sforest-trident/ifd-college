document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header-widgets");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) { // Adjust threshold as needed
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
});
