<?php

namespace App\Http\Controllers;
use App\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function make() {
        return view('welcome');
    }
}
