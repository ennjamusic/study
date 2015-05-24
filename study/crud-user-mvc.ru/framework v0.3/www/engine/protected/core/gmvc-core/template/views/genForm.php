<div class="wrapper">
    <div class="column1">
        <?php
        $menu = new MenuWidget("/engine/protected/core/gmvc-core/lang/".DEFAULT_LANG.".json");
        $menu->getMenu("GmvcController");
        ?>
    </div>
    <div class="column2">
        <h2>Генерация формы</h2>
        <form method="post">
            <div>
                Генерировать форму как:<br />
                <select name="genForm">
                    <option value="html">
                        HTML
                    </option>
                    <option value="widget">
                        Widget
                    </option>
                </select><br />
                Путь относительно папки "engine" до файла для создания формы: <br />
                <input type="text" name="pathForm" size="50" /><br />
                Атрибуты формы(method,action,class...) через запятую: <br />
                <input type="text" name="formAttrs" size="50" />

                    <table class="createForm">
                        <tr>
                            <td>Имя поля</td>
                            <td>Тип поля</td>
                            <td>Класс</td>
                            <td>Значение по умолчанию</td>
                            <td>Id</td>
                            <td class="small manage">
                                <span class="add">+</span>
                            </td>
                        </tr>
                        <tr class="copyField">
                            <td><input type="text" name="FIELDS[0][nameField]" /></td>
                            <td>
                                <select name="FIELDS[0][typeField]">
                                    <option value="text">
                                        text
                                    </option>
                                    <option value="password">
                                        password
                                    </option>
                                    <option value="submit">
                                        submit
                                    </option>
                                    <option value="button">
                                        button
                                    </option>
                                    <option value="checkbox">
                                        checkbox
                                    </option>
                                    <option value="radio">
                                        radio
                                    </option>
                                    <option value="hidden">
                                        hidden
                                    </option>
                                </select>
                            </td>
                            <td><input type="text" name="FIELDS[0][classField]" /></td>
                            <td><input type="text" name="FIELDS[0][defaultVal]" /></td>
                            <td><input type="text" name="FIELDS[0][idField]" /></td>
                            <td class="manage"><span class="del">X</span></td>
                        </tr>
                    </table>

            </div>
            <input type="submit" value="Save" name="submit">
        </form>

    </div>

</div>