<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Dashboard: Overview of Transactions and Blocks
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }
}
