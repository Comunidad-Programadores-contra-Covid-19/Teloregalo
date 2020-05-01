<?php

namespace App;

use Illuminate\Http\Request;
use App\Otp;

class OtpService
{

    public function generateOtp($client_id)
    {
        // generate() : create a new OTP
        // PARAM $id : user ID, order ID, or just any unique transaction ID
        $alphabets = "ABCDEFGHIJKLMNOPQRSTUWXYZ123456789";
        $count = strlen($alphabets) - 1;
        $pass = "";
        $OTP_LEN = 5;
        for ($i = 0; $i < $OTP_LEN; $i++) {
            $pass .= $alphabets[rand(0, $count)];
        }
        $date = date("Y-m-d H:i:s");
        $otp = new Otp();
        $otp->otp_pass = $pass;
        $otp->client_id = $client_id;
        $otp->save();
        return $otp;
    }
}
