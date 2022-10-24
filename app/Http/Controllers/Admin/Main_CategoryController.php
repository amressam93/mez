<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Requests\Main_Category as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Ads_Categories;
use App\Models\Footer_Categories;
use App\Models\Product;
use App\Models\Main_Category as Model;
use App\Models\Slider_Categories;
use App\Models\Top_Offer_Categories;

class Main_CategoryController extends Controller
{

    private $view = 'admin.main_categories.';
    private $redirect = 'admin_panel/main_categories';

    public function update_order(Request $request) {

        $Item = Model::where('id',$request->id)->first();

        if($Item != null && $request->order >= 0) {

            $Item->update(['order' => $request->order]);

            return response()->json([
                'data' => $request->order,
            ]);
        } else {
            abort('404');
        }
    }


    public function un_active($id) {

        $Item = Model::findOrFail($id);

        $Item->update([ 'status' => 0 ]);

        return redirect($this->redirect)->with('error','تم  الغاء تفعيل القسم الرئيسي بنجاح');

    }

    public function active($id) {

        $Item = Model::findOrFail($id);

        $Item->update([ 'status' => 1 ]);

        return redirect($this->redirect)->with('success','تم  تفعيل القسم الرئيسي بنجاح');

    }

    /*
    public function products($category_id)
    {
        $Item = Product::where('category_id',$category_id)->get(['s_no','title','category_id','id','pic']);
        return view('admin.products.index',compact('Item'));
    }
    */

    public function index()
    {
        $Item = Model::orderBy('order','asc')->get(['title','id','pic','status','order']);
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
        $url = $this->Process_Name($request->url);

        $urlExistMainCategory = Model::where('url', $url)->first();
        $urlExistSubCategory  = Sub_Category::where('url',$url)->first();
        $urlExistProducts     = Product::where('url',$url)->first();


        if($urlExistMainCategory or $urlExistSubCategory or $urlExistProducts)
        {
            return redirect()->back()->with('error', 'هذا اللينك  لا يجب ان يحتوي علي قيم موجوده مسبقا')->withInput();
        }


        Model::create($this->gteInput($request,null));
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

        $replace_url_dash = $this->inverse_Process_Name($Item->url);    // return url without dash

        return view($this->view . 'edit', [ 'Item' => $Item ,'replace_url_dash' => $replace_url_dash]);
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
        $Item = Model::findOrFail($id);

        $url = $this->Process_Name($request->url);

        $urlExistMainCategory = Model::where('url', $url)->where('id','!=',$id)->first();
        $urlExistSubCategory  = Sub_Category::where('url',$url)->first();
        $urlExistProducts     = Product::where('url',$url)->first();


        if($urlExistMainCategory or $urlExistSubCategory or $urlExistProducts)
        {
            return redirect()->back()->with('error', 'هذا اللينك  لا يجب ان يحتوي علي قيم موجوده مسبقا')->withInput();
        }

        $Item->update($this->gteInput($request,$Item));
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
        $Item->sub_categories->each->delete();
        $Item->products->each->delete();
        Ads_Categories::where('category_id',$id)->delete();
        Slider_Categories::where('category_id',$id)->delete();
        Footer_Categories::where('category_id',$id)->delete();
        Top_Offer_Categories::where('category_id',$id)->delete();
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only(['title']);

        $url = $this->Process_Name($request->url);

        $custom_name = $url;

        $path = public_path('main_categories_images');

        $input['pic'] =  upload()->UploadImage('pic',$path,$modelClass,$custom_name,null,null);

        $input['url'] = $url;

        $counter = Model::max('id') + 1;

        if(! isset($modelClass)) {
            $input['order'] = $counter;
        } else {
            $input['order'] = $modelClass->order;
        }

        return  $input;
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



    private function inverse_Process_Name($name)
    {
        $space = array('-');
        $dash  = array(" ");

        $value     = preg_replace('/[^\x{0600}-\x{06FF}a-zA-Z0-9]/u', ' ', $name);
        $url1  = str_replace($space, $dash, $value);
        $url2  = preg_replace('#-+#',' ',$url1);

        if($this->isArabic($url2) == false) {
            $url2  = strtolower($url2);
        }

        $first_ch = $url2[0];
        $last_ch = substr($url2, -1);

        if($first_ch == ' ') {
            $url2 = substr_replace($url2, "-", 0, 1);
        }

        if($last_ch == ' ') {
            $url2 = substr_replace($url2, "-", strlen($url2)-1, strlen($url2));
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
