<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtpService;
use App\Otp;
use App\Store;

class OtpController extends Controller
{
    public function create($idstore, $idclient)
    {
        $otp = $this->store($idstore, $idclient);
        return view('otps.buy', ['otp' => $otp]);
    }

    public function store($store_id, $client_id)
    {
        $otpService = new OtpService();
        $otp = $otpService->generateOtp($client_id, $store_id);
        return $otp;
    }

    public function destroy(Request $request, $idstore)
    {
        $store = Store::where('user_id', $idstore)->first();
        $pass = $request->codigo;
        $otp = Otp::where('otp_pass', $pass)->first();
        $message = "";
        if ($otp != null && $store != null) {
            if ($otp->store_id == $store->id) {
                $otp->delete();
                $message = "Codigo ingresado correctamente!";
            } else {
                $message = "Ups! El codigo o el comercio es incorrecto";
            }
        } else {
            $message = "Ups! El codigo o el comercio es incorrecto";
        }
        return back()->with('info', $message);
    }
}
