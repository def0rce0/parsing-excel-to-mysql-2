function DbSave() {
        let form = $('.dbData');
        $.ajax({
            url: 'function/saveDB.php',
            dataType:'JSON',
            type: 'post',
            data: form.serialize(),
            success: function(data) {
                if (data.error) {
                    var element = document.getElementById("dbmessage");
                    element.style.color = "#800909";
                    element.textContent = "Неверные данные для подключения к БД."
                } else {
                    var element = document.getElementById("dbmessage");
                    element.style.color = "#16b458";
                    element.textContent = "Подключение к БД активно."
                }
            }
    });
}