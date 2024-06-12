<?php 
require_once 'header.php'; ?>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        checkFile();
        $("#settingBlock").css("display", "none");
    });
</script>
<body>
	<div class="section">
        <div class="block-panel-auth">
            <div class="header-panel text-center">
                <h3>Excel to MySQL. Select File.</h3>
            </div>
            <div class="main-block-auth">
                <form action="" method="post" class="uploadfile" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Загрузите файл формата .xls</label>
                        <input class="form-control" onchange="inputfileChange()" type="file" id="formFile" name="file" accept=".xls" required>
                    </div>
                </form>
            </div>
		</div>
        <div class="block-panel-auth" id="settingBlock" style="margin-top: 50px;">
            <div class="header-panel text-center">
                <h3>Excel to MySQL. Parsing setting.</h3>
            </div>
            <div class="main-block-auth" style="width:800px">
                <form action="final" method="post">
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                        <input id="password" type="text" class="form-control" placeholder="Название таблицы" name="dbname" id="login" required>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label text-center">Полученные столбцы</label>
                        <div class="row" id="columns">
                            
                        </div>
                        <label for="exampleFormControlInput1" class="form-label text-center">Столбцы</label>
                        <div class="row" id="OnOff">
            
                        </div>
                        <label for="exampleFormControlInput1" class="form-label text-center">Номер столбца в БД</label>
                        <div class="row" id="numberColumns">

                        </div>
                        <label for="exampleFormControlInput1" class="form-label text-center">Поиск или ввод диапазона</label>
                        <div class="row" id="search">

                        </div>
                        <label for="exampleFormControlInput1" class="form-label text-center">Количество полей(0 = все строки).</label>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <input id="password" type="text" class="form-control" name="sizeSearch" id="login" value="0" required>
                            </div>
                        </div>
                        <div class="buttons d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary button-auth">Подтвердить</button>
                            <button type="button" class="btn btn-primary button-auth" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 15px;">
                                Справка по поиску
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Справка по поиску.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Артикул</h3>
                        <p>В поиске можно использовать следующие символы: ; используется когда берём диапазон формата E4100;E4700. - используется когда числовой диапазон </p>
                        <p>Можно найти одиночный Артикул, если поле не будет содержать ни одного спец.символа выше.</p>
                        <h3>Наименование</h3>
                        <p>Не поддерживает спец.символы. Работает только с полными названиями или их частями.</p>
                        <h3>Цена</h3>
                        <p>Поддерживает символы: - диапазон чисел. < меньше заданного числа. > больше заданного числа. Больше меньше вводить в формате <число. Пример: <3500</p>
                        <h3>Остаток</h3>
                        <p>Аналогично цене.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</body>
</html>