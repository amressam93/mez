<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice_Details;
use App\Models\Invoice;
use App\Models\Invoice_User;
use App\Models\Product_Sizes;

class InvoicesController extends Controller
{
     
    
    public function all_invoices()
    {
        $Item = Invoice::get();
        return view('admin.invoices.index',compact('Item'));
    }

    public function invoice_details($invoice_id)
    {
        $invoice = Invoice::findOrfail($invoice_id);
        $Item = Invoice_Details::where('invoice_id',$invoice_id)->get();
        return view('admin.invoices.invoice_details',compact('Item','invoice'));
    }

    public function print($invoice_id)
    {
        $invoice = Invoice::findOrfail($invoice_id);
        $shipping_info = Invoice_User::where('id',$invoice->shipping_id)->first();
        
        $details = Invoice_Details::where('invoice_id',$invoice->id)->get();

        return view('admin.invoices.print',compact('invoice','shipping_info','details'));
    }


    public function update_invoice_status(Request $request) {


        $invoic_id = $request->invoice_id;
        $status = $request->invoice_status;

        $invoice = Invoice::where('id',$invoic_id)->first();

        if(!$invoice) {
            abort(404);
        } else {

            if($invoice->status == 'تم الالغاء' || $invoice->status == 'تم الالغاء	(مستخدم)') {
                    
                $details = Invoice_Details::where('invoice_id',$invoice->id)->get(['quantity','product_id','size','id']);

                foreach ($details as $value) {

                    $product_size = Product_Sizes::where('product_id',$value->product_id)->where('size_id',$value->size)->first();

                    if($product_size != null) {

                        if($product_size->quantity >= $value->quantity) {
                            $product_size->update([
                                'quantity' => $product_size->quantity - $value->quantity
                            ]);
                        }
                        
                    }
                }
            }



            if($status  == 1) {
               
                $invoice->update(['status' => 'جاري المراجعه']);
                
            } elseif ($status  == 2) {

                $invoice->update(['status' => 'تم الشحن']);
                
            } elseif ($status  == 3) {

                $invoice->update(['status' => 'تم الالغاء']);

                $details = Invoice_Details::where('invoice_id',$invoice->id)->get(['quantity','product_id','size','id']);

                foreach ($details as $value) {

                    $product_size = Product_Sizes::where('product_id',$value->product_id)->where('size_id',$value->size)->first();

                    if($product_size != null) {
                        $product_size->update([
                            'quantity' => $product_size->quantity + $value->quantity
                        ]);
                    }

                }

            } else {
                abort(404);
            }

            $Item = Invoice::get();

            $html= view('admin.invoices.datatable',['Item' => $Item])->render();

            return response()->json(['msg' => 'تم تحديث الفاتورة بنجاح', 'data' => $html ]);

        }

    }

    public function delete_invoice($id) {
        
        $invoice = Invoice::findOrFail($id);

        Invoice_User::where('invoice_id',$id)->delete();

        $details = Invoice_Details::where('invoice_id',$id)->get(['quantity','product_id','size','id']);

        foreach ($details as $value) {

            $product_size = Product_Sizes::where('product_id',$value->product_id)->where('size_id',$value->size)->first();

            if($product_size != null) {
                $product_size->update([
                    'quantity' => $product_size->quantity + $value->quantity
                ]);
            }

            $value->delete();

        }

        $invoice->delete();

        return redirect()->back()->with('error','this order deleted successfully');
        
    }


    





       

    
}
