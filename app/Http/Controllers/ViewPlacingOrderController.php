<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placingOrder;

class ViewPlacingOrderController extends Controller
{
    public function viewPlacingOrder(){

        // $order_number = placingOrder::select('order_number')->get();
        // $customer_name= placingOrder::select('customer_name')->get();
        // $product_name = placingOrder::select('product_name')->get();
        // $product_code = placingOrder::select('product_code')->get();
        // $price = placingOrder::select('price')->get();
        // $quantity = placingOrder::select('quantity')->get();
        // $free = placingOrder::select('free')->get();
        // $amount = placingOrder::select('amount')->get();

        $orders= placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        
        //dd($orders_name);
        return view('viewPlacingOrder',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum ]);
   
    }

    public function filterData(Request $request){
        $selectedOrder = $request->input('order_number'); 
        // Fetch filtered data based on the selected region (use your logic here)
        $filteredData = placingOrder::where('order_number', $selectedOrder)->get();
        return response()->json($filteredData);

        }

}
