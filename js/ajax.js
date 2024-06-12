function DbSave() {
        $("#nextbtn").prop("disabled", true);
        let dbDataForm = $('.dbData');
        let form = dbDataForm.serializeJSON();
        $.ajax({
            url: 'function/configDB',
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
        url: 'function/configDB',
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
            url: 'function/settingParse',
            dataType: 'JSON',
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                    settingForm(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    else {
        alert("Выберите файл в формате .xls");
        $('input[type="file"]').val('');
    }
    

}
function settingForm(response) {
    const columnsDiv = $("#columns");
    response.forEach((cell, index) => {
        const columnInputDiv = $("<div>").addClass("col-3 text-center");
        const columnInput = $("<input>")
            .attr("type", "text")
            .addClass("form-control")
            .attr("placeholder", "Столбцы")
            .attr("name", "columns[]")
            .attr("id", "login")
            .val(cell)
            .prop("required", true);
        columnInputDiv.append(columnInput);
        columnsDiv.append(columnInputDiv);
    });

    const columnsDivOnOff = $("#OnOff");

    response.forEach((cell, index) => {
    const columnSelectDiv = $("<div>").addClass("col-3 text-center");
    const columnSelect = $("<select>")
        .addClass("form-select form-select-sm")
        .attr("name", "OnOff[]")
        .attr("aria-label", ".form-select-sm example");

    const option1 = $("<option>")
        .attr("value", "0")
        .text("Добавлять")
        .prop("selected", true);

    const option2 = $("<option>")
        .attr("value", "1")
        .text("Не добавлять столбец");

    columnSelect.append(option1);
    columnSelect.append(option2);

    columnSelectDiv.append(columnSelect);
    columnsDivOnOff.append(columnSelectDiv);
    });

    const columnsDivNumber = $("#numberColumns");

    response.forEach((cell, index) => {
    const columnInputDiv = $("<div>").addClass("col-3 text-center");
    const columnInput = $("<input>")
        .attr("type", "text")
        .addClass("form-control")
        .attr("placeholder", "Номер столбца")
        .attr("name", "numberColumns[]")
        .attr("id", "login")
        .val(index + 1)
        .prop("required", true);

    columnInputDiv.append(columnInput);
    columnsDivNumber.append(columnInputDiv);
    });

    const columnsDivSearch = $("#search");

    response.forEach((cell, index) => {
    const searchInputDiv = $("<div>").addClass("col-3 text-center");
    const searchInput = $("<input>")
        .attr("type", "text")
        .addClass("form-control")
        .attr("name", "search[]")
        .attr("id", "login");

    searchInputDiv.append(searchInput);
    columnsDivSearch.append(searchInputDiv);
    });
    $("#settingBlock").css("display", "block");
}