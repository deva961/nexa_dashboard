<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs  = ContactUs::orderBy('id', 'desc')->get();
        return view('contact_us.index', compact('contactUs'));
    }


    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $contactUs = ContactUs::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('contact_us.index', compact('contactUs'));
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
        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->outlet = $request->outlet;
        $contactUs->model = $request->model;
        $contactUs->message = $request->message;
        $contactUs->pick_up = $request->pick_up;
        $contactUs->service_type = $request->service_type;
        $contactUs->customer_address = $request->customer_address;
        $contactUs->rating = $request->rating;
        $contactUs->form_type = $request->form_type;

        if ($contactUs->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\ContactUsNotification($contactUs));
            return response()->json(['success' => 'Data added successfully']);
        } else {
            return response()->json(['error' => 'Data not added']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
