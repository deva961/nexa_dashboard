<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class PopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popup = Popup::orderBy('created_at', 'DESC')->get();
        return view('popup.index', compact('popup'));
    }

    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $popup = Popup::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('popup.index', compact('popup'));
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
        $popup = new Popup();
        $popup->phone = $request->phone;
        if ($popup->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\PopupNotification($popup));
            return response()->json(['success' => 'Data Added successfully.']);
        }else{
            return response()->json(['error' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
