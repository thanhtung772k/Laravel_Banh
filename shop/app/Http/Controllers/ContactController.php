<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function contact()
    {
        return view('page.lienhe');
    }
    public function sendEmail(Request $request)
    {
        $detail=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'msg'=>$request->msg
        ];
        Mail::to('shinkute77@gmail.com')->send(new ContactMail($detail));
        return back()->with('message_sent','Cảm ơn bạn đã gửi thông báo, Chúng tôi sẽ xem xét và sớm phản hồi cho bạn !!!');
    }
    
}
