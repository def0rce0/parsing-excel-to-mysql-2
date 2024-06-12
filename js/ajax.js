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
            if (response.error) {
                $("#dbmessage").css("color", "#800909").text("Данные указанные в конфиге ошибочны.");
                $("#nextbtn").prop("disabled", true);
            } else {
                $("#dbmessage").css("color", "#16b458").text("Подключение к БД активно. Ввод данных не требуется.");
                $("#nextbtn").prop("disabled", false);
            }
        }
    });
}

function inputfileChange() {
    inputFile = document.querySelector('input[type="file"]');
    file = inputFile.files[0];
    fileName = file.name; 
    filePath = fileName.split('.').pop();
    if(filePath == 'xls') {
        let form = $('.uploadfile');
        let formData = new FormData(form[0]);
        $.ajax({
            url: 'function/parseSetting',
            dataType: 'JSON',
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log('error');
            }
        });
    }
    else {
        alert("Выберите файл в формате .xls");
        $('input[type="file"]').val('');
    }
    

}