<div>
    <div>
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
</div>