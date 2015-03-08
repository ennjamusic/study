<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
    <div class="column2">

        <h2>Генерация модели</h2>

        <form method="post">
            Введите имя модели, которую хотите сгенерировать<br />
            <input type="text" name="modelName"/><br />
            <input type="submit" name="save" value="Save" />
        </form>

    </div>

</div>