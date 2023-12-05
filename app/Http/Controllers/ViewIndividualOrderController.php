<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placingOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewIndividualOrderController extends Controller
{
    public function viewIndividualOrder($order_number){

        $orders= placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
       // $orderNumber = $request->query('order_number');
        //$orders = placingOrder::where('order_number', $order_number)->get();
        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        //dd($uniqueOrders);

        $pdf = Pdf::loadView('pdf.orders',[
            'orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber
        ]);

        return view('viewIndividualOrder',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);
   
    }

    public function exportPdf($order_number){

        $orders= placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        //$orderNumber = $request->query('order_number');
        //$orders = placingOrder::where('order_number', $order_number)->get();
        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        //dd($orders_name); 
        //return view('pdf.oders',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);

        $pdf = Pdf::loadView('pdf.orders',[
            'orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber
        ]);

        return $pdf->download('invoice.pdf');
    }




}
