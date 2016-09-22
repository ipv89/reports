<?php

include 'db_connect.php';
include 'get_data.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL);


//make calls to get_data.php to gather stats
$top_queries = getTopQueries($topItemsObj);
$top_ads = getTopAdds($topItemsObj);
$domains_being_blocked = getDomainsBlocked($basicStatsObj);
$dns_queries_today = getQueriesToday($basicStatsObj);
$ads_blocked_today = getAdsBlockdToday($basicStatsObj);
$ads_percentage_today = getAdsPercentToday($basicStatsObj);


function db_query($query) {

    $connection = db_connect();


    $result = mysqli_query($connection,$query)or die(mysqli_error($connection));

    return $result;
}


$result = db_query("INSERT INTO `baisc_stats` (`domains_being_blocked`,`dns_queries_today`,`ads_blocked_today`,`ads_percentage_today`,`top_queries`,`top_ads`) VALUES ('$domains_being_blocked','$dns_queries_today','$ads_blocked_today','$ads_percentage_today','$top_queries','$top_ads')");
if($result === false) {

	echo "Something went wrong";


} else {
	echo "Write Success";

}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}



