$("form").submit(function(event) {
    const numberColumns = [];
    const $inputs = $("#numberColumns input[name='numberColumns[]']");

    $inputs.each(function() {
        const value = $(this).val().trim();
        if (!/^\d+$/.test(value) || value < 1 || value > 4) {
        alert("Номер столбца должен быть числом от 1 до 4");
        event.preventDefault();
        return;
        }
        if (numberColumns.includes(value)) {
        alert("Номер столбца должен быть уникальным");
        event.preventDefault();
        return;
        }
        numberColumns.push(value);
    });
});