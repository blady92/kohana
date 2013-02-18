<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
    'default' => array
    (
        'type'       => 'MySQL',
        'connection' => array(
            'hostname'   => 'localhost',
            'username'   => 'mryohan',
            'password'   => '',
            'persistent' => FALSE,
            'database'   => 'db',
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
    ),
);
