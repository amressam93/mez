<?php

namespace App\Http\Controllers\Admin;

use App\Models\Main_Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Product as Model;
use App\Models\Product_Colors;
use App\Models\Product_Images;
use App\Models\Product_Sizes;
use App\Models\Product_Tags;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class ProductsController extends Controller
{

    private $view = 'admin.products.';
    private $redirect = 'admin_panel/products';


    public function un_active($id) {

        $Item = Model::findOrFail($id);

        $Item->update([ 'status' => 0 ]);

        return redirect($this->redirect)->with('error','تم  الغاء تفعيل المنتج بنجاح');

    }

    public function active($id) {

        $Item = Model::findOrFail($id);

        $Item->update([ 'status' => 1 ]);

        return redirect($this->redirect)->with('success','تم  تفعيل المنتج بنجاح');

    }

    public function index()
    {
        $Item = Model::get(['brand','title','main_category_id','sub_category_id','id','small_pic','status','pic']);
        return view($this->view . 'index',compact('Item'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(modelRequest $request)
    {

        $setting = Setting::first();

        $request->validate([
            'slider' => 'required',
            'slider.*' => 'required|image|mimes:jpg,png,jpeg'
        ]);


        $url = $this->Process_Name($request->url);

        $urlExistMainCategory = Main_Category::where('url', $url)->first();
        $urlExistSubCategory  = Sub_Category::where('url',$url)->first();
        $urlExistProducts     = Product::where('url',$url)->first();


        if($urlExistMainCategory or $urlExistSubCategory or $urlExistProducts)
        {
            return redirect()->back()->with('error', 'هذا اللينك  لا يجب ان يحتوي علي قيم موجوده مسبقا')->withInput();
        }

        $product = Model::create($this->gteInput($request,null));

        Product_Colors::create([
            'product_id' => $product->id,
            'color_id' => $request->color_id
        ]);

        if($request->size1 != null && $request->quantity1 != null && $request->quantity1 > 0) {
            Product_Sizes::create([
                'product_id' => $product->id,
                'size_id' => $request->size1,
                'quantity' => $request->quantity1,
                'order' => 1
            ]);
        }

        $x = 2;
        for ($i=2; $i <= $setting->product_sizes_count; $i++) {

            $check_size = Product_Sizes::where('product_id',$product->id)->where('size_id',$request->{'size'.$i})->first();

            if($check_size == null) {

                if($request->{'size'.$i} != null && $request->{'quantity'.$i} != null && $request->{'quantity'.$i} > 0) {
                    Product_Sizes::create([
                        'product_id' => $product->id,
                        'size_id' => $request->{'size'.$i},
                        'quantity' => $request->{'quantity'.$i},
                        'order' => $x
                    ]);
                    $x = $x + 1;
                }
            }
        }

        if($request->tags != null) {
            foreach(explode(",",$request->tags) as $tag) {
                Product_Tags::create([
                    'product_id' => $product->id,
                    'tag' => $tag,
                    'url' => $this->Process_Name($tag)

                ]);
            }
        }

        $this->upload_images($product);


        return redirect($this->redirect)->with('success','تمت الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Item = Model::findOrFail($id);

        $products = Model::get(['id','price','price_before_discount','discount']);


        /*
        foreach($products as $product) {
            $product->update([
                //'price_before_discount' => $product->price,
                //'price' => $product->price_before_discount - round(($product->price_before_discount * $product->discount) / 100)
            ]);
        }
        */

        return view($this->view . 'edit', [ 'Item' => $Item ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(modelRequest $request, $id)
    {
        //dd($request->all());

        $setting = Setting::first();

        $Item = Model::findOrFail($id);


        $url = $this->Process_Name($request->url);

        $urlExistMainCategory = Main_Category::where('url', $url)->first();
        $urlExistSubCategory  = Sub_Category::where('url',$url)->first();
        $urlExistProducts     = Product::where('url',$url)->where('id','!=',$id)->first();


        if($urlExistMainCategory or $urlExistSubCategory or $urlExistProducts)
        {
            return redirect()->back()->with('error', 'هذا اللينك  لا يجب ان يحتوي علي قيم موجوده مسبقا')->withInput();
        }


        $Item->update($this->gteInput($request,$Item));

        if($request->color_id != null) {

            Product_Colors::where('product_id',$Item->id)->delete();

            Product_Colors::create([
                'product_id' => $Item->id,
                'color_id' => $request->color_id
            ]);

        }

        if($request->size1 != null && $request->quantity1 != null && $request->quantity1 > 0) {

            Product_Sizes::where('product_id',$Item->id)->where('order',1)->delete();

            Product_Sizes::create([
                'product_id' => $Item->id,
                'size_id' => $request->size1,
                'quantity' => $request->quantity1,
                'order' => 1
            ]);
        }

        Product_Sizes::where('product_id',$Item->id)->where('order','>',1)->delete();

        $x = 2;

        for ($i=2; $i <= $setting->product_sizes_count; $i++) {

            $check_size = Product_Sizes::where('product_id',$Item->id)->where('size_id',$request->{'size'.$i})->first();

            if($check_size == null) {

                if($request->{'size'.$i} != null && $request->{'quantity'.$i} != null && $request->{'quantity'.$i} > 0) {
                    Product_Sizes::create([
                        'product_id' => $Item->id,
                        'size_id' => $request->{'size'.$i},
                        'quantity' => $request->{'quantity'.$i},
                        'order' => $x
                    ]);
                    $x = $x + 1;
                }
            }
        }

        $this->upload_images($Item);

        Product_Tags::where('product_id',$Item->id)->delete();

        if($request->tags != null) {
            foreach(explode(",",$request->tags) as $tag) {
                Product_Tags::create([
                    'product_id' => $Item->id,
                    'tag' => $tag,
                    'url' => $this->Process_Name($tag)

                ]);
            }
        }

        return redirect()->back()->with('info','تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Item = Model::findOrFail($id);
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only([
            'title' , 'main_category_id','sub_category_id' , 'brand' ,
            'discount', 'price_before_discount',
            'short_description' , 'long_description'
        ]);

        $input['price'] = $request->price_before_discount - round(($request->price_before_discount * $request->discount) / 100);

        $url = $this->Process_Name($request->url);

        $custom_name = $url;
        $custom_name_sm = 'صوره_مصغرة_'.$url;

        $path = public_path('products');

        $input['url'] = $url;


        if(isset($modelClass)) {

            if($request->pic == null) {
                $input['pic'] = $modelClass->pic;
                $input['small_pic'] =  $modelClass->small_pic;
                $input['original'] =  $modelClass->original;
            } else {

                $pic_path = $path.'/'.$custom_name. '.' . request()->file('pic')->getClientOriginalExtension();
                $img = request()->file('pic')->getRealPath();
                Image::make($img)->widen(458)->save($pic_path, 100);
                $input['pic'] = $custom_name. '.' . request()->file('pic')->getClientOriginalExtension();

                $small_pic_path = $path.'/'.$custom_name_sm. '.' . request()->file('pic')->getClientOriginalExtension();
                $small_pic = request()->file('pic')->getRealPath();
                Image::make($small_pic)->widen(80)->save($small_pic_path, 100);
                $input['small_pic'] = $custom_name_sm. '.' . request()->file('pic')->getClientOriginalExtension();

            }

        } else {

            $pic_path = $path.'/'.$custom_name. '.' . request()->file('pic')->getClientOriginalExtension();
            $img = request()->file('pic')->getRealPath();
            Image::make($img)->widen(458)->save($pic_path, 100);
            $input['pic'] = $custom_name. '.' . request()->file('pic')->getClientOriginalExtension();

            $small_pic_path = $path.'/'.$custom_name_sm. '.' . request()->file('pic')->getClientOriginalExtension();
            $small_pic = request()->file('pic')->getRealPath();
            Image::make($small_pic)->widen(80)->save($small_pic_path, 100);
            $input['small_pic'] = $custom_name_sm. '.' . request()->file('pic')->getClientOriginalExtension();


        }


        return  $input;
    }


    public function upload_images($product) {

      if($files = request()->file('slider')) {

          $max = Product_Images::max('id');
          $counter = $max + 1;

          foreach($files as $file){

              $path = public_path('product_images');

              $custom_name = 'صور_المنتج_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();
              $custom_name2 = 'صوره_مصغره_للمنتج_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();
              $custom_name_original = 'صوره_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();

              $pic_path = $path.'/'.$custom_name;
              $img = $file->getRealPath();
              Image::make($img)->widen(458)->save($pic_path, 100);

              $small_pic_path = $path.'/'.$custom_name2;
              $small_pic = $file->getRealPath();
              Image::make($small_pic)->widen(80)->save($small_pic_path, 100);

              $originalpic_path = $path.'/'.$custom_name_original;
              $original_pic = $file->getRealPath();
              Image::make($original_pic)->save($originalpic_path, 100);



            /*Insert your data*/
            Product_Images::create([
              'main_category_id' => $product->main_category_id,
              'sub_category_id' => $product->sub_category_id,
              'product_id' => $product->id,
              'slider' => $custom_name,
              'small_slider' => $custom_name2,
              'original_slider' => $custom_name_original,
            ]);
            /*Insert your data*/

            $counter = $counter + 1;

          }

      }

    }

    public function add_product_images(Request $request) {


        $request->validate([
            'product_id' => 'required',
            'slider' => 'required',
            'slider.*' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $product_id = $request->product_id;

        $product = Model::findOrFail($product_id);



        if($files = request()->file('slider')) {

            foreach($files as $file){

              $max = Product_Images::max('id');
              $counter = $max + 1;

              $path = public_path('product_images');

              $custom_name = 'صور_المنتج_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();
              $custom_name2 = 'صوره_مصغره_للمنتج_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();
              $custom_name_original = 'صوره_'.$product->url.$counter. '.' . $file->getClientOriginalExtension();


              $pic_path = $path.'/'.$custom_name;
              $img = $file->getRealPath();
              Image::make($img)->widen(458)->save($pic_path, 100);

              $small_pic_path = $path.'/'.$custom_name2;
              $small_pic = $file->getRealPath();
              Image::make($small_pic)->widen(80)->save($small_pic_path, 100);

              $originalpic_path = $path.'/'.$custom_name_original;
              $original_pic = $file->getRealPath();
              Image::make($original_pic)->save($originalpic_path, 100);


              /*Insert your data*/
              Product_Images::create([
                'main_category_id' => $product->main_category_id,
                'sub_category_id' => $product->sub_category_id,
                'product_id' => $product->id,
                'slider' => $custom_name,
                'small_slider' => $custom_name2,
                'original_slider' => $custom_name_original,
              ]);
              /*Insert your data*/

            }

        }

        return redirect()->back()->with('success','تم اضافه صور للمنتج بنجاح');

      }


    public function delete_image($id)
    {
        $Item = Product_Images::findOrFail($id);

        $oldimage = 'product_images/' . $Item->slider;
        $oldimage2 = 'product_images/' . $Item->small_slider;
        $oldimage3 = 'product_images/' . $Item->original_slider;

        if ($Item->slider != null && File::exists($oldimage)) {
            unlink($oldimage);
        }

        if ($Item->small_slider != null && File::exists($oldimage2)) {
            unlink($oldimage2);
        }

        if ($Item->original_slider != null && File::exists($oldimage3)) {
            unlink($oldimage3);
        }

        $Item->delete();
        return redirect()->back()->with('error','تم حذف الصوره بنجاح');
    }


    private function Process_Name($name) {

        $space = array(' ');
        $dash  = array("-");

        $value     = preg_replace('/[^\x{0600}-\x{06FF}a-zA-Z0-9]/u', ' ', $name);
        $url1  = str_replace($space, $dash, $value);
        $url2 = preg_replace('#-+#','-',$url1);

        if($this->isArabic($url2) == false) {
            $url2  = strtolower($url2);
        }

        $first_ch = $url2[0];
        $last_ch = substr($url2, -1);

        if($first_ch == '-') {
            $url2 = substr_replace($url2, "", 0, 1);
        }

        if($last_ch == '-') {
            $url2 = substr_replace($url2, "", strlen($url2)-1, strlen($url2));
        }

        return $url2;
    }


    private function isArabic($string) {

        if(preg_match('/\p{Arabic}/u', $string)) {
            return true;
        } else {
            return false;
        }

    }

}
