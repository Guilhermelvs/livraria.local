<?

class Cpf
{
   private $invalido = false;
   
   function ValidaCpf($cpf)
   {
   $cpf = preg_replace("/[\.-]/", "", $cpf);
   for($i = 0; $i <= 9; $i++)
   {
   if($cpf == str_repeat($i , 11))
   {
   $this->invalido = true;
   }
   }
  
   if($this->invalido == 1 or strlen($cpf) <> 11 or !is_numeric($cpf) or $cpf == "12345678909" )
   {
   return FALSE;
   }
  
   $res = $this->soma(10, $cpf);
   $dig1 = $this->pega_digito($res);
   $res2 = $this->soma(11, $cpf.$dig1);
   $dig2 = $this->pega_digito($res2);
  
   if($cpf{9} <> $dig1 or $cpf{10} <> $dig2)
   {
   	return FALSE;
   }
   else
   {
   	return TRUE;
   }

 }

 function soma($num, $cpf)
 {
 $j = 0;
 $res = "";
 for($i = $num; $i >= 2; $i--){ $res += ($i * $cpf{$j}); $j++;}
 return $res;
 }

function pega_digito($res)
   {
   $dig = $res % 11;
   $dig = $dig < 2 ? $dig = 0 : $dig = 11 - $dig;
   return $dig;
   }
   }
  
   //$cpf = new Cpf();
   //$cpf->ValidaCpf("05257495407");
   
   ?>