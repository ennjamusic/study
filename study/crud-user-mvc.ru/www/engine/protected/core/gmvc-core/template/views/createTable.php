<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
    <div class="column2">
        <div class="createTable">
            <form method="post">
                <div><input type="text"></div>
                <div><input type="submit" name="save" value="Save"></div>
            </form>
        </div>
    </div>
</div>