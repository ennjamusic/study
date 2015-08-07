<?php

class CModule {

    public function includeModule($includesAliases = []) {

        if(!empty($includesAliases)) {
            foreach($includesAliases as $include) {
                $path = CFiles::getPathFromAlias($include,'modules');
                CFiles::includeAllDir($path);
            }
        }

    }

} 