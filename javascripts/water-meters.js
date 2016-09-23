$(function () {
    $("#water-form").validator();
    $("#water-form").on("submit",
            function (event) {
                if (event.isDefaultPrevented()) {
                    alert("Error isDefaultPrevented!");
                } else {
                    event.preventDefault();
                }
            });
});