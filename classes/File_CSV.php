<?php
class File_CSV
{
    /**
    *@var instance
    */
    protected static $instance;

    /**
    *@var array; contains csv text formatted to upload in mysql
    */

    public $arrayList = array();

    protected function __construct(){}

    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance =  new File_CSV; 

        return self::$instance;
    }

    /**
     *@param string $file csv path.
    */
    public function getCVSArrayList($file)
    {
        if (($gestor = fopen(_CSV_DIR_.$file, "r")) !== FALSE) {
            $datos = fgetcsv($gestor, 1000);
            $this->arrayList['index'] = self::getFormattedSQLFields($datos[0]);

            while (($row = fgetcsv($gestor, 1000)) !== FALSE) {
                $numero = count($row);
                $fila++;
                for ($c=0; $c < $numero; $c++) {
                    $values .= '('.$row[$c] . '),';
                }
            }
            fclose($gestor);
        }
        $this->arrayList['values'] = self::getFormattedSQLValues($values);
        return $this->arrayList;
    }


    public function getFormattedSQLFields($string)
    {
        $string = str_replace('"', '', $string);
        return '('.str_replace(';', ',', $string).')';
    }

    public function getFormattedSQLValues($string)
    {
        $string = str_replace(';', ',', $string);
        return rtrim($string, ",");
    }

 
}

?>