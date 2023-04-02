<?php

return [
    'default-storage' => 'file',

    'storages' => [
        'file' => [
            'class' => \Vigorexa\InetstudioTest\Architecture\Third\KeyStorages\FileKeyStorage::class,
            'config' => ['path' => '/path/to/file.txt']
        ],
        'database' => [
            'class' => \Vigorexa\InetstudioTest\Architecture\Third\KeyStorages\DatabaseKeyStorage::class,
            'config' => ['host' => 'localhost', 'port' => 3306, 'user' => 'root', 'password' => 'root']
        ]

        // etc...
    ]
];