<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Vehicle extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'vehicles';

    public static function getVehicles()
    {
        $vehicles = DB::table('vehicles')
            ->select(
                DB::raw('vehicles.*'),
                DB::raw('vehicles.id as vehicle_id'),
                DB::raw('vehicles.created_at as vehicle_created_at'),
                DB::raw('vehicle_types.id'),
                DB::raw('vehicle_types.vehicle_type'),
                DB::raw('companies.id')
            )
            ->leftJoin('vehicle_types', 'vehicles.type', '=', 'vehicle_types.id')
            ->leftJoin('companies', 'vehicles.company_id', '=', 'companies.id')
            ->get();

        return $vehicles;
    }
}