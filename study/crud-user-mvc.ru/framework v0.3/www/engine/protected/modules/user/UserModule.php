<?php

class UserModule extends CModule{

    public function includeModule() {
        parent::includeModule([
            'user.controllers',
            'user.models',
        ]);
    }


} 