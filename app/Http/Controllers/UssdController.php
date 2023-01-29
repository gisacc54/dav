<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UssdController extends Controller
{
    public function ussd(Request $request)
    {
        header('Content-type: text/plain');
        echo "test";
    }
}
