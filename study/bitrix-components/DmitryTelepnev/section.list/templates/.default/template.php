<h2>Разделы</h2>
<ul>
    <? foreach($arResult as $arSections): ?>
        <li><a href="<?=$arSections["SECTION_PAGE_URL"]?>" title="<?=$arSections["NAME"]?>"><?=$arSections["NAME"]?> (<?=$arSections['ELEMENT_CNT']?>)</a></li>
    <? endforeach; ?>
</ul>
