<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/22/16
 * Time: 5:33 PM
 */

function db_connect() {


    static $connection;


    if(!isset($connection)) {

        $config = parse_ini_file('../config.ini');
        $connection = mysqli_connect('192.168.0.19',$config['username'],$config['password'],$config['dbname']);
    }


    if($connection === false) {

        return mysqli_connect_error();
    }
    return $connection;
}
