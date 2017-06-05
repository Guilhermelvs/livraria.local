<?php

$path = dirname(dirname(__FILE__)) . '/autoload.php';
require_once($path); //echo '<br>livro ok -> '. $path;

class Livro extends ConnectDB
{
    public $table_name = '';
	public $columnPrimaryKey = null;
	public $valuePrimaryKey = null;
	public $columns = array();
	public $extraSelect = '';

    /**
    * Construtor do Livro
    *
    * @version 1.0
    */
    function __construct($columns=array())
    {
        $this->table_name = "livros";
        $this->columnPrimaryKey = "livro_id";

        if(sizeof($columns) <= 0){
            $this->columns = array(
                "genero_id" => NULL,
                "nome" => NULL,
                "detalhes" => NULL,
                "valor" => NULL,
            );
        } else {
            $this->columns = $columns;
        }
    }

	// add
	public function addColumn($column=null, $value=null)
	{
		if($column != null) $this->columns[$column] = $value;
	}

	// del
	public function delColumn($column=null)
	{
		if(array_key_exists($column, $this->columns) != null) unset($this->columns[$column]);
	}

	// set
	public function setValue($column=null, $value=null)
	{
		if(($column != null) and ($value != null)) $this->columns[$column] = $value;
	}

	// get
	public function getValue($column=null)
	{
		if(($column != null) and (array_key_exists($column, $this->columns) != null)){
			return $this->columns[$column];
		} else {
			return FALSE;
		}
	}

    /**
    *  @method insertController Atendimento
    *  @param array $data
    *  @category insertDB
    *  @version 1.0
    */
    public function insert(array $data)
    {
        // define > columns
        for($i=0; $i < count($data); $i++){
            $this->setValue(key($data), $data[key($data)]);
            next($data);
        }

        // execute
        $this->insertDB($this);
    }

    /**
    *  @method updateController Atendimento
    *  @param int $id, array $data
    *  @category updateDB
    *  @version 1.0
    */
    public function update(int $id, array $data)
    {
        // define > id
        $this->valuePrimaryKey = $id;

        // define > columns
        for($i=0; $i < count($data); $i++){
            $this->setValue(key($data), $data[key($data)]);
            next($data);
        }

        // execute
        $this->updateDB($this);
    }

    /**
    *  @method deleteController Atendimento
    *  @param int $id
    *  @category deleteDB
    *  @version 1.0
    */
    public function delete($id)
    {
        // define > id
        $this->valuePrimaryKey = $id;

        // execute
        $this->deleteDB($this);
    }

    /**
    * Funcao inserir
    *
    * @version 1.0
    */ /*
    public function inserir($Nome,$Id_livro, $Genero, $Nome_editora, $Preco)
    {

        $sql = "INSERT INTO `$this->tabelaLivros` (Nome, Genero, Id_livro, Nome_editora, Preco) VALUES ('$Nome','$Genero', '$Id_livro', '$Nome_editora','$Preco')";

        $result = mysql_query($sql);
        //echo $result;

        $msg = "";

        if($result!=1){
            $msg = "Esse(a) Livro j�; est�; registrado(a). Ele(a) n�o pode ser registrado novamente!";
        }
        else{
            $msg = "O cadastro do Livro foi realizado com sucesso";
        }
        return $msg;
    }

    /**
    * Funcao remover
    *
    * @version 1.0
    *//*
    public function remover($Id_livro)
    {

        $sql	                = "DELETE FROM `$this->tabelaLivros` WHERE Id_livro= '$Id_livro'";
        $resultado              = mysql_query($sql);
        if(mysql_affected_rows()>0)  return true;
        else return false;
    }
    /**
    * Funcao atualizar
    *
    * @version 1.0
    *//*
    public function atualizar($Nome, $Genero, $Id_livro, $Nome_editora, $Preco)
    {

        $sql =  "UPDATE `$this->tabelaLivros`
        SET Nome='$Nome',Genero='$Genero', Id_livro='$Id_livro', Nome_editora='$Nome_editora',Preco='$Preco' WHERE Id_livro='$Id_livro'";

        $result = mysql_query($sql);
        return $result;
    }

    /**
    * Funcao getIterator
    *
    * @version 1.0
    *//*
    public function getIterator()
    {

        $j=0;
        $query = "SELECT * FROM `$this->tabelaLivros` ORDER BY Nome";

        $resultado = mysql_query($query);

        $vetorLivros = [];
        while ($linha = mysql_fetch_array($resultado)) {
            $vetorLivros[$j]['Nome']           = $linha['Nome'];
            $vetorLivros[$j]['Genero']              = $linha['Genero'];
            $vetorLivros[$j]['Id_livro']					= $linha['Id_livro'];
            $vetorLivros[$j]['Nome_editora']					= $linha['Nome_editora'];
            $vetorLivros[$j]['Preco']					= $linha['Preco'];
            $j++;
        }
        return $vetorLivros;

    }*/
}
