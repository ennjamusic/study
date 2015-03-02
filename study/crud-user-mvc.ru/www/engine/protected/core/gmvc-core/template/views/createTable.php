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
                <table>
                    <tr>
                        <td>
                            Имя записи
                        </td>
                        <td>
                            Тип записи
                        </td>
                        <td>
                            Длина записи
                        </td>
                        <td>
                            Ключ
                        </td>
                        <td>
                            Значение по умолчанию
                        </td>
                        <td>
                            Индекс
                        </td>
                        <td>
                            Ограничение
                        </td>
                        <td>
                            NULL
                        </td>
                        <td>
                            AUTO INCREMENT
                        </td>
                        <td>
                            UNIQUE
                        </td>
                        <td>
                            <img src="img/del.gif" />
                            <img src="./img/" />
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="fieldName" /></td>
                        <td><input type="text" name="fieldType" /></td>
                        <td><input type="text" name="lengthType" /></td>
                        <td><input type="text" name="keyType" /></td>

                    </tr>
                </table>
                <div><input type="submit" name="save" value="Save"></div>
            </form>
        </div>
    </div>
</div>