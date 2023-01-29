<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UssdController extends Controller
{
    public function ussd(Request $request)
    {
        $sessionId      = $request->get('sessionId');
        //serviceCode: your USSD code
        $serviceCode    = $request->get('serviceCode');
        $phoneNumber    = $request->get('phoneNumber');
        //text: user input in form of a string
        $text           = $request->get('text');

        if ($text == "") {
            // This is the first request. Note how we start the response with CON
            $response  = "CON What would you want to check \n";
            $response .= "1. My Account \n";
            $response .= "2. My phone number";

        } else if ($text == "1") {
            // Business logic for first level response
            $response = "CON Choose account information you want to view \n";
            $response .= "1. Account number \n";

        } else if ($text == "2") {
            // Business logic for first level response
            // This is a terminal request. Note how we start the response with END
            $response = "END Your phone number is ".$phoneNumber;

        } else if($text == "1*1") {
            // This is a second level response where the user selected 1 in the first instance
            $accountNumber  = "ACC1001";

            // This is a terminal request. Note how we start the response with END
            $response = "END Your account number is ".$accountNumber;

        }

        // Echo the response back to the API
        header('Content-type: text/plain');
        echo $response;
    }
}