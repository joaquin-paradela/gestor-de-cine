<?php

namespace App\Http\Controllers;

use App\Mail\MailContacto;
use Illuminate\Http\Request;
use Mail;

class ContactoController extends Controller
{
    public function contacto()
    {
        return view('contacto');
    }

    public function enviarMail(Request $request)
    {
        $detalles =[
            'email'=> $request->email,
            'asunto'=> $request->asunto,
            'consulta'=> $request->consulta
        ];

        Mail::to('joaquin.paradela28@gmail.com')->send(new MailContacto($detalles));

        return back()->with('mensaje_enviado','Su consulta se envió correctamente');

    }
}
