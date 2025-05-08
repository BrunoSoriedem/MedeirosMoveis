const scollTop = document.querySelector("#scrollTop")
window.addEventListener("scroll", () => {
    window.pageYOffset > 100 ? scrollTop.classlist.add("active") : scrollTop.classlist.remove("ative");
})
scrollTop.addEventListener("click", () => {
    window.scrollTop({
        top: 0,
        left: 0,
        behavior: "smooth"
    })
})