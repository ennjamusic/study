<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
    <div class="column2">
        <h2>Добро пожаловать в генератор MVC.</h2>
        <p>Здесь вы можете генерировать модель, представление, контроллер и формы HTML.</p>
        <p>При переносе сайта на боевой - данный раздел необходимо запретить в файле .htaccess по адресу /engine/gmvc, а также в файле /engine/protected/config/config.php установить константу GMVC_ON в false в целях безопасности проекта.</p>
    </div>
</div>