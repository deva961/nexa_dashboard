<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurance = Insurance::all();
        return view('insurance.index', compact('insurance'));
    }


    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $insurance = Insurance::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('insurance.index', compact('insurance'));
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
        $insurance = new Insurance();
        $insurance->name = $request->name;
        $insurance->email = $request->email;
        $insurance->phone = $request->phone;
        $insurance->model = $request->model;
        $insurance->registration_no = $request->registration_no;
        $insurance->registration_year = $request->registration_year;
        $insurance->policy_no = $request->policy_no;
        $insurance->insurance_company = $request->insurance_company;
        $insurance->insurance_expiry_date = $request->insurance_expiry_date;
        $insurance->claim = $request->claim;
        if ($insurance->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\InsuranceNotification($insurance));
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['error' => 'Data not Added.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Insurance $insurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insurance $insurance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insurance $insurance)
    {
        //
    }
}
