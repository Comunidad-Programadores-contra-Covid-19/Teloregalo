<?php

namespace App;

use Illuminate\Http\Request;
use App\Otp;

use App\User;
use App\Offer;
use Mail;
use App\Mail\HeroeCodigoEmail;
class OtpService
{

    public function generateOtp($client_id, $store_id,$offer_id)
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
        $otp->otp_timestamp = $date;
        $otp->user_id = $client_id;
        $otp->store_id = $store_id;
        $otp->offer_id = $offer_id;
        $otp->save();

        $clientEmail = User::findOrFail($client_id);
        $offerEmail = Offer::findOrFail($offer_id);
        $params= array('offer'=>$offerEmail->name_offer,'otp'=>$otp->otp_pass,'store'=>$offerEmail->store_id, );
        Mail::to($clientEmail->email)->send(new HeroeCodigoEmail($params));

        $offerEmail->active_otps++;
        $offerEmail->save();

        $store = Store::find($store_id);
        $store->claimed++;
        $store->save();

        return $otp;
    }
}
