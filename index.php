<?php 
require_once 'header.php'; ?>
<body>
	<div class="section">
        <div class="block-panel-auth">
        <div class="header-panel text-center">
                <h3>Excel to MySQL. DB Connection.</h3>
            </div>
            <div class="main-block-auth">
            <label id="dbmessage" class="form-label text-center dbmessage">Полученные данные для авторизации в БД ошибочны.</label>
                <form action="" method="post">
                    <input id="password" type="text" class="form-control" placeholder="Хост" name="host" id="login">
                    <input id="password" type="text" class="form-control" placeholder="Пользователь" name="username" id="password">
                    <input id="password" type="text" class="form-control" placeholder="Пароль" name="password" id="login">
                    <input id="password" type="text" class="form-control" placeholder="Название БД" name="database" id="password">
                    <div class="buttons d-flex justify-content-center">
                        <button type="button" onclick="DbSave()" class="dbData btn btn-primary button-auth" class="btn btn-primary button-auth">Сохранить</button>
                        <button type="button" class="btn btn-primary button-auth" style="margin-left:15px;" disabled><a href="chinazez">Подтвердить</a></button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</body>
</html>