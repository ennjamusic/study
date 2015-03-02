<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new CMenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("CGmvcController");
        ?>
    </div>
    <div class="column2">

        <form method="post">
            <div>
                Генерировать форму как:<br />
                <select name="genForm">
                    <option value="1">
                        HTML
                    </option>
                    <option value="2">
                        Widget
                    </option>
                </select>
            </div>
            <div class="plug-in-unit">
                <div class="htmlForm">
                    <p>HTML</p>
                </div>
                <div class="widgetForm" style="display:none">
                    <p>Widget</p>
                </div>
            </div>
        </form>

    </div>

</div>