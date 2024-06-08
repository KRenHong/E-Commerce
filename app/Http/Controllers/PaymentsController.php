<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\order;
// use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PaymentsController extends Controller
{
   //
   public function __construct()
   {
      $this->middleware("auth");
   }

   public function checkout(Request $request){

    //  return $request->amount;

      return view("payments.checkout")->with([
         'amount'=>$request->amount,
      ]);
   }

   public function charge(Request $request){
     // dd($request->stripeToken);

      $charge=Stripe::charges()->create([
         "currency"=> 'USD',
         "source" => $request->stripeToken,
         "amount"  =>(double)($request->amount/9.13), // Convert to dollar
         "description"=>'test from laravel new app'
      ]);

      $chargeId = $charge['id'];
      
      if($chargeId){
         // Add order in table Order
         foreach(\Cart::getContent() as $item){
            order::create([
            "user_id"=>auth()->user()->id,
            "product_name"=>$item->name,
            "qte"=>$item->quantity,
            "price"=>$item->price,
            "total"=>$item->price * $item->quantity,
            "paid"=>1 ,
         ]);

         /* Update product quantity */
         DB::update("update items set Qte=Qte-? where id=?",[$item->quantity,$item->id]);

         // Clear cart
         \Cart::Clear();
         }

         return redirect()->route("home")->withSuccess("Payment was done, thank you");

      }else{
         return redirect()->back()->withErrors("There's a payment problem!");
      }
   }
}