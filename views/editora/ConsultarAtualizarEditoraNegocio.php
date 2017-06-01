<!DOCTYPE html>
<html>
<body>

<?php
  require_once("../Conexao/Conexao.php");
  require_once("RepositorioEditora.php");

  $Cod = $_POST[ 'cascata' ];  
  //---------------------------------------------------
  $conexao = new MySQL();
  $repositorio = new RepositorioEditora($conexao);
	
  $Editora = $repositorio->getIterator();
  
  foreach($Editora as $Editora){
	if ($Editora['Cod']==$Cod){
		$Nome = utf8_encode($Editora['Nome']);
	    $Cod_editora = $Editora['Cod_editora'];
		$Telefone = $Editora['Telefone'];
     	$Endereco = $Editora ['Endereco'];
		break;
	}
  }
  //---------------------------------------------------	
?>
	
<p>* Campos obrigatórios.</p>

<form action="ConsultarAtualizarEditoraNegocio2.php">
  <input type="hidden" name="Id" value="<?php echo $Id;?>">
 Nome *:<br>
  <input type="text" name="nome" size="70" value="<?php echo $Nome;?>">
  <br>
  Codigo da Editora*:<br>
  <input type="number" min="1" max="50000" name="Cod_edt" value="<?php echo $Cod_editora;?>">
  <br>
   País*:<br>
   <select name="cascata">
 <option>Selecione...</option>
 <option value="AL">AL</option>
 <option value="BO">BO</option>
 <option value="BR">BR</option>
 <option value="IT">IT</option>
 <option value="LR">LR</option>
 <option value="LU">LU</option>
 <option value="NI">NI</option>
 <option value="PR">PR</option>
 <option value="RU">RU</option>
 <option value="SG">SG</option>
 <option value="SY">SY</option>
 <option value="TH">TH</option>
 <option value="VE">VE</option>
 <option value="ZM">ZM</option>
 </select>
  <br>
  Estado*:<br>
 <td><select name="cascata">
 <option>Selecione...</option>
 <option value="AC">AC</option>
 <option value="AL">AL</option>
 <option value="AP">AP</option>
 <option value="AM">AM</option>
 <option value="BA">BA</option>
 <option value="CE">CE</option>
 <option value="ES">ES</option>
 <option value="DF">DF</option>
 <option value="MA">MA</option>
 <option value="MT">MT</option>
 <option value="MS">MS</option>
 <option value="MG">MG</option>
 <option value="PA">PA</option>
 <option value="PB">PB</option>
 <option value="PR">PR</option>
 <option value="PE">PE</option>
 <option value="PI">PI</option>
 <option value="RJ">RJ</option>
 <option value="RN">RN</option>
 <option value="RS">RS</option>
 <option value="RO">RO</option>
 <option value="RR">RR</option>
 <option value="SC">SC</option>
 <option value="SP">SP</option>
 <option value="SE">SE</option>
 <option value="TO">TO</option>
 </select>
   Cidade*:<br>
  <input type="text" name="nome" size="30" name= "End_edt" value="<?php echo $Endereco;?>">
  <br>
  CEP*:<br>
  <input type="text" name="nome" size="12" name= "End_edt" value="<?php echo $Endereco;?>">
  <br>
  Rua*:<br>
  <input type="text" name="nome" size="30" name= "End_edt" value="<?php echo $Endereco;?>">
  <br>
  Numero*:<br>
  <input type="text" name="nome" size="12" name= "End_edt" value="<?php echo $Endereco;?>">
  <br>
  Telefone*:<br>
  <input type="text" size="12" name="tel_edt" value="<?php echo $Telefone;?>">
  <br>
  <br>
  <input type="submit" value="Cadastrar">
</form> 


</body>
</html>