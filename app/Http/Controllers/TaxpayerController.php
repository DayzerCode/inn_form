<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class TaxpayerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('taxpayer.index');
    }
}
