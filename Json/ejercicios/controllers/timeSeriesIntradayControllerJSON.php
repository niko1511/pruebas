<?php
include_once '../models/timeSeriesIntradayModel.php';
$intraday = new Intraday();
$rows = $intraday->timeSeriesIntraday();


$meta = array();
foreach($rows as $key => $row){
    $meta[$key]=$rows ;
}
//echo '<pre>';
//print_r($rows['Meta Data']);
//$intraday->create_table();

$information = $rows['Meta Data']['1. Information'];
$symbol = $rows['Meta Data']['2. Symbol'];
$last_refreshed = $rows['Meta Data']['3. Last Refreshed'];
$out_size = $rows['Meta Data']['4. Output Size'];
$time_zone = $rows['Meta Data']['5. Time Zone'];

//$intraday->insert_meta($information,$symbol,$last_refreshed,$out_size );

//print_r($rows['Time Series (Daily)']);
foreach($rows['Time Series (Daily)'] as $clave => $valor){

    $daily= $clave;
    $open = $valor['1. open'];
    $high = $valor['2. high'];
    $low = $valor['3. low'];
    $close = $valor['4. close'];
    $volume = $valor['5. volume'];
//$intraday->insert_data($daily,$open,$high,$low,$close,$volume ); 
}



include_once '../views/timeSeriesIntradayView.php';

