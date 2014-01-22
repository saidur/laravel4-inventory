<?php

use MrJuliuss\Syntara\Controllers\BaseController;

class BranchesController extends BaseController {

	/**
	 * Branch Repository
	 *
	 * @var Branch
	 */
	protected $branch;

	public function __construct(Branch $branch)
	{
		$this->branch = $branch;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$branches = $this->branch->all();

		return View::make('branches.index', compact('branches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('branches.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Branch::$rules);

		if ($validation->passes())
		{
			$this->branch->create($input);

			return Redirect::route('listBranch');
		}

		return Redirect::route('categories.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$branch = $this->branch->findOrFail($id);

		return View::make('branches.show', compact('branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branch = $this->branch->find($id);

		if (is_null($branch))
		{
			return Redirect::route('branches.index');
		}

		return View::make('branches.edit', compact('branch'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Branch::$rules);

		if ($validation->passes())
		{
			$branch = $this->branch->find($id);
			$branch->update($input);

			return Redirect::route('branches.show', $id);
		}

		return Redirect::route('branches.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->branch->find($id)->delete();

		return Redirect::route('branches.index');
	}

}
