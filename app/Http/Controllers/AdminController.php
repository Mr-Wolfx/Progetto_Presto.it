<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;


class AdminController extends Controller
{

    public function send_email(Request $request)
    {
    $contactMail = [
        'name'=> Auth::user()->name,
        'email'=> Auth::user()->email,
        'description'=> $request->description
        
    ];
        $user=Auth::user();

        Mail::to('presto.it@noreply.it')->send(new AdminMail($contactMail,$user));
        return redirect()->back()->with('message', 'La richiesta è stata inviata correttamente.');
    }

    public function makeRevisor(User $user){
        
        
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('messageSuccess', 'Complimenti! L\'utente è diventato revisore' );
    }
}


