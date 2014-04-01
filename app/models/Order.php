<?php

class Order extends Eloquent {

	

	protected $guarded = array();

	public static $rules = array();

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	/**
		* one to one relationship 
	**/
	public function category()
	{
		return $this->belongsTo('Order');

	}


	/**
		* one to one relationship 
	**/
	public function branch()
	{
		return $this->belongsTo('Order');

	}

	/**
		* one to one relationship 
	**/
	public function orderProducts()
	{
		return $this->belongsTo('Order_Products');

	}
	
}
