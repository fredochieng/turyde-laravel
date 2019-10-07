<?php

namespace App\Http\Controllers;

use App\Models\Vehicles\Vehicle;
use App\Models\VehicleTypes\VehicleType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Kamaln7\Toastr\Facades\Toastr;
use DB;
use Carbon\Carbon;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = User::where('id', Auth::id())->first();
        $data['company_id'] = $auth_user->company_id;

        $data['vehicles'] = Vehicle::getVehicles()->where('company_id',  $data['company_id']);
        $data['vehicle_types'] = VehicleType::getVehicleTypes();
        // dd($data['vehicles']);

        return view('vehicles.index')->with($data);
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
        $company_id = $request->input('company_id');
        $vehicle_name = strtoupper($request->input('vehicle_name'));
        $vehicle_type_id = $request->input('vehicle_type_id');
        $vehicle_number = strtoupper($request->input('vehicle_number'));
        $seats = $request->input('seats');

        if ($request->hasFile('vehicle_picture') && $request->file('vehicle_picture')->isValid()) {
            $file = $request->file('vehicle_picture');
            $file_name = $vehicle_number .  '_' . $file->getClientOriginalExtension();
            $file->move('uploads/vehicle_images', $file_name);
            $vehicle_image = 'uploads/vehicle_images/' . $file_name;
        }

        if ($request->hasFile('vehicle_document') && $request->file('vehicle_document')->isValid()) {
            $file = $request->file('vehicle_document');
            $file_name = $vehicle_number .  '_' . $file->getClientOriginalExtension();
            $file->move('uploads/vehicle_documents', $file_name);
            $vehicle_document = 'uploads/vehicle_documents/' . $file_name;
        }

        $vehicle = new Vehicle();

        $vehicle->company_id = $company_id;
        $vehicle->vehicle_name = $vehicle_name;
        $vehicle->vehicle_number = $vehicle_number;
        $vehicle->type = $vehicle_type_id;
        $vehicle->seats = $seats;
        $vehicle->vehicle_picture = $vehicle_image;
        $vehicle->vehicle_document = $vehicle_document;

        $vehicle->save();

        Toastr::success('Vehicle added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
