<?php 
require_once 'header.php'; 
require_once 'function/parsingData.php';?>
<body>
	<div class="section">
        <div class="block-panel-auth">
        <div class="header-panel text-center">
                <h3>Excel to MySQL. Final.</h3>
            </div>
            <div class="main-block-auth" style="width: 900px;">
                        <div class="buttons d-flex justify-content-center" style="margin-bottom:15px;">
                            <button type="submit" class="btn btn-primary button-auth"><a href="/parse">Загрузить новый файл</a></button>
                            <button type="submit" class="btn btn-primary button-auth"><a href="/parsing">Изменить настройки парсера</a></button>
                        </div>
                <div class="row justify-content-center">
                        <?php $rows = array_keys($dataTable[0]);
                        if(is_array($dataTable)) {
                        ?>
                        
                        <table border="2" class="text-center" style="width: 800px;">
                            <tr>
                            <tr>
                            <?php foreach ($rows as $row) {?>
                                <td class="text-center"><?= $row?></td>
                            <?php }?>
                            </tr>
                            </tr>
                            <?php foreach ($dataTable as $row) {?>
                            <tr>
                                <?php foreach ($row as $cell) {?>
                                    <td><?= $cell?></td>
                                <? } ?>
                            </tr>
                            <?php }?>
                            </table>
                        <?php } else { ?>
                            <h3>Данные не были загружены. Или поиск не дал результатов</h3>
                            <?
                        }; ?>

                </div>
            </div>
		</div>
	</div>
</body>
</html>