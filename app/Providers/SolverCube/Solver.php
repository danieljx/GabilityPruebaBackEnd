<?php namespace GabilityPruebaBackEnd\Providers\SolverCube;

use GabilityPruebaBackEnd\Providers\SolverCube\SolverContract;

class Solver implements SolverContract {
	
	public static function setString($in) {
		$valid = new Validate($in);
		return $valid->getResponse();
	}
	// public static function setStringCube($in) {
		// $cube = new Cube($in);
		// return $cube->getResponse();
	// }
}