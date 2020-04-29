<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtpService;

class OtpController extends Controller
{
    public function create()
    {
        $otp = $this->store();
        return view('otps.buy', ['otp' => $otp]);
    }

    public function store()
    {
        $otpService = new OtpService();
        $otp = $otpService->generateOtp(1);
        //return view('otps.buy', ['otp' => $otp]);
        return $otp;
    }
}
