// Scroll
const iconScroll = document.querySelector(".icon-scroll");

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 100) {
        iconScroll.classList.add("active");
    }
    else {
        iconScroll.classList.remove("active");
    }
})
// Scroll End