<ul>
<?php

foreach($classMethods as $value) {
    ?><li><a href="<?=(HFURL_ON)?$value:"?view=".$value?>"><?=CMenuWidget::getTranslate($value)?></a></li><?php
}
?></ul>