<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\Alerts;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $products = Product::all();
        $order_yes = "";
        return view('carts', compact('products', 'cartItems', 'order_yes'));
    }

    /* -------------------------------------- */
    /*      Add product to shopping cart      */
    /* -------------------------------------- */
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $request->qtyH,
                'price' => $product->price,
                'weight' => 0,
                'options' => [
                    'image1' => $product->image1,
                ]
            ]
        );

        $notification = array(
            'message' => 'Товар добавлен в заказ',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -------- end add product to shopping cart -------- */

    /* --------------------------------------------- */
    /*       Remove an item from shopping cart       */
    /* --------------------------------------------- */
    public function delete($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Товар удален из заказа',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end remove an item from shopping cart --- */

    /* ------------------------------------------ */
    /*       Destroy all from shopping cart       */
    /* ------------------------------------------ */
    public function destroy()
    {
        Cart::destroy();
        $notification = array(
            'message' => 'Блюда удалены из заказа',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end destroy all from shopping cart --- */

    /* --------------------------------------------- */
    /*          Recalculation of the cost            */
    /* --------------------------------------------- */
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification = array(
            'message' => 'Товар обновлен',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ------- end Recalculation of the cost ------- */

    /* --------------------------------- */
    /*          Order formation          */
    /* --------------------------------- */
    public function check(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'delivery' => 'required',
            'date' => 'required',
            'phone' => 'required'
        ],
            [
                'name.required' => 'Укажите имя',
                'email.required' => 'Укажите Email',
                'delivery.required' => 'Укажите адрес доставки',
                'date.required' => 'Укажите дату и время доставки',
                'phone.required' => 'Укажите телефон'
            ]);

        $content = Cart::content();
        /* Prepare data for the order */
        $data = array();
        $data['user_id'] = $request->user_id;
        $data['user_name'] = $request->name;
        $data['order_email'] = $request->email;
        $data['order_delivery'] = $request->delivery;
        $data['order_date'] = $request->date;
        $data['order_phone'] = $request->phone;
        $data['order_total'] = strval(Cart::priceTotal());
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $order_id = Order::insertGetId($data);
        /* Prepare data for a shopping list */
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_title'] = $row->name;
            $details['product_qty'] = $row->qty;
            $details['product_price'] = $row->price;
            $details['created_at'] = Now();
            $details['updated_at'] = Now();
            OrderItem::insert($details);
            $product = Product::find($row->id);
            $product->amount = $product->amount - (1 * $row->qty);
            $product->update();
        };
        /* Notify the buyer about the purchase by email */
        /* preparing data for the letter */
        $name = $data['user_name'];
        $email = $data['order_email'];
        $body = Cart::content();
        $subject = $request->subject;
        $total = Cart::priceTotal();
        $orderid = $order_id;
        /* send a letter */
        Mail::to($email)->send(new Alerts($name, $body, $total, $orderid));
        /* Deleting the contents of the shopping cart */
        Cart::destroy();
        /*$order_yes = "Заказ принят";
        return view('welcome', compact('order_yes'));*/
        $notification = array(
            'message' => 'Заказ принят',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --------------- end Order formation ------------------ */
}
