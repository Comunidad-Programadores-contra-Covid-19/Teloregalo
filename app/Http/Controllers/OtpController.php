<?php

namespace App\Http\Controllers;

use Mail;
use App\Otp;
use App\User;
use App\Offer;
use App\Store;
use App\OtpService;
use App\UserMailSend;
use Illuminate\Http\Request;
use App\Mail\HeroeCodigoEmail;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserMailSendConfirmed;
use App\Notifications\ClientMailSendConfirmed;

class OtpController extends Controller
{
    public function create($idstore, $idclient, $offer_id)
    {
        $otpClient = Otp::where('user_id', $idclient)
            ->orderBy('otp_timestamp', 'ASC')->first();

        $offer = Offer::find($offer_id);

        if(!$offer || $offer->amount == 0 || $offer->amount <= $offer->active_otps)
            return back()->with('info', 'Este producto no tiene stock!');

        if ($otpClient == null) {
            $store=DB::table('stores')
            ->select('name', 'address')
            ->where('id', '=' , $idstore)
            ->get();
            $otp = $this->store($idstore, $idclient, $offer_id);
            return view('otps.buy', ['otp' => $otp, 'offer' => $offer->name_offer, 'store' => $store]);
        } else {
            $OTP_VALID = 1440; // Equivale a 24 horas.
            $validTill = strtotime($otpClient->otp_timestamp) + ($OTP_VALID * 60);
            if (strtotime("now") > $validTill) {
                $otp = $this->store($idstore, $idclient, $offer_id);

                $store=DB::table('stores')
                    ->select('name', 'address')
                    ->where('id', '=' , $idstore)
                    ->get();

                return view('otps.buy', ['otp' => $otp, 'offer' => $offer->name_offer, 'store' => $store]);
            } else {
                return back()->with('info', 'Ya pediste o consumiste un beneficio!');
            }
        }
    }

    public function store($store_id, $client_id, $offer_id)
    {
        $otpService = new OtpService();
        $otp = $otpService->generateOtp($client_id, $store_id, $offer_id);

        return $otp;
    }



    public function destroy(Request $request, $idstore)
    {
        $OTP_VALID = 60;
        $store = Store::where('user_id', $idstore)->first();
        $pass = $request->codigo;
        $otp = Otp::where('otp_pass', $pass)->first();
        $message = "";
        $success = false;
        if ($otp != null && $store != null) {
            if ($otp->store_id == $store->id) {
                if ($otp->is_used == 0) {
                    $validTill = strtotime($otp->otp_timestamp) + ($OTP_VALID * 60);
                    if (strtotime("now") > $validTill) {
                        $message = "El codigo expiro!";
                    } else {
                        $this->discountOffer($otp->offer_id);
                        $otp->is_used = 1;
                        $otp->save();
                        $message = "Codigo ingresado correctamente!";
                        $success = true;
                        $client= User::findOrFail($otp->user_id);
                        $params= array('store'=>$store->name,'storeaddress'=>$store->address,'clientid'=>$client->id,'client'=>$client->name, );
                        $client->notify(new ClientMailSendConfirmed($params));
                        $recipient= UserMailSend::where('offer_id', $otp->offer_id)->orderBy('created_at','desc')->first();
                        if ($recipient==true) {
                            $recipient->notify(new UserMailSendConfirmed);
                            $recipient->delete();
                        }
                        return response()->json([
                            'success' => $success,
                            'info' => $message,
                            'offerId' => $otp->offer_id,
                            'buyerId' => $otp->user_id
                        ]);
                    }
                } else {
                    $message = "Ya usaste este codigo!";
                }
            } else {
                $message = "Ups! El codigo o el comercio es incorrecto";
            }
        } else {
            $message = "Ups! El codigo o el comercio es incorrecto, o el codigo ya expiro";
        }
        return response()->json([
            'success' => $success,
            'info' => $message
        ]);



    }
    public function clientCancel($idOtp){
        $message="se cancelo tu pedido";
        $otp = Otp::find($idOtp);

        $offer = Offer::find($otp->offer_id);
        $offer->active_otps = $offer->active_otps - 1;
        $offer->save();

        $store = Store::find($otp->store_id);
        $store->claimed = $store->claimed - 1;
        $store->save();

        $otp->delete();
        return back()->with('info', $message);
    }


    public function discountOffer($idOffer)
    {
        $offer = Offer::where('id', $idOffer)->first();
        $offer->amount = $offer->amount - 1;
        $offer->active_otps = $offer->active_otps - 1;
        $offer->save();
        $store = Store::find($offer->store_id);
        $store->gifts = $store->gifts - 1;
        $store->claimed = $store->claimed - 1;
        $store->save();
    }
}
