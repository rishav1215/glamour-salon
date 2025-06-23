<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        $salons = Salon::where('is_approved', true)->latest()->get();
        return view('home', compact('salons'));
    }
}
