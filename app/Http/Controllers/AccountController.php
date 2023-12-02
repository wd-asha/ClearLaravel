<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------- */
    /* User's personal account after authorization */
    /* ------------------------------------------- */
    public function index()
    {
        $orders = Order::all();
        return view('account', compact('orders'));
    }

    public function personal(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ],
            [
                'name.required' => 'Оязательно для заполнения',
                'email.required' => 'Обязательно для заполнения',
                'email.email' => 'Не верный формат Email'
            ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        $update = User::find(Auth::user()->id)->update($data);

        $notification = array(
            'message' => 'Информация обновлена',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function shipping(Request $request)
    {
        $data = $request->validate([
            'shipping' => 'required',
            'phone' => 'required'
        ],
            [
                'shipping.required' => 'Оязательно для заполнения',
                'phone.required' => 'Обязательно для заполнения'
            ]);

        $data = array();
        $data['shipping'] = $request->shipping;
        $data['phone'] = $request->phone;

        $update = User::find(Auth::user()->id)->update($data);

        $notification = array(
            'message' => 'Информация обновлена',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

}
