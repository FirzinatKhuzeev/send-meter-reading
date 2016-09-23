$(function () {
    $("#water-form").validator();
    $("#water-form").on("submit",
        function (event) {
            if (event.isDefaultPrevented()) {
                alert("Ошибка! Заполните поля.");
            } else {
                event.preventDefault();
                submitForm();
            }
        });
});

function submitForm() {
    var postdata = $("#water-form").serialize();
    $.ajax({
        type: "POST",
        url: "send-water-meters.php",
        data: postdata,
        success: function (text) {
            if (text == "success") {
                alert("Показания успешно отправлены");
            } else {
                alert("Во время отправки показаний, произошла ошибка");
            }
            location.reload();
        }
    });
}