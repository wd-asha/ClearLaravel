<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    /* ----------------------------- */
    /*    Subscribe new subscriber   */
    /* ----------------------------- */
    public function subscribe(Request $request)
    {
        $scroll = $request->scroll;
        $data = $request->validate([
            'user_email' => 'required|email|unique:subscribers'
        ],
            [
                'user_email.required' => 'Обязательно для заполнения',
                'user_email.unique' => 'Вы уже подписаны',
                'user_email.email' => 'Не верный формат Email'
            ]);

        /* preparing the data */
        $data = array();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            $user_email = Auth::user()->email;
            $data['user_id'] = $user_id;
            $data['user_name'] = $user_name;
            $data['user_email'] = $user_email;
        }else{
            $data['user_email'] = $request->user_email;
            }
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        /* create new subscriber */
        Subscriber::create($data);
        $notification = array(
            'message' => 'Вы подписаны на новости сайта',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end subscribe new subscriber */
}
