<?php namespace GabilityPruebaBackEnd\Providers\SolverCube;

use GabilityPruebaBackEnd\Providers\SolverCube\SolverContract;

class Solver implements SolverContract {
	
	private $input;
	
	private $inputProcessor;
	
	private $responArray = Array("error" => true,
								 "errorText" => "Formato Incorrecto!",
								 "respText" => "");
	
	// function __construct($input){
		// // $instance = new Solver();
		// // $instance->input = $input;
		// // $instance->inputProcessor = new Input\InputProcessor($input);
		// // return $instance;
		// return $input . "-> Depinga";
	// }

	public static function setString($in) {
		$responArray = Array("error" => true,
							 "errorText" => "Formato Incorrecto!",
							 "respText" => "");
		return $responArray;
	}
	// public function solve(){
		// if(!$this->inputProcessor->parseInput()){
			// return false;
		// }
		// $response = $this->executeOperations();
		// return $response;
	// }
	
	// private function executeOperations(){
		// $response = '';
		// $operations = $this->inputProcessor->getOperations();
		// foreach($operations as $index => $operations_group){
			// $response .= $this->executeOperationsGroup($operations_group, $index);
		// }
		// return $response;
	// }
	
	// private function executeOperationsGroup($operations_group, $index){
		// $response = '';
		// $matrixDimension = $this->inputProcessor->getMatrixDimension($index);
		// $matrix = new Matrix\Matrix($matrixDimension);
		// foreach($operations_group as $operation){
			// $prev_response = $matrix->executeOperation($operation);
			// if($prev_response!==''){
				// $response .= $prev_response.';';
			// }
		// }
		// return $response;
	// }
	
}