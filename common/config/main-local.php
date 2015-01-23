<?php

$dbName='blog';
$dbHost='192.168.10.10';
$dbUsername='root';
$dbPassword='123456';

//coding
if(isset($_ENV["DATABASE_URL"])){
    $db=parse_url($_ENV["DATABASE_URL"]);
    $dbName=trim($db["path"],"/");
    $dbHost=$db["host"];
    $dbUsername=$db["user"];
    $dbPassword=$db["pass"];
}

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host='.$dbHost.';dbname='.$dbName,
            'username' => $dbUsername,
            'password' => $dbPassword,
            'charset' => 'utf8',
            'tablePrefix'=>'moblog_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];