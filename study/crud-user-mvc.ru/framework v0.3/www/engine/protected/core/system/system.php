<?php
$rootPath = $_SERVER["DOCUMENT_ROOT"]."/engine/";
return [
    'Gmvc' => [
        'pathToFile' => $rootPath."protected/core/gmvc-core/"
    ],
    'Controller' => [
        'pathToFile' => $rootPath."controllers/"
    ],
    'Model' => [
        'pathToFile' => $rootPath."models/"
    ],
    'Module' => [
        'pathToFile' => $rootPath."protected/modules/"
    ],
    'Exception' => [
        'pathToFile' => $rootPath."protected/core/exceptions/"
    ],
    'Cache' => [
        'pathToFile' => $rootPath."protected/core/cache/"
    ],
    'Widget' => [
        'pathToFile' => $rootPath."protected/core/widgets/"
    ],
];