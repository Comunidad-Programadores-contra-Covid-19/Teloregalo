<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\pruebaEmail;
class sendEmailController extends Controller
{
    public function mandar(){
     
       Mail::to('kaplukluciano@gmail.com')->send(new pruebaEmail('LUCHOZZ')); 


       /* Mail::send(new pruebaEmail('LUCHOZZ'),
        array(
            'name' => '$r->name',
            'email' => 'kaplukluciano@gmail.com',
            'user_message' => '$r->message',
           // 'telephone'=>$r->telephone,
           // 'subject'=>$r->subject
        ), function($message){

            $message->to('kaplukluciano@gmail.com')->subject('Contact Form || abc.com');
            $message->from('kaplukluciano@gmail.com');
            // ->setBody($r->user_message); // assuming text/plain

        }); */

    /*     Mail::send('mails.prueba',$data, function ($message){
            $message->from('kaplukluciano@gmail.com', 'Your Application');

            $message->to('l.kapluk@itecriocuarto.org.ar', 'luchjo')->subject('Welcome!');;
        }); */
    }
}
