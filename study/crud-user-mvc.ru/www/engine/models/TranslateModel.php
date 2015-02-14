<?php

class TranslateModel extends CModel {
    public function __constuct() {

    }

    public function update($arrayNewTranslate,$arrayOldTranslate) {
        $arrDiff = array_diff($arrayNewTranslate,$arrayOldTranslate);
        $arrIntersect = array_intersect($arrayNewTranslate,$arrayOldTranslate);
        $arrResult = array_merge($arrDiff,$arrIntersect);
        CMain::setTranslateArray($arrResult);
        return $arrResult;
    }
} 