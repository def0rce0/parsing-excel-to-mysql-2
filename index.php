<?php 
require_once 'header.php'; ?>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        checkdbOnLoad();
    });
</script>
<body>
	<div class="section">
        <div class="block-panel-auth">
        <div class="header-panel text-center">
                <h3>Excel to MySQL. DB Connection.</h3>
            </div>
            <div class="main-block-auth" style="min-width:456.8px;">
            <label id="dbmessage" class="form-label text-center dbmessage"></label>
                <form action="" class="dbData" method="post">
                    <input id="password" type="text" class="form-control" placeholder="Хост" name="host">
                    <input id="password" type="text" class="form-control" placeholder="Пользователь" name="user">
                    <input id="password" type="text" class="form-control" placeholder="Пароль" name="password">
                    <input id="password" type="text" class="form-control" placeholder="Название БД" name="database">
                    <div class="buttons d-flex justify-content-center">
                        <button type="button" onclick="DbSave()" class="dbData btn btn-primary button-auth" class="btn btn-primary button-auth">Сохранить</button>
                        <button type="button" class="btn btn-primary button-auth" id="nextbtn" style="margin-left:15px;" disabled><a href="setting">Подтвердить</a></button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</body>
</html>