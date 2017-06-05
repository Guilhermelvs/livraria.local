<?php
$path = dirname(dirname(__FILE__)) . '/autoload.php';
require_once($path); //echo '<br>conecta ok -> '. $path;

abstract class ConnectDB
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $database = DB_NAME;
    private $conect = '';
    private $dataset = NULL;
    public $row = -1;

    /**
     * @method __construct(), __destruct()
     *
     * @uses All class
     */

    public function __construct(){ $this->Connect();}
    public function __destruct()
    {
        //
    }

    /**
     * @method Connect()
     *
     * @uses connection > db
     */

    public function Connect()
    {
        $this->conect = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->pass);
        $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->conect;
    }

    /**
     * @method insertDB
     * @param object $object
     *
     * @example run > INSERT INTO <table> (column1, column2, columnX) VALUES (value1, value2, valueX)
     */

    public function insertDB($object, $rquery=false)
    {
        $obj = new $object;
        $obj->selectDB($obj);

        $sql = 'INSERT INTO ' . $object->table_name . '(' . $object->columnPrimaryKey . ', ';

        for($i = 0; $i < count($object->columns); $i++){
            $sql.= key($object->columns);

            if($i < (count($object->columns)-1)){
                $sql.= ', ';
            } else {
                $sql.= ') ';
            }

            next($object->columns);
        }

        reset($object->columns);

        $sql.= 'VALUES (' . ($obj->row+1) . ', ';

        for($i = 0; $i < count($object->columns); $i++){
            $sql.= is_numeric($object->columns[key($object->columns)]) ? $object->columns[key($object->columns)] : "'" . $object->columns[key($object->columns)] . "'";

            if($i < (count($object->columns)-1)){
                $sql.= ', ';
            } else {
                $sql.= '); ';
            }

            next($object->columns);
        }

        if($rquery == false) return $this->executeSql($sql); else return $sql;
    }

    /**
     * @method updateDB
     * @param object $object
     *
     * @example run > UPDATE <table> SET column1=value1, columnX=valueX WHERE columnPrimaryKey=valuePrimaryKey
     */

    public function updateDB($object, $rquery=false)
    {
        $sql = 'UPDATE ' . $object->table_name . ' SET ';

        for($i = 0; $i < count($object->columns); $i++){
            $sql.= key($object->columns) . "=";
            $sql.= is_numeric($object->columns[key($object->columns)]) ? $object->columns[key($object->columns)] : "'" . $object->columns[key($object->columns)] . "'";

            if($i < (count($object->columns)-1)){
                $sql.= ', ';
            } else {
                $sql.= ' ';
            }

            next($object->columns);
        }
        $sql.= " WHERE " . $object->columnPrimaryKey . "=";
        $sql.= is_numeric($object->valuePrimaryKey) ? $object->valuePrimaryKey : "'" . $object->valuePrimaryKey . "'; ";

        if($rquery == false) return $this->executeSql($sql); else return $sql;
    }

    /**
     * @method deleteDB
     * @param object $object
     *
     * @example run > DELETE FROM <table> WHERE columnPrimaryKey=valuePrimaryKey
     */

    public function deleteDB($object, $rquery=false)
    {
        $sql = 'DELETE FROM ' . $object->table_name;
        $sql.= " WHERE " . $object->columnPrimaryKey . "=";
        $sql.= is_numeric($object->valuePrimaryKey) ? $object->valuePrimaryKey : "'" . $object->valuePrimaryKey . "'; ";

        if($rquery == false) return $this->executeSql($sql); else return $sql;
    }

    /**
     * @method selectDB
     * @param object $object
     *
     * @example run > SELECT FROM <table>
     */

    public function selectDB($object, $rquery=false)
    {
        $sql = 'SELECT * FROM ' . $object->table_name;

        if($object->extraSelect != NULL){
            $sql.= ' ' . $object->extraSelect;
        }

        if($rquery == false) return $this->executeSql($sql); else return $sql;
    }

    /**
     * @method selectDB
     * @param object $object
     *
     * @example run > SELECT FROM <table>
     */

    public function innerJoinDB($object, array $join, $rquery=false)
    {
        $sql = 'SELECT * FROM ' . $object->table_name;

        for($i=0; $i < count($join); $i++){
            $sql.= ' INNER JOIN ' . key($join) . ' ON '. key($join) .'.'. key($join) .'_id = ' . $object->table_name . '.' . $join[key($join)];

            next($join);
        }

        if($object->extraSelect != NULL){
            $sql.= ' ' . $object->extraSelect;
        }

        if($rquery == false) return $this->executeSql($sql); else return $sql;
    }

    /**
     * @method executeSql
     * @param String $sql
     *
     * @uses insertDB, updateDB, deleteDB, selectDB
     */

    public function executeSql($sql=NULL)
    {
        if($sql != NULL){
            $query_pdo = $this->Connect()->prepare($sql) or $this->errorManager(__FILE__, __FUNCTION__, NULL, 'PDO Error');
            $query_pdo->execute();
            $this->row = $query_pdo->rowCount();

            if(substr(trim(strtolower($sql)), 0, 6) == 'select'){
                $this->dataset = $query_pdo;

                return $query_pdo;
            } else {
                return $this->row;
            }
        } else {
            $this->errorManager(__FILE__, __FUNCTION__, NULL, 'Comando sql nao informado');
        }
    }

    /**
     * @method dataReturn
     * @param String $tipo
     *
     * @uses selectDB > return records
     */

    public function dataReturn($tipo=NULL)
    {
        switch (strtolower($tipo)){
            case 'array':
                return $this->dataset->fetchAll(PDO::FETCH_ASSOC);
                break;
            case 'assoc':
                return $this->dataset->fetchAll(PDO::FETCH_ASSOC);
                break;
            case 'object':
                return $this->dataset->fetchObject();
                break;
            case 'not':
                return $this->dataset;
                break;
            default:
                return $this->dataset->fetchObject();
                break;
        }
    }

    /**
     * @method errorManager
     * @param String $file, String $function, int $code, String $msg, boolean $createExcept
     *
     * @uses all methods
     */

    public function errorManager($file=NULL, $procedure=NULL, $codeError=NULL, $msgError=NULL, $createExcept=FALSE)
    {
        if($file == NULL) $file = '[ sem arquivo ]';
        if($procedure == NULL) $procedure = '[ sem rotina ]';
        if($codeError == NULL) $codeError = mysql_errno($this->conect);
        if($msgError == NULL) $msgError = mysql_error($this->conect);

        $return = '<br><br>Detalhes erro:';
        $return.= '<br><strong>Arquivo:</strong> ' . $file;
        $return.= '<br><strong>Rotina:</strong> ' . $procedure;
        $return.= '<br><strong>Codigo:</strong> ' . $codeError;
        $return.= '<br><strong>Mensagem:</strong> ' . $msgError;

        if($createExcept == FALSE){
            echo $return;
        } else {
            die ($return);
        }
    }
}
