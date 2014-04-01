<?php namespace Demo\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionResolverInterface as Resolver;
use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
use MrJuliuss\Syntara\Controllers\BaseController;


class ProductRepository extends EloquentRepositoryAbstract {

	public function __construct(Resolver $Resolver)
	{
		//$this->Database = $Model;
		
		$this->Database = $Resolver
									->table('products')
									->join('categories', 'products.category_id', '=', 'categories.id');


		//$this->visibleColumns = array('products.id','products.name','products.description','categories.name');
		$this->visibleColumns = array('products.id','products.name','categories.description','categories.name as cat');
		
		$this->orderBy = array(array('products.id', 'asc'));
	}

}
