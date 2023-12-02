<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Filters\ProductFilter;

class ProductController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* --------------------- */
    /*   Show all Products   */
    /* --------------------- */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        $trashed = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        /* to the products list page */
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /* -- end show all products -- */

    /* ------------------- */
    /*   Create Product    */
    /* ------------------- */
    public function create()
    {
        $categories = Category::all();
        /* to the create new product page */
        return view('admin.product.create', compact('categories'));
    }
    /* -- end create product -- */

    /* -------------------- */
    /*   Save new Product   */
    /* -------------------- */
    public function store(Request $request)
    {
        /* preparing data for saving */
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['country'] = $request->country;
        $data['brand'] = $request->brand;
        $data['aroma'] = $request->aroma;
        $data['release'] = $request->release;
        $data['pack'] = $request->pack;
        $data['model'] = $request->model;
        $data['volume'] = $request->volume;
        $data['quantity'] = $request->quantity;
        $data['series'] = $request->series;
        $data['weight'] = $request->weight;
        $data['ph'] = $request->ph;
        $data['amount'] = $request->amount;
        $data['price'] = $request->price;
        $data['desc'] = $request->desc;
        $data['about'] = $request->about;
        $data['forma'] = $request->forma;
        $data['material'] = $request->material;
        $data['color'] = $request->color;
        $data['purpose'] = $request->purpose;
        $data['washing'] = $request->washing;
        $data['depth'] = $request->depth;
        $data['arm'] = $request->arm;
        $data['machine'] = $request->machine;
        $data['bracing'] = $request->bracing;
        $data['mop'] = $request->mop;
        $data['density'] = $request->density;

        if($request->news) {
            $data['news'] = 1;
        }else{
            $data['news'] = 0;
        };
        if($request->hits) {
            $data['hits'] = 1;
        }else{
            $data['hits'] = 0;
        };
        if($request->promo) {
            $data['promo'] = 1;
        }else{
            $data['promo'] = 0;
        };

        $image_yes1 = $request->file('image1');
        $image_yes2 = $request->file('image2');
        if($image_yes1) {
            /* prepare and save a new image */
            $image1 = $request->file('image1');
            $location1 = 'media/product/';
            $name_image1 = hexdec(uniqid());
            $ext_image1 = strtolower($image1->getClientOriginalExtension());
            $full_image1 = $location1.$name_image1.'.'.$ext_image1;
            $image1->move($location1, $full_image1);
            $data['image1'] = $full_image1;
        }

        if($image_yes2) {
            /* prepare and save a new image */
            $image2 = $request->file('image2');
            $location2 = 'media/product/';
            $name_image2 = hexdec(uniqid());
            $ext_image2 = strtolower($image2->getClientOriginalExtension());
            $full_image2 = $location2 . $name_image2 . '.' . $ext_image2;
            $image2->move($location2, $full_image2);
            $data['image2'] = $full_image2;
        }
        /* create new product*/
        Product::create($data);
        $notification = array(
            'message' => 'Новый товар создан',
            'alert-type' => 'success'
        );
        /* to the products list page */
        return Redirect()->route('admin.products')->with($notification);
    }
    /* -- end save new product -- */

    /* ---------------- */
    /*  Delete Product  */
    /* ---------------- */
    public function delete($id)
    {
        Product::find($id)->delete();
        $notification = array(
            'message' => 'Товар в корзине',
            'alert-type' => 'success'
        );
        /* to the products list page */
        return Redirect()->back()->with($notification);
    }
    /* end delete product */

    /* ---------------------- */
    /*      Restore Product   */
    /* ---------------------- */
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Товар восстановлен',
            'alert-type' => 'success'
        );
        /* to the products list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore product -- */

    /* -------------------- */
    /*    Destroy Product   */
    /* -------------------- */
    public function destroy($id)
    {
        /* find a product */
        $product = Product::onlyTrashed()->find($id);
        /* delete photos if they exist */
        if($product->image1 !== NULL && $product->image1 !== 'media/product/empty-image.png') {
            $image1 = $product->image1;
            unlink($image1);
        }
        if($product->image2 !== NULL && $product->image2 !== 'media/product/empty-image.png') {
            $image2 = $product->image2;
            unlink($image2);
        }
        /* delete a product */
        Product::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Товар удален',
            'alert-type' => 'success'
        );
        /* to the products list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy dish -- */

    /* ------------------ */
    /*     Edit Product   */
    /* ------------------ */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        /* to the product`s edit page */
        return view('admin.product.edit', compact('categories', 'product'));
    }
    /* -- end edit product -- */

    /* --------------------------- */
    /*     Update Product Image    */
    /* --------------------------- */
    public function updatePhoto(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $old_image1 = $request->old_image1;
        $old_image2 = $request->old_image2;
        $image_yes1 = $request->file('image1');
        $image_yes2 = $request->file('image2');
        $data = array();

        if($image_yes1) {
            /* delete the previous image if there was one */
            if($old_image1 !== 'media/product/empty-image.png') {
                unlink($old_image1);
            };
            /* prepare and save a new image */
            $image1 = $request->file('image1');
            $location1 = 'media/product/';
            $name_image1 = hexdec(uniqid());
            $ext_image1 = strtolower($image1->getClientOriginalExtension());
            $full_image1 = $location1.$name_image1.'.'.$ext_image1;
            $image1->move($location1, $full_image1);
            $data['image1'] = $full_image1;
        }

        if($image_yes2) {
            /* delete the previous image if there was one */
            if($old_image2 !== 'media/product/empty-image.png') {
                unlink($old_image2);
            };
            /* prepare and save a new image */
            $image2 = $request->file('image2');
            $location2 = 'media/product/';
            $name_image2 = hexdec(uniqid());
            $ext_image2 = strtolower($image2->getClientOriginalExtension());
            $full_image2 = $location2.$name_image2.'.'.$ext_image2;
            $image2->move($location2, $full_image2);
            $data['image2'] = $full_image2;

            /* updating product */
            Product::find($id)->update($data);
            $notification = array(
                'message' => 'Изображения обновлены',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображения не обновлены',
                'alert-type' => 'error'
            );
        }

        /* to the products list page */
        return Redirect()->route('admin.products')->with($notification);
    }
    /* ---- end update product images ---- */

    /* --------------------- */
    /*    Update Product     */
    /* --------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['country'] = $request->country;
        $data['brand'] = $request->brand;
        $data['aroma'] = $request->aroma;
        $data['release'] = $request->release;
        $data['pack'] = $request->pack;
        $data['model'] = $request->model;
        $data['volume'] = $request->volume;
        $data['quantity'] = $request->quantity;
        $data['series'] = $request->series;
        $data['weight'] = $request->weight;
        $data['ph'] = $request->ph;
        $data['amount'] = $request->amount;
        $data['price'] = $request->price;
        $data['desc'] = $request->desc;
        $data['about'] = $request->about;
        $data['density'] = $request->density;
        $data['forma'] = $request->forma;
        $data['material'] = $request->material;
        $data['color'] = $request->color;
        $data['purpose'] = $request->purpose;
        $data['washing'] = $request->washing;
        $data['depth'] = $request->depth;
        $data['arm'] = $request->arm;
        $data['machine'] = $request->machine;
        $data['bracing'] = $request->bracing;
        $data['mop'] = $request->mop;
        if($request->news) {
            $data['news'] = 1;
        }else{
            $data['news'] = 0;
        };
        if($request->hits) {
            $data['hits'] = 1;
        }else{
            $data['hits'] = 0;
        };
        if($request->promo) {
            $data['promo'] = 1;
        }else{
            $data['promo'] = 0;
        };
        /* update product */
        $update = Product::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Товар обновлен',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the products list page */
        return Redirect()->route('admin.products')->with($notification);
    }
    /* -- end update product -- */

    public function status0($id)
    {
        Product::find($id)->update([
            'status' => 0
        ]);
        return Redirect()->back();
    }

    public function status1($id)
    {
        Product::find($id)->update([
            'status' => 1
        ]);
        return Redirect()->back();
    }

    /* -------------------------------------- */
    /* Show all Products with Filter Category */
    /* -------------------------------------- */
    public function indexS(ProductFilter $request){
        $products = Product::filter($request)->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        $trashed = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /* end show all products with filter category */

    /* ------------------------------------- */
    /* Show all Products with Filter Amount */
    /* ------------------------------------- */
    public function indexA(ProductFilter $request){
        $products = Product::filter($request)->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        $trashed = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /* end show all products with filter amount */

    /* ------------------------- */
    /*   Change amount product   */
    /* ------------------------- */
    public function amount(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['amount'] = (int)$request->amount;
        /* update product */
        $update = Product::find($id)->update($data);
        if($update && $data['amount'] != NULL && $data['amount'] > 0 ) {
            $notification = array(
                'message' => 'Количество продукта изменено',
                'alert-type' => 'success'
            );
            /* to the products list page */
            return Redirect()->route('admin.products')->with($notification);
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
            /* to the products list page */
            return Redirect()->route('admin.products')->with($notification);
        }
    }
    /* end change amount product */

}
