
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
        return $data = json_decode(file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=bngo&outputsize=full&apikey=0XQB6K7M2RYU0QE6"), true);
    }

    
    public function create_table()
    {

        $sql = "CREATE TABLE `ejercicio_plantas`.`meta_data` (`id` INT NOT NULL AUTO_INCREMENT , `information` VARCHAR(100) NOT NULL , `symbol` VARCHAR(20) NOT NULL , `last_refreshed` DATE NOT NULL , `out_size` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $query = $this->db->query($sql);

        $sql = "CREATE TABLE `ejercicio_plantas`.`stocks` (`id_stock` INT NOT NULL AUTO_INCREMENT , `daily` DATE NOT NULL , `open` FLOAT NOT NULL , `high` FLOAT NOT NULL , `low` FLOAT NOT NULL , `close` FLOAT NOT NULL , `volume` INT NOT NULL , PRIMARY KEY (`id_stock`)) ENGINE = InnoDB; ";
        $query = $this->db->query($sql);
       
       
    }

    public function insert_meta($information, $symbol, $last_refreshed, $out_size)
    {

        $sql = " INSERT INTO `meta_data` (`id`, `information`, `symbol`, `last_refreshed`, `out_size`) VALUES (NULL, '$information', '$symbol', '$last_refreshed', '$out_size')";
        $query = $this->db->query($sql);
    }

    public function insert_data($daily,$open,$high,$low,$close,$volume){

        //obtengo el ultimo id ingresado 
		$last_id = $this->db->insert_id;
        $sql = "INSERT INTO `stocks` (`id_stock`, `daily`, `open`, `high`, `low`, `close`, `volume`) VALUES ('$last_id', $daily,$open,$high,$low,$close,$volume); ";
        $query = $this->db->query($sql);

    }
}
