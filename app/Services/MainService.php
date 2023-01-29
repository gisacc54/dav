<?php

namespace App\Services;

use AfricasTalking\SDK\AfricasTalking;

class MainService
{
    public static function SendAirTime($contact): void
    {

        $username = "sandbox";

        $apikey   = "b15bf3a9cb79a01777a18428055b9d69a8fd39aa41511b1f40c7b80dd7bdb444";

        // Initialize the SDK
        $AT       = new AfricasTalking($username, $apikey);

        // Get the airtime service
        $airtime  = $AT->airtime();


        // Set the phone number, currency code and amount in the format below
        $recipients = [[
            "phoneNumber"  => "+".$contact->phone_number,
            "currencyCode" => "TZS",
            "amount"       => $contact->amount
        ]];

        try {
            // That's it, hit send and we'll take care of the rest
            $results = $airtime->send([
                "recipients" => $recipients
            ]);
        } catch(Exception $e) {
//            echo "Error: ".$e->getMessage();
        }
    }
}
