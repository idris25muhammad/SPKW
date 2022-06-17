<?php

$database_config = [
 'driver'=>'mysql',
    'host'=>'mysql-master-vais',
    'database'=>'vais',
    'username'=>'root',
    'password'=>'rahasia123',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>''
];


// $database_config = [
//     'driver'=>'mysql',
//        'host'=>'mysql-master-autentikasi',
//        'database'=>'vaisdb-autentikasi',
//        'username'=>'root',
//        'password'=>'rahasia123',
//        'charset'=>'utf8',
//        'collation'=>'utf8_unicode_ci',
//        'prefix'=>''
//    ];


$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($database_config);
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;