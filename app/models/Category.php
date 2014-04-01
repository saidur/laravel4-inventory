<?php 

class Category Extends Eloquent 
{
	protected $guarded = array (); 

	public static $rules = array (
						'name' => 'required',
						'description' =>'required'
			);
			 

	public function __construct ()
	{
		$this->table ='categories';
	}

	public function Product()
    {
       return $this->hasMany('Product');
    }
    
}