<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\HelloMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public $data = [];

    public function confirmOrderMail()
    {
        $user = User::find(1);
        $order = Order::find(1);
        Mail::send('mail.confirm-mail', compact('user', 'order'), function ($email) use ($user) {
            $email->to($user->email, $user->name)
                ->subject('Xác nhận đơn hàng');
        });
        return redirect()->back();
    }

    public function sendMailCase2()
    {
        $user = User::find(1);
        $order = Order::find(1);
        $mail = new HelloMail($user, $order);
        Mail::to('hoangnam1114ad@gmail.com')->send($mail);
        return true;
    }

}
