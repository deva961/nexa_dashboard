<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finance = Finance::all();
        return view('finance.index', compact('finance'));
    }


    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $finance = Finance::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('finance.index', compact('finance'));
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
        $finance = new Finance();
        $finance->name = $request->name;
        $finance->email = $request->email;
        $finance->phone = $request->phone;
        $finance->model = $request->model;
        $finance->outlet = $request->outlet;
        $finance->description = $request->description;
        $finance->purchase_time = $request->purchase_time;
        $finance->loan_amount = $request->loan_amount;
        $finance->loan_tenure = $request->loan_tenure;
        if ($finance->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\FinanceNotification($finance));
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['error' => 'Data not Added.']);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
