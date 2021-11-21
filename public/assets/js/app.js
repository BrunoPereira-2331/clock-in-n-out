(function () {
    const menuToggle = document.querySelector(".menu-toggle");
    menuToggle.onclick = function (e) {
        console.log("teste");
        const body = document.querySelector("body");
        body.classList.toggle("hide-sidebar");
    }
})();