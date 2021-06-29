<?php

namespace App\Http\Controllers;

use App\Contracts\BrandContract;
use App\Contracts\TipContract;
use App\Contracts\VehicleContract;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class TipController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TipContract $tipContract, Request $request)
    {
        return $tipContract->search($request['search'], $request['type']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        TipContract $tipContract,
        VehicleContract $vehicleContract,
        BrandContract $brandContract
    ) {
        $tip = $request['tip'];
        DB::beginTransaction();
        $brand = $brandContract->save($tip['vehicle']['brand']);

        $tip['vehicle']['id_brand'] = $brand->id;
        $vehicle = $vehicleContract->save($tip['vehicle']);
        $tip['id_vehicle'] = $vehicle->id;
        $tip['id_user'] =  auth()->user()->id;
        $tip = $tipContract->save($tip);
        DB::commit();

        return response()->json($tip, 201);
    }
}
