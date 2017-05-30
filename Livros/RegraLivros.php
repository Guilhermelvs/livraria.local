<?php
	class RegraLivros{
		
		function __construct(){
		
		}

		public function validaId_livro($Id_livro){
		
			// Verifica se um número foi informado
			if(empty($Id_livro)) {
				return false;
			}

			// Elimina possivel mascara
			$Id_livro = ereg_replace('[^0-9]', '', $Id_livro);
			$Id_livro = str_pad($Id_livro, 11, '0', STR_PAD_LEFT);
     
			// Verifica se o numero de digitos informados é igual a 11 
			if (strlen($Id_livro) != 11) {
				return false;
			}
			// Verifica se nenhuma das sequências invalidas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			else if ($Id_livro == '00000000000' || 
				$Id_livro == '11111111111' || 
				$Id_livro == '22222222222' || 
				$Id_livro == '33333333333' || 
				$Id_livro == '44444444444' || 
				$Id_livro == '55555555555' || 
				$Id_livro == '66666666666' || 
				$Id_livro == '77777777777' || 
				$Id_livro == '88888888888' || 
				$Id_livro == '99999999999') {
				return false;
			// Calcula os digitos verificadores para verificar se o
			// Id_livro é válido
			} else {   
				
				for ($t = 9; $t < 11; $t++) {
					
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $Id_livro{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($Id_livro{$c} != $d) {
						return false;
					}
				}
				return true;
			}
		}	
	}
	
	/*Rotina de Testes
	$regra = new RegraId_livro();
	$retorno = $regra->validaCPF('23456789');
	echo $retorno;*/
?>	


