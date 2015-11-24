<?php namespace GabilityPruebaBackEnd\Providers\SolverCube;

class Validate {
		
	private $arrayLines;
	private $respose;
	private $currentLine;
	private $currentOper;
	private $T;
	private $N;
	private $M;
	private $W;
	
	
	public function __construct($text) {
		$this->respose	  = Array("error" => false, "errorLine" => 0, "errorInfo" => null, "warning" => false);
		$this->arrayLines = $this->textToArray($text);
		$this->validText();
	}
	public function getResponse() {
		return $this->respose;
	}
	private function textToArray($text) {
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
					}
				} else if($i == 1) {
					// N M
					if(!$this->validNM($textSpace)) {
						return $this->respose;
					}
					$this->respose["warning"] = ($this->currentOper < $this->M);
				}
			}
			$this->respose["warning"] = (count($this->arrayLines) < 1 || count($this->arrayLines) < 2);
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
		if(count($arrayText) > 2 || count($arrayText) < 2 || !is_numeric($arrayText[0]) || !is_numeric($arrayText[1])) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "Solo dos Numero Entero separados por un Espacios";
			return false;
		}
		$this->N = (int) $arrayText[0];
		$this->M = (int) $arrayText[1];
		if($this->N <= 1 || $this->N >= 100) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "El primer entero debe ser Mayor a 1 y Menor a 100";
			return false;
		} else if($this->M <= 1 || $this->M >= 1000) {
			$this->respose["error"] 	= true;
			$this->respose["errorInfo"] = "El segundo entero debe ser Mayor a 1 y Menor a 1000";
			return false;
		}
		return true;
	}
}