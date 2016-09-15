<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AppleType;
use Illuminate\Http\Request;

class AppleTypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$appleTypes = AppleType::getAllData($request);

		return view('appleTypes.index', compact('appleTypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('appleTypes.create')
			->with( 'list', AppleType::getListFromAllRelationApps() );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		//create data
		AppleType::create( $request->all() );

		return redirect()->route('appleTypes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(AppleType $appleType)
	{
		return view('appleTypes.show', compact('appleType'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(AppleType $appleType)
	{
		return view('appleTypes.edit', compact('appleType'))
			->with( 'list', AppleType::getListFromAllRelationApps() );
	}

	/**
	 * Show the form for duplicatting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function duplicate(AppleType $appleType)
	{
		return view('appleTypes.duplicate', compact('appleType'))
			->with( 'list', AppleType::getListFromAllRelationApps() );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(AppleType $appleType, Request $request)
	{
		//update data
		$appleType->update($request->all());

		return redirect()->route('appleTypes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(AppleType $appleType)
	{
		$appleType->delete();

		return redirect()->route('appleTypes.index')->with('message', 'Item deleted successfully.');
	}

}
