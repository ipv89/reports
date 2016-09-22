<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/22/16
 * Time: 5:37 PM
 */

//get TopItems
$jsonTopItems = file_get_contents('http://192.168.0.19/admin/api.php?topItems');
$topItemsObj = json_decode($jsonTopItems,true);

//get basic stats
$jsonBasicStats = file_get_contents('http://192.168.0.19/admin/api.php');
$basicStatsObj = json_decode($jsonBasicStats);

function getDomainsBlocked($basicStatsObj){

    $domains_being_blocked = $basicStatsObj->domains_being_blocked;

    return ($domains_being_blocked);
}

function getQueriesToday($basicStatsObj){

    $dns_queries_today = $basicStatsObj->dns_queries_today;

    return ($dns_queries_today);
}

function getAdsBlockdToday($basicStatsObj){

    $ads_blocked_today = $basicStatsObj->ads_blocked_today;

    return ($ads_blocked_today);
}

function getAdsPercentToday ($basicStatsObj){

    $ads_percentage_today = $basicStatsObj->ads_percentage_today;

    return ($ads_percentage_today);
}


function getTopQueries($topItemsObj)
{
    $top_queries = '';

    foreach ($topItemsObj['top_queries'] as $key => $value) {


        $top_queries .= ' ' . $key . ' ' . $value . '-';
    }
return $top_queries;
}

function getTopAdds($topItemsObj){

    $top_ads = '';

    foreach($topItemsObj['top_ads'] as $key => $value) {

        $top_ads .= ' ' . $key . ' ' . $value .'-';
    }
    return $top_ads;
}