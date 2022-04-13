<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use App\Models\ContactUs;
use App\Models\Enquiry;
use App\Models\Finance;
use App\Models\Insurance;
use App\Models\OnRoadPrice;
use App\Models\Popup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Total month data
        $popup = Popup::all()->count();
        $onRoadPrice = OnRoadPrice::all()->count();
        $enquiry = Enquiry::all()->count();
        $bookService = BookService::all()->count();
        $finance = Finance::all()->count();
        $insurance = Insurance::all()->count();
        $contactUs = ContactUs::all()->count();

        //present month data
        $popup_month = Popup::whereMonth('created_at', Carbon::now()->month)->count();
        $onRoadPrice_month = OnRoadPrice::whereMonth('created_at', Carbon::now()->month)->count();
        $enquiry_month = Enquiry::whereMonth('created_at', Carbon::now()->month)->count();
        $bookService_month = BookService::whereMonth('created_at', Carbon::now()->month)->count();
        $finance_month = Finance::whereMonth('created_at', Carbon::now()->month)->count();
        $insurance_month = Insurance::whereMonth('created_at', Carbon::now()->month)->count();
        $contactUs_month = ContactUs::whereMonth('created_at', Carbon::now()->month)->count();

        //last month data
        $popup_last_month_data = Popup::whereMonth('created_at', Carbon::now()->month - 1)->count();
        $onRoadPrice_last_month_data = OnRoadPrice::whereMonth('created_at', Carbon::now()->month - 1)->count();
        $enquiry_last_month_data = Enquiry::whereMonth('created_at', Carbon::now()->month - 1)->count();

        //Percentage calculation
        if ($popup_last_month_data > 0) {
            $popup_percentage = ($popup_month - $popup_last_month_data) / $popup_last_month_data * 100;
        }

        if ($onRoadPrice_last_month_data > 0) {
            $onRoadPrice_percentage = ($onRoadPrice_month - $onRoadPrice_last_month_data) / $onRoadPrice_last_month_data * 100;
        }

        if ($enquiry_last_month_data > 0) {
            $enquiry_percentage = ($enquiry_month - $enquiry_last_month_data) / $enquiry_last_month_data * 100;
        }


        //donut chart data
        $nexa_donut_chart_data = $popup + $onRoadPrice + $enquiry + $bookService + $finance + $insurance + $contactUs;
        $arena_donut_chart_data = 0;
        $commercial_donut_chart_data = 0;

        $donut_chart = [$nexa_donut_chart_data, $arena_donut_chart_data, $commercial_donut_chart_data];

        //date wise in popup graph
        $pop_up_graph = [];

        $days = Carbon::now()->daysInMonth;

        if ($days === 28) {
            $date_popup = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'];
        }

        if ($days === 29) {
            $date_popup = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29'];
        }

        if ($days === 30) {
            $date_popup = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'];
        }

        if ($days === 31) {
            $date_popup = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        }

        foreach ($date_popup as $key => $value) {
            $pop_up_graph[] = Popup::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', $value)->count();
        }

        $get_four_months = now()->subMonths(3)->monthsUntil(now());



        $data = [];
        foreach ($get_four_months as $date) {
            $data[] = [
                'month' => $date->shortMonthName,
            ];
        }

        return view(
            'home',
            compact(
                'popup',
                'onRoadPrice',
                'enquiry',
                'bookService',
                'finance',
                'insurance',
                'contactUs',
                'popup_month',
                'onRoadPrice_month',
                'enquiry_month',
                'bookService_month',
                'finance_month',
                'insurance_month',
                'contactUs_month',
                'popup_last_month_data',
                'popup_percentage',
                'onRoadPrice_percentage',
                'enquiry_percentage',
                'nexa_donut_chart_data',
                'arena_donut_chart_data',
                'commercial_donut_chart_data',
            )
        )->with(
            'donut_chart',
            json_encode($donut_chart, JSON_NUMERIC_CHECK)
        )->with(
            'pop_up_graph',
            json_encode($pop_up_graph, JSON_NUMERIC_CHECK)
        )->with(
            'data',
            json_encode($data, JSON_NUMERIC_CHECK)
        );
    }
}
