<?php 
require_once 'header.php'; ?>

<script>
    window.addEventListener('DOMContentLoaded', () => {
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
	</div>
</body>
</html>