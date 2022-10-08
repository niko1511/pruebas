
<?php
include_once '../config/connectClass.php';
class Intraday extends connect
{
    private $db;
    public $rows;

    public function __construct()
    {
        $this->db = connect::conexion();
    }
    public function timeSeriesIntraday()
    {

        // replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
        return $data = file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=OCGN&outputsize=full&apikey=0XQB6K7M2RYU0QE6");
    }
}
