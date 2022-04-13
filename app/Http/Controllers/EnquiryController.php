<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries = Enquiry::orderBy('created_at', 'DESC')->get();
        return view('enquiry.index', compact('enquiries'));
    }

    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $enquiries = Enquiry::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('enquiry.index', compact('enquiries'));
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
        $enquiries = new Enquiry();
        $enquiries->name = $request->name;
        $enquiries->email = $request->email;
        $enquiries->phone = $request->phone;
        $enquiries->model = $request->model;

        if ($enquiries->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\CarEnquiryNotification($enquiries));
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
