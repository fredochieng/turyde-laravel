<?php

namespace App\Http\Controllers;

use App\Models\Cities\City;
use App\Models\Countries\Country;
use App\Models\Drivers\Driver;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Kamaln7\Toastr\Facades\Toastr;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::getCountries();
        $data['cities'] = City::getCities();
        $data['drivers'] = Driver::getDrivers();

        return view('drivers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get details of authenticated user
        $auth_user = User::where('id', Auth::id())->first();


        // Get company id of authenticated user
        $company_id = $auth_user->company_id;

        $name = strtoupper($request->input('driver_name'));
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $country_id = $request->input('country_id');
        $city_id = $request->input('city_id');
        $zipcode = $request->input('zipcode');
        $address = strtoupper($request->input('address'));

        // Get file attachments form the form 
        if ($request->hasFile('driver_image') && $request->file('driver_image')->isValid()) {
            $file = $request->file('driver_image');
            $file_name = $phone_no .  '_' . $file->getClientOriginalExtension();
            $file->move('uploads/driver_images', $file_name);
            $driver_image = 'uploads/driver_images/' . $file_name;
        }

        if ($request->hasFile('driver_license') && $request->file('driver_license')->isValid()) {
            $file = $request->file('driver_license');
            $file_name = $phone_no .  '_' . $file->getClientOriginalExtension();
            $file->move('uploads/driver_licences', $file_name);
            $driver_license = 'uploads/driver_licences/' . $file_name;
        }

        if ($request->hasFile('address_proof') && $request->file('address_proof')->isValid()) {
            $file = $request->file('address_proof');
            $file_name = $phone_no .  '_' . $file->getClientOriginalExtension();
            $file->move('uploads/driver_address_proof', $file_name);
            $address_file = 'uploads/driver_address_proof/' . $file_name;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = "FREDDDDDDDD";

        $user->save();

        $saved_driver_id = $user->id;

        $driver = new Driver();
        $driver->driver_id = $saved_driver_id;
        $driver->company_id = $company_id;
        $driver->phone_no = $phone_no;
        $driver->dob = $dob;
        $driver->gender = $gender;
        $driver->country_id = $country_id;
        $driver->city_id = $city_id;
        $driver->zipcode = $zipcode;
        $driver->address = $address;
        $driver->driver_image = $driver_image;
        $driver->licence_file = $driver_license;
        $driver->address_file = $address_file;

        $driver->save();

        Toastr::success('Driver added successfully');
        return back();
    }

    public function manageDriver($driver_id)
    {
        $data['countries'] = Country::getCountries();
        $data['cities'] = City::getCities();
        $data['drivers'] = Driver::getDrivers()->where('driver_id', $driver_id)->first();

        return view('drivers.manage')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($driver_id)
    {
        $now = Carbon::now('Africa/Nairobi');
        $delete_driver = User::where("id", $driver_id)->delete();
        $delete_driver = Driver::where("driver_id", $driver_id)->delete();

        Log::critical("DRIVER OF ID " . $driver_id .  " DELETED BY USER ID: " . Auth::id() . " NAME " . Auth::user()->name . " AT " . $now);

        Toastr::success('Vehicle deleted successfully');
        return back();
    }
}