<?php 

namespace GabilityPruebaBackEnd\Providers;

use Illuminate\Support\ServiceProvider;

use GabilityPruebaBackEnd\Providers\SolverCube\Solver;

class SolverProviders extends ServiceProvider{
	
	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
	
	/**
     * Register the service provider.
     *
     * @return void
     */
	public function register() {
        $this->app->bind('GabilityPruebaBackEnd\Providers\SolverCube\SolverContract', function(){
            return new Solver();
        });
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['GabilityPruebaBackEnd\Providers\SolverCube\SolverContract'];
	}

}


