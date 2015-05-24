<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new MenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("GmvcController");
        ?>
    </div>
    <div class="column2">
        <h2>Генерация контроллера</h2>
        <p>Для генерации контроллера необходимо указать его имя и действия. Если не указать действия, по умолчанию будет сгенерировано только действие index.</p>
        <form method="post">
            <div>Имя контроллера <br /><input size="50" type="text" name="newController"></div>
            <div>Действия контроллера <br /><input size="50" type="text" name="views"></div>
            <div><br /><input type="submit" name="save" value="Сохранить"></div>
        </form>
    </div>
</div>