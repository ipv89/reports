<?php 



ini_set('display_errors', 1); 
error_reporting(E_ALL);

$json = file_get_contents('http://192.168.0.19/admin/api.php');
$obj = json_decode($json);
var_dump($json);

$domains_being_blocked = $obj->domains_being_blocked;
$dns_queries_today = $obj->dns_queries_today;
$ads_blocked_today = $obj->ads_blocked_today;
$ads_percentage_today = $obj->ads_percentage_today;

echo ($domains_being_blocked);


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

function db_query($query) {

    $connection = db_connect();


    $result = mysqli_query($connection,$query);

    return $result;
}



$result = db_query("INSERT INTO `baisc_stats` (`domains_being_blocked`,`dns_queries_today`,`ads_blocked_today`,`ads_percentage_today`) VALUES ('$domains_being_blocked','$dns_queries_today','$ads_blocked_today','$ads_percentage_today')");
if($result === false) {

	echo "no working";


} else {
	echo "working";

}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}



