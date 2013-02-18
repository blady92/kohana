<?php defined('SYSPATH') or die('No Direct Script Access');

class Model_Example extends ORM {
 
    protected $_rules = array(
        'username' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(32),
            'regex'      => array('/^[-\pL\pN_.]++$/uD'),
        ),
        'firstname' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(32),
            'regex'      => array('/^[-\pL\pN_.]++$/uD'),
        ),
        'lastname' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(32),
            'regex'      => array('/^[-\pL\pN_.]++$/uD'),
        ),
        'email' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(127),
            'email'      => NULL,
        ),
    );
}