<?php

namespace App\Models\Drivers;

use DB;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    public static function getDrivers()
    {
        $drivers = DB::table('drivers')
            ->select(
                DB::raw('drivers.*'),
                DB::raw('drivers.created_at as driver_created_at'),
                DB::raw('users.id'),
                DB::raw('users.name'),
                DB::raw('users.email'),
                DB::raw('countries.id as country_id'),
                DB::raw('countries.country'),
                DB::raw('cities.id as city_id'),
                DB::raw('cities.city')
            )
            ->leftJoin('users', 'drivers.driver_id', '=', 'users.id')
            ->leftJoin('countries', 'drivers.country_id', '=', 'countries.id')
            ->leftJoin('cities', 'drivers.city_id', '=', 'cities.id')
            ->get();

        return $drivers;
    }

    public static function getUnassignedDrivers()
    {
        $drivers = DB::table('drivers')
            ->select(
                DB::raw('drivers.driver_id'),
                DB::raw('drivers.driver_status'),
                DB::raw('users.id'),
                DB::raw('users.name'),
                DB::raw('vehicles.driver_id as vehicle_driver_id')

            )
            ->leftJoin('users', 'drivers.driver_id', '=', 'users.id')
            ->join('vehicles', 'vehicles.driver_id', '=', 'drivers.driver_id', 'left outer')
            ->get();

        return $drivers;
    }
}