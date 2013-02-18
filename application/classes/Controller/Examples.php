<?php defined('SYSPATH') or die('No Direct Script Access');

class Controller_Examples extends Controller_Template {
    
    public $template = 'exampleview';
 
    public function action_index()
    {
        // -------------
        // - Example 1 -
        // -------------
 
        // Create an instance of a model
        $member = ORM::factory('Example');
 
        // Get all members with the First name "Peter" find_all()
        // means we get all records matching the query.
        $member->where('firstname', '=', 'Peter')->find_all();
 
        // Count records in the $member object
        $member->count_all();
 
        // -------------
        // - Example 2 -
        // -------------
 
        // Create an instance of a model
        $member = ORM::factory('example');
 
        // Get a member with the user name "bongo" find() means
        // we only want the first record matching the query.
        $member->where('username', '=', 'bongo')->find();
 
        // -------------
        // - Example 3 -
        // -------------
 
        // Create an instance of a model
        $member = ORM::factory('example');
 
        // Do a INSERT query
        $member->username = 'bongo';
        $member->firstname = 'Peter';
        $member->lastname = 'Smith';
        $member->save();
 
        // -------------
        // - Example 4 -
        // -------------
 
        // Create an instance of a model where the
        // table field "id" is "1"
        $member = ORM::factory('example', 1);
 
        // You can create the instance like below
        // If you do not want to use the "id" field
        $member = ORM::factory('example')->where('username', '=', 'bongo')->find();
 
        // Do a UPDATE query
        $member->username = 'bongo';
        $member->firstname = 'Peter';
        $member->lastname = 'Smith';
        $member->save();
    }
}