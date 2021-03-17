<?php
return [
    'url' => [
        'prefix_admin'   => 'myweb',
        'prefix_user'  => '',
    ],
    'format'           => [
        'long_time'    => 'H:m:s d/m/Y',
        'short_time'   => 'd/m/Y',
    ],
    'btn_status' => [
        'default'       => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        0               => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info btn-status-ajax'],
        1               => ['name' => 'Kích hoạt', 'class'      => 'btn-success btn-status-ajax'],
        
    ],
    'btn_status_contact' => [
        'default'        => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        0                => ['name' => 'Chưa liên hệ', 'class' => 'btn-secondary status-contact'],
        1                => ['name' => 'Đã liên hệ', 'class'   => 'btn-success status-contact'],
        
    ]
];