<?php
/*
 *
 * @work
 *	
*/
class Branch extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required'
	);

	public function Product()
    {
        return $this->hasMany('Product');
    }
}