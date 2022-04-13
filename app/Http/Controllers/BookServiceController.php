<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookService = BookService::orderBy('created_at', 'DESC')->get();
        return view('bookservice.index', compact('bookService'));
    }

    public function getDate(Request $request)
    {
        $minDate = Carbon::parse($request->minDate);
        $maxDate = Carbon::parse($request->maxDate);
        $bookService = BookService::whereBetween('created_at', [
            $minDate, Carbon::parse($maxDate)->endOfDay()
        ])->get();
        return view('bookservice.index', compact('bookService'));
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
        $bookService = new BookService;
        $bookService->name = $request->name;
        $bookService->email = $request->email;
        $bookService->phone = $request->phone;
        $bookService->model = $request->model;
        $bookService->pickup = $request->pickup;
        if ($bookService->save()) {
            $user = \App\Models\User::find(1);
            $user->notify(new \App\Notifications\BookServiceNotification($bookService));
            return response()->json(['success' => 'Data added successfully']);
        } else {
            return response()->json(['error' => 'Data not added']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function show(BookService $bookService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function edit(BookService $bookService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookService $bookService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookService $bookService)
    {
        //
    }
}
