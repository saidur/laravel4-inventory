<?php

class Product extends Eloquent {

	protected $guarded = array();

	public static $rules = array();

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
		* one to one relationship 
	**/
	public function category()
	{
		return $this->belongsTo('Product');

	}


	/**
		* one to one relationship 
	**/
	public function branch()
	{
		return $this->belongsTo('Product');

	}

	/**
		* update stock quantity 
	**/
	public function  update_stock_quantity ($id, $data)
	{
		//$this->table->update($data);

		$this->table->where('id','=',$id)->update ($data);	
	}
	
}
