<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin_Notifications;
use App\Models\Product;
use App\Models\Review;
use App\Models\Review_Comments;
use App\Models\Salaons;
use App\Models\User_Notifications;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{


    public function add_review(Request $request) {

        $request->validate([
            'product_id' => 'required|numeric',
            'rate' => 'required|numeric|min:1|max:5'
        ]);

        $Item = Product::findOrFail($request->product_id);

        $user_id = Auth::guard('user')->user()->id;

        Review::create([
            'user_id' => $user_id,
            'user_type' => 'user',
            'product_id' => $request->product_id,
            'rate' => $request->rate,
            'notes' => $request->notes,
            'viewed' => 0 // not seen
        ]);

        //return redirect($Item->url."#reviews")->with('success','تم أضافه تقيمك بنجاح');
        return redirect($Item->url."#reviews");


    }


    public function edit_review(Request $request) {

        $request->validate([
            'hidden' => 'required|numeric',
            'rate' => 'required|numeric|min:1|max:5',
        ]);

        $user_id = Auth::guard('user')->user()->id;

        $raw = Review::where('user_id',$user_id)->where('id',$request->hidden)->firstOrFail();

        $Item = Product::findOrFail($raw->product_id);

        $raw->update([
            'rate' => $request->rate,
            'notes' => $request->notes,
        ]);

        $all_reviews = Review::where('product_id',$Item->id)->get();

        $reviews_count = Review::where('product_id',$Item->id)->count();
        $reviews_sum = Review::where('product_id',$Item->id)->sum('rate');

        $html = view('user.includes.reviews',[
            'Item' => $Item,
            'all_reviews' => $all_reviews,
            'reviews_count' => $reviews_count,
            'reviews_sum' => $reviews_sum,
        ])->render();
        
        
        $calc_rev = 0;

        if($reviews_count != 0 ) {
            $calc_rev = $reviews_sum / $reviews_count;
            $calc_rev = round($calc_rev);
        }
        
        $html2 = view('user.includes.calc-review',[
            'calc_rev' => $calc_rev,
        ])->render();


        return response()->json([
            'data' => $html,
            'data2' => $html2,
            'check_validate' => true,
        ]);


    }


    public function add_reply(Request $request) {

        $service = Product::findOrFail($request->product_id);
        $review = Review::findOrFail($request->review_id);

        $user = Auth::guard('user')->user();

        Review_Comments::create([
            'product_id' => $request->product_id,
            'review_id' => $request->review_id,
            'comment' => $request->comment,
            'user_id' => $user->id,
            'user_type' => 'user'
        ]);


        $Item = Product::where('id',$request->product_id)->first();

        $all_reviews = Review::where('product_id',$Item->id)->get();

        $reviews_count = Review::where('product_id',$Item->id)->count();
        $reviews_sum = Review::where('product_id',$Item->id)->sum('rate');


        $html = view('user.includes.reviews',[
            'Item' => $Item,
            'all_reviews' => $all_reviews,
            'reviews_count' => $reviews_count,
            'reviews_sum' => $reviews_sum,
        ])->render();

        return response()->json([
            'data' => $html,
        ]);
    }









}
