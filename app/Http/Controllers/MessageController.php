<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kawankoding\Fcm\Fcm;

class MessageController extends Controller
{
    public function send()
    {

        $recipients = request()->to;

        Fcm()
            ->to($recipients)
            ->priority('high')
            ->timeToLive(0)
            ->data(request()->message)
            ->send();

        return response()->json(['message' => 'Message sent']);
    }
}
