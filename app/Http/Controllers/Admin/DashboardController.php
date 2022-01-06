<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Damage;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Purchage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        // $today_date = date('Y-m-d');
        // $month_date = date('m');
        $year_date = date('Y');
        //expence
        // $previous_month_expenses = Expense::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_expenses = Expense::whereYear('created_at', $year_date)->get();
        $previous_year_expenses = Expense::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $expenses = Expense::all();

        //purchage

        // $previous_month_purchages = Purchage::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_purchages = Purchage::whereYear('created_at', $year_date)->get();
        $previous_year_purchages = Purchage::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $purchages = Purchage::all();

        // Sell Value
        // $previous_month_product = Product::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_product = Product::whereYear('created_at', $year_date)->get();
        $previous_year_product = Product::whereYear('created_at', date('Y', strtotime('-1 year')))->get();



        $product = Product::all();

        // Damage
        // $previous_month_damage = Damage::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_damage = Damage::whereYear('created_at', $year_date)->get();
        $previous_year_damage = Damage::whereYear('created_at', date('Y', strtotime('-1 year')))->get();




        $damage = Damage::all();



        return view('admin.home',compact(  'year_expenses', 'previous_year_expenses', 'expenses','purchages','product','damage',
    'year_purchages','previous_year_purchages','year_product','previous_year_product','year_damage','previous_year_damage'
    ));
    }


    public function today()
    {

        $today_date = date('Y-m-d');
        $today_expenses = Expense::whereDate('created_at', $today_date)->get();
        $today_purchages = Purchage::whereDate('created_at', $today_date)->get();
        $today_product = Product::whereDate('created_at', $today_date)->get();
        $today_damage = Damage::whereDate('created_at', $today_date)->get();

        return view('admin.filter.today', compact('today_date','today_expenses','today_purchages','today_product','today_damage'));


    }

    public function previous_month($previous_month_date = null)
    {
        if ($previous_month_date == null) {
        $previous_month_date = date('m');

        }
        $previous_month_expenses = Expense::whereMonth('created_at', date('m', strtotime('-1 month')))->get();
        $previous_month_purchages = Purchage::whereMonth('created_at', date('m', strtotime('-1 month')))->get();
        $previous_month_product = Product::whereMonth('created_at', date('m', strtotime('-1 month')))->get();
        $previous_month_damage = Damage::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        return view('admin.filter.previousmonth', compact('previous_month_date','previous_month_expenses','previous_month_purchages','previous_month_product','previous_month_damage'));


    }
    public function month($month_date = null)
    {
        if ($month_date == null) {
        $month_date = date('m');

        }
        $month_expenses = Expense::whereMonth('created_at', $month_date)->get();
        $month_purchages = Purchage::whereMonth('created_at', $month_date)->get();
        $month_product = Product::whereMonth('created_at', $month_date)->get();
        $month_damage = Damage::whereMonth('created_at', $month_date)->get();


        return view('admin.filter.month', compact('month_date','month_expenses','month_purchages','month_product','month_damage'));


    }

    public function yesterday()
    {

        $yesterday_expenses = Expense::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();
        $yesterday_purchages = Purchage::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();
        $yesterday_product = Product::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();
        $yesterday_damage = Damage::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        return view('admin.filter.yesterday', compact('yesterday_expenses','yesterday_purchages','yesterday_product','yesterday_damage'));


    }






}
