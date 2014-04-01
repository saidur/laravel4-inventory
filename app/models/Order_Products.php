<?php

class Order_Products extends Eloquent {

	protected $guarded = array();

	public static $rules = array();

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_products';

	/**
		* one to one relationship 
	**/
	public function order()
	{
		return $this->belongsTo('Order');

	}
		
}
