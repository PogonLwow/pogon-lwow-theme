(function () {
    document.addEventListener("DOMContentLoaded", function (event) {
        var elements = document.querySelectorAll('.pll_icon_add');
        for (var i = 0; i < elements.length; ++i) {
            elements[i].setAttribute("href", "#");
            elements[i].style.display = "none";
        }
    });
})();
