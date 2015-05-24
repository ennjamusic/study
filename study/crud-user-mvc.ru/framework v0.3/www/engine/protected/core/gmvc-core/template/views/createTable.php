<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new MenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("GmvcController");
        ?>
    </div>
    <div class="column2">
        <h2>Создание таблицы базы данных</h2>
        <div>
            <form method="post">
                Имя таблицы базы данных<br />
                <input type="text" name="tableName" size="50" /><br />
                Атрибуты таблицы(движок, кодировка - необязательно*):<br />
                <input type="text" name="tableAttrs" size="50" /><br />
                <table class="createTable">
                    <tr>
                        <td>
                            Имя записи
                        </td>
                        <td>
                            Тип записи
                        </td>
                        <td class="small">
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
                        <td class="small">
                            NULL
                        </td>
                        <td class="small">
                            AUTO INCREMENT
                        </td>
                        <td class="small">
                            <span class="del">X</span>
                            <span class="add">+</span>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="FIELDS[0][fieldName]" /></td>
                        <td><input type="text" name="FIELDS[0][fieldType]" /></td>
                        <td class="small"><input type="text" name="FIELDS[0][lengthType]" /></td>
                        <td><input type="text" name="FIELDS[0][keyType]" /></td>
                        <td><input type="text" name="FIELDS[0][defaultVal]" /></td>
                        <td><input type="text" name="FIELDS[0][indexVal]" /></td>
                        <td><input type="text" name="FIELDS[0][constraint]" /></td>
                        <td class="small"><input type="checkbox" name="FIELDS[0][ifNull]" /></td>
                        <td class="small"><input type="radio" name="FIELDS[0][ifAI]" /></td>
                        <td class="small">
                            <span class="del">X</span>
                            <span class="add">+</span>
                        </td>
                    </tr>
                </table>
                <div><input type="submit" name="save" value="Save"></div>
            </form>
        </div>
    </div>
</div>