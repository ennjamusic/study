<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
    <div class="column2">
    </div>

</div>