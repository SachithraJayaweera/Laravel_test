<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placingOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewIndividualOrderController extends Controller
{
    public function viewIndividualOrder($order_number){

        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        
        return view('viewIndividualOrder',['orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);
        
    }

    
    public function exportPdf($order_number){

        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
       
        $pdf = Pdf::loadView('pdf.orders',[
           'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber
        ]);

        return $pdf->download('invoice.pdf');
    }




}
