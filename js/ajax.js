function DbSave() {
        let form = $('.dbData');
        $.ajax({
            url: 'function/saveDB.php',
            dataType:'JSON',
            type: 'post',
            data: form.serialize(),
            success: function(response) {
            if (response.error) {
                    alert(123);
                } else {
                    alert(321);
                }
            },
    });
}