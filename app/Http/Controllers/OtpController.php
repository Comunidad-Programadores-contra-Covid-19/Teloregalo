<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtpService;
use App\Otp;

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
        return $otp;
    }

    public function destroy(Request $request)
    {
        $id = $request->codigo;
        $otp = Otp::find($id);
        $otp->delete();
        return back();
    }
}
