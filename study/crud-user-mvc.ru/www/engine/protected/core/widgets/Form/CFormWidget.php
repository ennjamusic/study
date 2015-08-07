<?php

class CFormWidget {

    public function startForm($formAtr=array()) {
        $result = "<form";
        if(!empty($formAtr)) {
            foreach($formAtr as $k=>$v) {
                $result.=" ".$k.'="'.$v.'"';
            }
        }
        $result.=">";
        echo $result;
    }

    public function getFields($fieldsArray=array()) {
        $result = "";
        foreach($fieldsArray as $key => $value) {
            $result.=$key."<input ";
            foreach($value as $k=>$v) {
                $result.=$k.'="'.$v.'"';
            }
            $result.=" /><br />";
        }

        echo $result;
    }

    public function getSubmit($submitAttr) {
        $result = '<input type="submit"';
        foreach($submitAttr as $k=>$v) {
            $result.=$k.'="'.$v.'"';
        }
        $result.=" />";
        echo $result;
    }

    public function endForm() {
        echo "</form>";
    }

} 