<?php
	class RegraUnIdade{
		
		function __construct(){
		
		}

		public function valIdaId($Id){
		
			// Verifica se um número foi informado
			if(empty($Id)) {
				return false;
			}

			// Elimina possivel mascara
			$Id = ereg_replace('[^0-9]', '', $Id);
			$Id = str_pad($Id, 11, '0', STR_PAD_LEFT);
     
			// Verifica se o numero de digitos informados é igual a 11 
			if (strlen($Id) != 11) {
				return false;
			}
			// Verifica se nenhuma das sequências invalIdas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			else if ($Id == '00000000000' || 
				$Id == '11111111111' || 
				$Id == '22222222222' || 
				$Id == '33333333333' || 
				$Id == '44444444444' || 
				$Id == '55555555555' || 
				$Id == '66666666666' || 
				$Id == '77777777777' || 
				$Id == '88888888888' || 
				$Id == '99999999999') {
				return false;
			// Calcula os digitos verificadores para verificar se o
			// Id é válIdo
			} else {   
				
				for ($t = 9; $t < 11; $t++) {
					
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $Id{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($Id{$c} != $d) {
						return false;
					}
				}
				return true;
			}
		}	
	}
	
	/*Rotina de Testes
	$regra = new RegraDepartamento();
	$retorno = $regra->valCodaCod('23456789');
	echo $retorno;*/
?>	


