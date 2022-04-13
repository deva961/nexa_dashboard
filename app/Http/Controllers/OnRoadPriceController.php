<?php

namespace App\Http\Controllers;

use App\Models\OnRoadPrice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OnRoadPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onRoadPrices = OnRoadPrice::orderBy('created_at', 'DESC')->get();
        return view('onroadprice.index', compact('onRoadPrices'));
    }


    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $onRoadPrices = OnRoadPrice::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('onroadprice.index', compact('onRoadPrices'));
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
        $onRoadPrice = new OnRoadPrice();
        $onRoadPrice->name = $request->name;
        $onRoadPrice->email = $request->email;
        $onRoadPrice->phone = $request->phone;
        $onRoadPrice->model = $request->model;
        $onRoadPrice->outlet = $request->outlet;
        if ($onRoadPrice->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\OnRoadPriceNotification($onRoadPrice));
            return response()->json(['success' => 'Data Added successfully.']);
        }else{
            return response()->json(['error' => 'Data not Added.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnRoadPrice  $onRoadPrice
     * @return \Illuminate\Http\Response
     */
    public function show(OnRoadPrice $onRoadPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnRoadPrice  $onRoadPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(OnRoadPrice $onRoadPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnRoadPrice  $onRoadPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnRoadPrice $onRoadPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnRoadPrice  $onRoadPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnRoadPrice $onRoadPrice)
    {
        //
    }
}
