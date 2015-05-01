<?php namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;

/* include organization model */
use App\Http\Requests\OrganizationUpdate;

/* Define OrganizationRequest to validate the create form */
use App\Model\Agent_panel\Organization;

/* Define OrganizationUpdate to validate the create form */

class OrganizationController extends Controller {

	/*  Define constructor for authentication checking  */

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('role.agent');
		$this->middleware('roles');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Organization $org) {
		try
		{
			/* get all values of table organization */
			$orgs = $org->get();

			return view('themes.default1.agent.organization.index', compact('orgs'));
		} catch (Exception $e) {
			return view('404');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		try
		{
			return view('themes.default1.agent.organization.create');
		} catch (Exception $e) {
			return view('404');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Organization $org, OrganizationRequest $request) {
		try
		{
			/* Insert the all input request to organization table */
			/* Check whether function success or not */

			if ($org->fill($request->input())->save() == true) {
				/* redirect to Index page with Success Message */
				return redirect('organizations')->with('success', 'Organization  Created Successfully');
			} else {
				/* redirect to Index page with Fails Message */
				return redirect('organizations')->with('fails', 'Organization can not Create');
			}
		} catch (Exception $e) {
			/* redirect to Index page with Fails Message */
			return redirect('organizations')->with('fails', 'Organization can not Create');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Organization $org) {
		try
		{
			/* select the field by id  */
			$orgs = $org->whereId($id)->first();

			/* To view page */
			return view('themes.default1.agent.organization.show', compact('orgs'));
		} catch (Exception $e) {
			return view('404');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Organization $org) {
		try
		{
			/* select the field by id  */
			$orgs = $org->whereId($id)->first();

			/* To view page */
			return view('themes.default1.agent.organization.edit', compact('orgs'));
		} catch (Exception $e) {
			return view('404');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Organization $org, OrganizationUpdate $request) {
		try
		{
			/* select the field by id  */
			$orgs = $org->whereId($id)->first();

			/* update the organization table   */
			/* Check whether function success or not */

			if ($orgs->fill($request->input())->save() == true) {
				/* redirect to Index page with Success Message */
				return redirect('organizations')->with('success', 'Organization  Updated Successfully');
			} else {
				/* redirect to Index page with Fails Message */
				return redirect('organizations')->with('fails', 'Organization  can not Update');
			}
		} catch (Exception $e) {
			/* redirect to Index page with Fails Message */
			return redirect('organizations')->with('fails', 'Organization  can not Update');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		try
		{
			/* select the field by id  */
			$orgs = $org->whereId($id)->first();

			/* Delete the field selected from the table */
			/* Check whether function success or not */

			if ($orgs->delete() == true) {
				/* redirect to Index page with Success Message */
				return redirect('organizations')->with('success', 'Organization  Deleted Successfully');
			} else {
				/* redirect to Index page with Fails Message */
				return redirect('organizations')->with('fails', 'Organization  can not Delete');
			}
		} catch (Exception $e) {
			/* redirect to Index page with Fails Message */
			return redirect('organizations')->with('fails', 'Organization  can not Delete');
		}
	}

}
