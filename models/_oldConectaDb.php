<?php


$path = dirname(dirname(__FILE__)) . '/autoload.php';
require_once($path); echo '<br>conecta ok -> '. $path;


/***************************************************************
/*     Classe para manipulação do SGBD
/*    @version 1.5
*     @author Sidney Lima
*/

abstract class ConnectDB
{
    //atributos para configuração do MySQL
    private $banco;
    private $server;
    private $login;
    private $senha;

    //atributos para operações com MySQl
    private $con;
    private $sql;

    private $dataset = NULL;
    public $row = -1;

    public function __construct()
    {
        $this->database  = "livraria_local";  //o database do projeto
        $this->host = "localhost";       //endereço do seu servidor MySQL
        $this->user  = "root";            //login usado no MySQL
        $this->pass  = "vagrant";         //senha usada no MySQL
        $this->conectar();
    }

    /**
     * Quando destroi o objeto MySQL Fecha a conexão
     *
     */
    public function __destruct()
    {
        //
    }

    /**
     * Conectar banco de dados
     *
     */
    public function conectar()
    {
        $this->$con = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->pass);
        $this->$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->$con;
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
            echo "string";
			$query_pdo = $this->conectar()->prepare($sql) or $this->errorManager(__FILE__, __FUNCTION__, NULL, 'PDO Error');
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
				return mysql_fetch_array($this->dataset);
				break;
			case 'assoc':
				return mysql_fetch_assoc($this->dataset);
				break;
			case 'object':
				return mysql_fetch_object($this->dataset);
				break;
			default:
				return mysql_fetch_object($this->dataset);
				break;
		}
	}

    /**
     * @method selectDB
     * @param object $object
     *
     * @example run > SELECT FROM <table>
     */

    public function selectDB($object, $rquery=false)
    {
        $sql = 'SELECT * FROM ' .  $object->table_name;

        if($object->extraSelect != NULL){
            $sql.= ' ' . $object->extraSelect;
        }

        if($rquery == false){
            return $this->executeSql($sql);
        } else {
            return $sql;
        }
    }

    /**
     * Suporte a transações
     *
     */
    public function begin()
    {
        mysql_query("START TRANSACTION", $this->con);
        mysql_query("BEGIN", $this->con);
    }

    public function commit()
    {
        mysql_query("COMMIT", $this->con);
    }

    public function rollback()
    {
        mysql_query("ROLLBACK", $this->con);
    }

    public function transaction($queries)
    {
        $this->begin();

        foreach($queries as $qvalue){
            $result = mysql_query($qvalue);
        }

        if (mysql_error()){
            $this->rollback();
            throw new Exception('A transação não pode ser efetuada'); //chama a função erro()
        } else {
            $this->commit();
            return true;
        }
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

        $sql = 'INSERT INTO ' .  $object->table_name . '(' . $object->columnPrimaryKey . ', ';

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

        if($rquery == false) return $this->query($sql); else return $sql;
    }

    /**
     * @method updateDB
     * @param object $object
     *
     * @example run > UPDATE <table> SET column1=value1, columnX=valueX WHERE columnPrimaryKey=valuePrimaryKey
     */

    public function updateDB($object, $rquery=false)
    {
        $sql = 'UPDATE ' .  $object->table_name . ' SET ';

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
        $sql.= "WHERE " . $object->columnPrimaryKey . "=";
        $sql.= is_numeric($object->valuePrimaryKey) ? $object->valuePrimaryKey : "'" . $object->valuePrimaryKey . "'; ";

        if($rquery == false) return $this->query($sql); else return $sql;
    }

    /**
     * @method deleteDB
     * @param object $object
     *
     * @example run > DELETE FROM <table> WHERE columnPrimaryKey=valuePrimaryKey
     */

    public function deleteDB($object, $rquery=false)
    {
        $sql = 'DELETE FROM ' .  $object->table_name;
        $sql.= "WHERE " . $object->columnPrimaryKey . "=";
        $sql.= is_numeric($object->valuePrimaryKey) ? $object->valuePrimaryKey : "'" . $object->valuePrimaryKey . "'; ";

        if($rquery == false) return $this->query($sql); else return $sql;
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
?>
