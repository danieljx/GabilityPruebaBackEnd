<?php namespace GabilityPruebaBackEnd\Providers\SolverCube;

class Cube {
	
	private $currentOper = 0;
	private $arrayLines;
	private $Matrix;
	private $respose;
	private $T;
	private $N;
	private $M;
	private $inN;
	
	public function __construct($text) {
		$this->respose 		= Array();
		$this->Matrix 		= Array();
		$this->arrayLines 	= Validate::textToArray($text);
		$this->runLines();
	}
	public function getResponse() {
		return $this->respose;
	}
	private function runLines() {
		if(count($this->arrayLines) > 0) {
			for($i = 0; $i < count($this->arrayLines); $i++) {
				$textSpace = preg_split("/[\\s]+/", $this->arrayLines[$i]);
				if($i == 0) {
					$this->T = (int) $textSpace[0];
					$this->inN = true;
				} else if($i != 0) {
					if($this->inN) {
						$this->createMarix($textSpace);
						$this->inN = false;
					} else if($this->currentOper < $this->M) {
						$this->runOperation($textSpace);
					} else {
						$this->currentOper = 0;
						$this->inN = true;
						$i--;
					}
				}
			}
		}
	}
	private function createMarix($textSpace) {
		$this->N = (int) $textSpace[0];
		$this->M = (int) $textSpace[1];
		if($this->N > 0) {
			for ($x = 0; $x <= $this->N; $x++) {
				for ($y = 0; $y <= $this->N; $y++) {
					for ($z = 0; $z <= $this->N; $z++) {
						$this->Matrix[$x][$y][$z] = 0;
					}
				}
			}
		}
	}
	private function runOperation($textSpace) {
		if(strtoupper($textSpace[0])=='UPDATE') {
			$this->execUpdate($textSpace);
		} else if(strtoupper($textSpace[0])=='QUERY') {
			$this->execQuery($textSpace);
		}
		$this->currentOper++;
	}
	private function execUpdate($textSpace) {
		$this->Matrix[$textSpace[1]][$textSpace[2]][$textSpace[3]] = (int) $textSpace[4];
	}
	private function execQuery($textSpace) {
        $w = 0;
        for($x = $textSpace[1]; $x <= $textSpace[4]; $x++) {
            for($y = $textSpace[2]; $y <= $textSpace[5]; $y++) {
                for($z = $textSpace[3]; $z <= $textSpace[6]; $z++) {
					$w += $this->Matrix[$x][$y][$z];
				}
			}
		}      
        $this->respose[] = $w;
	}
}