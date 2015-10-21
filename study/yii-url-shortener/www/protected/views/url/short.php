<ul>
    <?php
        foreach($urls as $url) {
            ?>
            <li><?=CHtml::link($_SERVER['SERVER_NAME'].'/url/redirect?short_url='.$url->short_url,array('url/redirect','short_url'=>$url->short_url))?></a> - <?=$url->long_url?> </li>
            <?php
        }
    ?>
</ul>