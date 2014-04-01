<?php namespace Demo\Repository;

use Illuminate\Support\ServiceProvider;
use \Product;


class RepositoryServiceProvider extends ServiceProvider {
	/**
	 * Register the binding
	*
	* @return void
	*/
	public function register()
	{
		$this->app->bind('Demo\Repository\ProductRepository', function($app)
		{
			return new ProductRepository($app['db']);
		});
	}
	
}
