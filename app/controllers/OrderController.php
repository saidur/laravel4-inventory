<?php

class OrderController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	protected $order;
	protected $order_products;
	protected $products;

	public function __construct()
    {
        
    	
    	$this->order 						= new Order ();
		$this->order_products 				= new Order_Products();
    	$this->products 					= new Product();
    }	

	public function index()
	{
		
		$orders = Order :: all();
	
        return View::make('admin.orders.index',compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input 		= Input::all();
		//$order_data = array();
		$order_products_data = array();
		$order_data = $this->order->create($input['order']);

		
		$i = 0;
		foreach ($input['product'] as $product)
		{
			
			$order_products_data['order_id'] 		 = $order_data->id;
			$order_products_data['product_name']	 = $product;
			$order_products_data['product_id'] 		 = $input['product_id'][$i];
			$order_products_data['quantity'] 		 = $input['qty'][$i];			
			$this->order_products->create($order_products_data);
			
			$i++;
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{


        $data['orders'] 			= Order :: find($id);
		$data['order_products']		= Order_Products :: where('order_products.order_id','=',$id)->first();
		
		
        return View::make('admin.orders.show', compact('data'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.orders.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getProduct ()
	{

		$products = Product :: all();

		echo json_encode($products);

	}

	public function approve ($id)
	{
		$data['orders'] 			= Order :: find($id);
			
		$data['order_products']		= Order_Products :: where('order_products.order_id','=',$id)->first();
		
		return View::make('admin.orders.approve',compact('data'));

	}

	public function approve_order ()
	{
		
		$input 					= Input::all();
		$order_products_data 	= array();
		
		$rules = array(
    					'product_id[]' => array('required'), //'user.name' can be used for an array field like "user[name]"
    					'qty[]'     => array('required')
					);
		
		$i = 0;
		Form::setValidationRules($rules);
		if (Form::validated()) 
			{
				

				foreach ($input['product'] as $product)
					{
			

				//$order_product_status = true; 
				$order_id 		 									= $input['order_id'];
				$order_products_data['product_name']	 			= $product;
				$order_products_data['product_id'] 		 			= $input['product_id'][$i];
				$order_products_data['quantity'] 		 			= $input['qty'][$i];
				$order_products_data['apprv_qty'] 		 			= $input['apprv_qty'][$i];
				$order_products_data['apprv_userid'] 		 		= $input['approve_user_id'][$i];	

				// approve_user_id
				$this->order_products->where('order_id','=',$order_id)->update($order_products_data);
				//$this->products->update_stock_quantity

				//User::where('votes', '>', 100)->update(array('status' => 2));
				//Order_Products::where('order_id','=',$order_id)->update($order_products_data);

				
			
					$i++;	
			}
			}else  
			{
					$order_product_status = true; 
				
			}

		if ($order_product_status)
		{
			return Redirect::route('order.index')
				->withInput()
				->with('message', 'Successfully create.');
		}else
		{
			return Redirect::route('order.index')
				->withInput()
				->with('message', 'Error.');
		}

		
	}

}
