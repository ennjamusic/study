<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.02.15
 * Time: 1:43
 */

class SiteModel extends CModel {

    public function __constuct() {

    }

    public function update($arrResult) {
        CMain::setSettingsArray($arrResult);
        return $arrResult;
    }

} 