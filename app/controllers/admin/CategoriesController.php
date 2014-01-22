<?php
	class CategoriesController extends BaseController 
	{

		/**
	 		* Categories Repository
	 		*
	 		* @var Categories
	 	*/
		
		protected $category;
		
		function __construct (Category $category )
		{

			//$this->beforFilter('auth');
			$this->category = $category;

		}	

		/**
		 	* Display a listing of the resource.
	 		*
	 		* @return Response
	 	*/
		public function index()
		{
			$categories = $this->category->all();

			return View::make('admin.categories.index', compact('categories'));
		}



		/**
			* Show the form for creating new resources 
			*
			* @return Response
		*/

		public function create ()
		{

			return View :: make ('admin.categories.create');
		}

		/**
		  * Store a newly created resource 
		  *
		  *@return Response 

		*/

		public function store ()
		{

			/*$input 			= Input::all(); 
			$validation 	= Validator :: make ($input, Categories::$rules);

			if ($validation->passes())
			{

				$this->category->create($input);

				return Redirect::route('listCategory');
			} 
			return Redirect::route('categories.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		*/ 

			echo "test"; exit (); 	


		}
		/**
		   * @param int id 
		   * @return Response

		*/

		public function show ($id)
		{

		}

		
		/**
	 		* Show the form for editing the specified resource.
	 		*
	 		* @param  int  $id
	 		* @return Response
	 	*/
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}
	
	/**

		*
		* @param int id 	
		* @param response 
	*/	
	public function destroy ($id)
	{	
		$this->category->find($id)->delete (); 
	}

}
?>