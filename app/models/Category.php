<?php 

class Category Extends Eloquent 
{
	protected $guarded = array (); 

	public static $rules = array (
						'name' => 'required',
						'description' =>'required'
			); 
}