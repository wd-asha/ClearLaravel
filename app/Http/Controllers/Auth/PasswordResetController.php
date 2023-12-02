<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class PasswordResetController extends Controller
{
    public function showForm()
    {
        return view('reset-password');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'new_pass' => 'required|min:6',
            'repeat_pass' => 'required|min:6|same:new_pass',
        ],
            [
                'new_pass.required' => 'Обязательно для заполнения',
                'repeat_pass' => 'Обязательно для заполнения',
                'new_pass.min' => 'Меньше 6 символов',
                'repeat_pass.min' => 'Меньше 6 символов',
                'repeat_pass.same' => 'Пароли отличаются',
            ]);

        $user = auth()->user();
        $new_pass = $request->new_pass;
        $password = bcrypt($new_pass);
        $data = array();
        $data['password'] = $password;
        $user->update($data);

        /*$userId = Auth::user()->id;
        $subscribers = Subscriber::where(['user_id'=> $userId])->get();
        if($subscribers->isEmpty()) {
            $flag = false;
        }else{
            $flag = true;
        }*/

        $notification = array(
            'message' => 'Пароль изменен',
            'alert-type' => 'success'
        );
        return Redirect()->route('account')->with($notification/*, $flag*/);

    }
}
