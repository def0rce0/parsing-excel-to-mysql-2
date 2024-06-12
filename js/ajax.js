function DbSave() {
        $("#nextbtn").prop("disabled", true);
        let dbDataForm = $('.dbData');
        let form = dbDataForm.serializeJSON();
        $.ajax({
            url: 'function/configDB.php',
            dataType: 'JSON',
            type: 'post',
            data: {
                Data: form,
                func: 'saveDB',
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    $("#dbmessage").css("color", "#800909").text("Неверные данные для подключения к БД.");
                    $("#nextbtn").prop("disabled", true);
                } else {
                    $("#dbmessage").css("color", "#16b458").text("Подключение к БД активно.");
                    $("#nextbtn").prop("disabled", false);
                }
            }
            //error: function(jqXHR, textStatus, errorThrown,response) { console.log(jqXHR,textStatus,errorThrown,response); }
    });
}

function checkdbOnLoad() {
    $.ajax({
        url: 'function/configDB.php',
        dataType: 'JSON',
        type: 'post',
        data: {
            func: 'checkDB',
        },
        success: function(response) {
            console.log(response);
            if (response.error) {
                $("#dbmessage").css("color", "#800909").text("Данные в указанные в конфиге ошибочны.");
                $("#nextbtn").prop("disabled", true);
            } else {
                $("#dbmessage").css("color", "#16b458").text("Подключение к БД активно. Ввод данных не требуется.");
                $("#nextbtn").prop("disabled", false);
            }
        }
    });
}