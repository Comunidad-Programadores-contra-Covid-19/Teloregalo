<?php

namespace App\Http\Controllers;
use App\Notifications\PaymentNotification;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function notificat(){
        /* $user = User::find(1); */
        return User::find(2)->notify(new PaymentNotification('¡asddasasd'));
     
    }
        
    
}
