<div class="column1">
    <ul class="menu">
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CApp::getTranslate("createUser")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CApp::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CApp::getTranslate("translate")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CApp::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">
    <p>
        О продукте
    </p>
</div>