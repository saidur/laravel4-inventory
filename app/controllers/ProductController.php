<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use MrJuliuss\Syntara\Controllers\BaseController;
use Mgallegos\LaravelJqgrid\Encoders\RequestedDataInterface;
use Demo\Repository\ProductRepository;

class ProductController extends BaseController {

	/**
	 * Product Repository
	 *
	 * @var Product
	 */
	protected $product;

	protected $GridEncoder;
    
    protected $ProductRepository;
    
    //protected $InvoiceItemRepository;


	public function __construct(RequestedDataInterface $GridEncoder,ProductRepository $ProductRepository)
    {
        
    	
    	$this->product 				= new Product ();
    	$this->GridEncoder 			= $GridEncoder;
        $this->ProductRepository 	= $ProductRepository;
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->product->all();
		        
        return View::make('admin.products.index',compact('products'));
	}

	/**

	**/
	public function grid()
    {
       	$this->layout = '';
        $this->GridEncoder->encodeRequestedData($this->ProductRepository, Input::all());
    	 
    }

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        
        return View::make('admin.products.create');
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
		
		$rules = array(
    					'product.name' => array('required'), //'user.name' can be used for an array field like "user[name]"
    					'product.description'     => array('required')
					);
		
		Form::setValidationRules($rules);

		if (Form::validated()) {		
		 	$this->product->create($input['product']);
		 	return Redirect::route('product.index')
				->withInput()
				->with('message', 'Successfully create.');
			}else
			{

				return Redirect::route('product.create')
				->withInput()
				->with('message', 'Error .');
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
        return View::make('admin.products.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.products.edit');
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

	

}
