function DbSave() {
        $("#nextbtn").prop("disabled", true);
        let dbDataForm = $('.dbData');
        $.ajax({
            url: 'function/saveDB.php',
            dataType:'JSON',
            type: 'post',
            data: dbDataForm.serialize(),
            success: function(response) {
                if (response.error) {
                    $("#dbmessage").css("color", "#800909").text("Неверные данные для подключения к БД.");
                    $("#nextbtn").prop("disabled", true);
                } else {
                    $("#dbmessage").css("color", "#16b458").text("Подключение к БД активно.");
                    $("#nextbtn").prop("disabled", false);
                }
            }
    });
}