<?php
include_once '../models/timeSeriesIntradayModel.php';
$intraday = new Intraday();
$rows = $intraday->timeSeriesIntraday();

$json_a = json_decode($rows, true);

//echo '<pre>';
//print_r($json_a);

foreach ($json_a as $key => $rows) {

	$file = fopen("../servidor/cargaIntradayXML.php", "w");
	$txt = utf8_encode('<?php ') . "\r\n";
	$txt .= utf8_encode('header("Content-Type: application/xml");') . "\r\n";
	$txt .= utf8_encode("echo(" . "'" . "<INTRADAY>" . "\r\n");
	fwrite($file, $txt . PHP_EOL);

	$txt = utf8_encode("<METADATA>" . "\r\n");
	$txt .= utf8_encode("<INFORMATION>" . $json_a['Meta Data']['1. Information'] . "</INFORMATION>\r\n");
	$txt .= utf8_encode("<SYMBOL>" . $json_a['Meta Data']['2. Symbol'] . "</SYMBOL>\r\n");
	$txt .= utf8_encode("<LASTREFRESH>" . $json_a['Meta Data']['3. Last Refreshed']  . "</LASTREFRESH>\r\n");
	$txt .= utf8_encode("<OUTPUTSIZE>" . $json_a['Meta Data']['4. Output Size']  . "</OUTPUTSIZE>\r\n");
	$txt .= utf8_encode("<TIMEZONE>" . $json_a['Meta Data']['5. Time Zone']  . "</TIMEZONE>\r\n");
	$txt .= utf8_encode('</METADATA>');
	fwrite($file, $txt . PHP_EOL);

	foreach ($rows as $key => $row) {

		$txt = utf8_encode("<DAY>" . "\r\n");
		$txt .= utf8_encode("<TIME>" . $key . "</TIME>\r\n");
		if (!empty($row['1. open'])) {
			$txt .= utf8_encode("<OPEN>" . (float)  $row['1. open'] . "</OPEN>\r\n");
		}
		if (!empty($row['2. high'])) {
			$txt .= utf8_encode("<HIGH>" . (float) $row['2. high']  . "</HIGH>\r\n");
		}
		if (!empty($row['3. low'])) {
			$txt .= utf8_encode("<LOW>" . (float) $row['3. low'] . "</LOW>\r\n");
		}
		if (!empty($row['4. close'])) {
			$txt .= utf8_encode("<CLOSE>" . (float) $row['4. close'] . "</CLOSE>\r\n");
		}
		if (!empty($row['5. volume'])) {
			$txt .= utf8_encode("<VOLUME>" . (float) $row['5. volume'] . "</VOLUME>\r\n");
		}
		$txt .= utf8_encode('</DAY>');
		fwrite($file, $txt . PHP_EOL);
	}
}
$txt = utf8_encode("</INTRADAY>" . "');");
fwrite($file, $txt . PHP_EOL);
$txt = utf8_encode("?>");
fwrite($file, $txt . PHP_EOL);
fclose($file);

include_once '../views/timeSeriesIntradayView.php';
