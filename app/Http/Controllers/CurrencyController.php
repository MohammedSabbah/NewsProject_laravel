<?php

namespace App\Http\Controllers;

use App\Entities\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return Currency::latest()->get();
    }
}
