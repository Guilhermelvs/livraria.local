<?php
	class RegraEditora{
		
		function __construct(){
		
		}

		public function validaCod($Cod){
		
			// Verifica se um número foi informado
			if(empty($Cod)) {
				return false;
			}

			// Elimina possivel mascara
			$Cod = ereg_replace('[^0-9]', '', $Cod);
			$Cod = str_pad($Cod, 11, '0', STR_PAD_LEFT);
     
			// Verifica se o numero de digitos informados é igual a 11 
			if (strlen($Cod) != 11) {
				return false;
			}
			// Verifica se nenhuma das sequências invalidas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			else if ($Cod == '00000000000' || 
				$Cod == '11111111111' || 
				$Cod == '22222222222' || 
				$Cod == '33333333333' || 
				$Cod == '44444444444' || 
				$Cod == '55555555555' || 
				$Cod == '66666666666' || 
				$Cod == '77777777777' || 
				$Cod == '88888888888' || 
				$Cod == '99999999999') {
				return false;
			// Calcula os digitos verificadores para verificar se o
			// Cod é válido
			} else {   
				
				for ($t = 9; $t < 11; $t++) {
					
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $Cod{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($Cod{$c} != $d) {
						return false;
					}
				}
				return true;
			}
		}	
	}
	
	/*Rotina de Testes
	$regra = new RegraEditora();
	$retorno = $regra->validaCod('23456789');
	echo $retorno;*/
?>	


