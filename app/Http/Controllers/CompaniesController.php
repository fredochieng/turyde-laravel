<?php

namespace App\Http\Controllers;

use App\Models\Companies\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kamaln7\Toastr\Facades\Toastr;

// use Kamaln7\Toastr\Facades\Toastr;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::getCompanies();
        return view('companies.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_name = strtoupper($request->input('company_name'));
        $address = strtoupper($request->input('address'));
        $zipcode = $request->input('zipcode');
        $contact_name = $request->input('contact_name');
        $contact_email = $request->input('contact_email');
        $contact_number = $request->input('contact_number');
        $password = '12345678';

        $company = new Company();
        $company->company_name = $company_name;
        $company->address = $address;
        $company->zipcode = $zipcode;
        $company->contact_number = $contact_number;
        $company->status_id = 1;
        $company->created_by = Auth::id();
        $company->save();

        $saved_company_id = $company->id;

        $user = new User();
        $user->company_id = $saved_company_id;
        $user->name = $contact_name;
        $user->email = $contact_email;
        $user->password =  Hash::make($password);

        $user->save();

        Toastr::success('Company added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        Toastr::success('Company deleted successfully');
        return back();
    }
}