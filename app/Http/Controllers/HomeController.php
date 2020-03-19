<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $total_users = User::all()->count();
        $superAdmins = User::where('role', 'super')->get()->count();
        $admins = User::where('role', 'admin')->get()->count();
        $visitors = User::where('role', 'visitor')->get()->count();
        $first_floor_active_shops = Shop::where('floor', 1)->where('status', 1)->get()->count();
        $first_floor_inactive_shops = Shop::where('floor', 1)->where('status', 2)->get()->count();
        $second_floor_active_shops = Shop::where('floor', 2)->where('status', 1)->get()->count();
        $second_floor_inactive_shops = Shop::where('floor', 2)->where('status', 2)->get()->count();
        $total_shops = Shop::all()->count();
        $current_month = Carbon::now()->format('F');
        $current_month_total = Bill::Where('month', $current_month)->get()->sum('total_amount');
        $current_month_paid = Bill::Where('month', $current_month)->get()->sum('paid_amount');
        $current_month_due = Bill::Where('month', $current_month)->get()->sum('due_amount');

        return view('admin.home.home', [
            'total_users' => $total_users,
            'superAdmins' => $superAdmins,
            'admins' => $admins,
            'visitors' => $visitors,
            'first_floor_active_shops' => $first_floor_active_shops,
            'first_floor_inactive_shops' => $first_floor_inactive_shops,
            'second_floor_active_shops' => $second_floor_active_shops,
            'second_floor_inactive_shops' => $second_floor_inactive_shops,
            'total_shops' => $total_shops,
            'current_month' => $current_month,
            'current_month_total' => $current_month_total,
            'current_month_paid' => $current_month_paid,
            'current_month_due' => $current_month_due,
        ]);
    }
}
