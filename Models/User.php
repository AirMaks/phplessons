<?php
namespace Models;

class User extends \Database
{
    public $table = 'users';
    public $allowed = [ 'photo', 'name', 'lastname', 'phone' ];

}

?>