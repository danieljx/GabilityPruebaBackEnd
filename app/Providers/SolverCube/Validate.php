<?php namespace GabilityPruebaBackEnd\Providers\SolverCube;

class Validate {
		
	private $arrayLines;
	private $respose;
	private $currentLine = 0;
	private $currentTest = 0;
	private $currentOper = 1;
	private $T;
	private $N;
	private $M;
	private $W;
	private $inN;
	
	
	public function __construct($text) {
		$this->respose	  = Array("error" => false, "errorLine" => 0, "errorInfo" => null, "warning" => false);
		$this->arrayLines = Validate::textToArray($text);
		$this->validText();
	}
	public function getResponse() {
		return $this->respose;
	}
	public static function textToArray($text) {
		$text = explode("\n", $text);
		$text = array_filter($text);
		$text = array_values($text);
		$text = array_map("trim", $text);
		return $text;
	}
	private function validText() {
		if(count($this->arrayLines) > 0) {
			for($i = 0; $i < count($this->arrayLines); $i++) {
				// Separando Espacios
				$this->currentLine++;
				$this->respose["errorLine"]++;
				$textSpace = preg_split("/[\\s]+/", $this->arrayLines[$i]);
				if($i == 0) {
					//T
					if(!$this->validTestCases($textSpace)) {
						return $this->respose; 
					} else {
						$this->currentTest++;
					}
					$this->inN = true;
				} else if($i != 0) {
					if($this->inN) {
						// N M
						if(!$this->validNM($textSpace)) {
							return $this->respose;
						}
						$this->inN = false;
					} else if($this->currentOper <= $this->M) {
						// Operation
						if(!$this->validOperation($textSpace)) {
							return $this->respose;
						}
					} else {
						$this->currentOper = 1;
						$this->inN = true;
						$i--;
					}
					if(!$this->respose["warning"] && $this->currentTest > 0 && $i == (count($this->arrayLines)-1)) {
						$this->currentTest++;
					}
					$this->respose["warning"] = ($this->currentOper < $this->M);
				}
			}
			$this->respose["warning"] = ($this->currentTest < $this->T);
		} else {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Input Vacio";
		}
		return $this->respose;
	}
	private function validTestCases($arrayText) {
		// Validate 1 <= T <= 50
		if(count($arrayText) > 1 || count($arrayText) < 1 || !is_numeric($arrayText[0])) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Solo un Numero Entero sin Espacios";
			return false;
		}
		$this->T = (int) $arrayText[0];
		if($this->T < 1 || $this->T > 50) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "No puede Ser Mayor a 50";
			return false;
		}
		return true;
	}
	private function validNM($arrayText) {
		// Validate 1 <= N <= 100 and 1 <= M <= 1000 
		if(count($arrayText) > 2 || !is_numeric($arrayText[0]) || (isset($arrayText[1]) && !is_numeric($arrayText[1]))) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Solo dos Numero Entero separados por un Espacios";
			return false;
		}
        $this->respose["warning"] = (count($arrayText) < 2);
		$this->N = (int) $arrayText[0];
		if($this->N <= 1 || $this->N >= 100) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "El primer entero debe ser Mayor a 1 y Menor a 100";
			return false;
		}
		if(!$this->respose["warning"]) {
			$this->M = (int) $arrayText[1]; 
			if($this->M < 1 || $this->M > 1000) {
				$this->respose["error"] 	= true;
				$this->respose["errorInfo"] = "El segundo entero debe ser Mayor a 1 y Menor a 1000";
				return false;
			}
		}
		return true;
	}

	private function validOperation($arrayText) {
		$arrayText[0] = strtoupper($arrayText[0]);
		$arrOperU 	  = str_split("UPDATE",strlen($arrayText[0]));
		$arrOperQ	  = str_split("QUERY",strlen($arrayText[0]));
		$textPosU	  = stripos("UPDATE",$arrayText[0]);
		$textPosQ	  = stripos("QUERY",$arrayText[0]);
		if(($textPosU === false) && ($textPosQ === false)) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Las operaciones solo puede ser UPDATE y/o QUERY";
			return false;
		}
		if((!($arrOperU[$textPosU] == $arrayText[0])) && (!($arrOperQ[$textPosQ] == $arrayText[0]))) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Las operaciones solo puede ser UPDATE y/o QUERY";
			return false;
		}
		if($arrayText[0]=='UPDATE') {
			if(!$this->validUpdate($arrayText)) {
				return false;
			}
		} else if($arrayText[0]=='QUERY') {
			if(!$this->validQuery($arrayText)) {
				return false;
			}
		}
		return true;
	}
	private function validUpdate($arrayText) {
		$this->respose["warning"] = (count($arrayText) < 5);
		if(!$this->respose["warning"]) {
			for($u = 1; $u < count($arrayText); $u++) {
				if(!is_numeric($arrayText[$u]) || $arrayText[$u] < 1 || $arrayText[$u] > $this->N || $arrayText[$u]<-1000000000 || $arrayText[$u]>1000000000) {
					$this->respose["error"] 	= true;
					$this->respose["errorInfo"] = "Formato: UPDATE x y z w - cordenadas del cubo y el valor";
					return false;
				} else if($u == (count($arrayText)-1)) {
					$this->currentOper++;
				}
			}
		}
		return true;
	}
	private function validQuery($arrayText) {
		$this->respose["warning"] = (count($arrayText) < 7);
		if(!$this->respose["warning"]) {
			for($q = 1; $q < count($arrayText); $q++) {
				if(!is_numeric($arrayText[$q]) || $arrayText[$q] < 1 || $arrayText[$q] > $this->N) {
					$this->respose["error"] 	= true;
					$this->respose["errorInfo"] = "Formato: QUERY x y z x1 y1 z1 - cordenadas del cubo desde-hasta";
					return false;
				} else if($q == (count($arrayText)-1)) {
					$this->currentOper++;
				}
			}
		}
		return true;
	}
}