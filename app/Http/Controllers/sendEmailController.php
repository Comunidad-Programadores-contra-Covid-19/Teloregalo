<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\pruebaEmail;
class sendEmailController extends Controller
{
    public function mandar(){
     
       Mail::to('l.kapluk@itecriocuarto.org.ar')->send(new pruebaEmail());
    /*     Mail::send('mails.prueba',$data, function ($message){
            $message->from('kaplukluciano@gmail.com', 'Your Application');

            $message->to('l.kapluk@itecriocuarto.org.ar', 'luchjo')->subject('Welcome!');;
        }); */
    }
}
