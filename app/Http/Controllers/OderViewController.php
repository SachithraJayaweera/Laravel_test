<?php

namespace App\Http\Controllers;

use App\Models\placingOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
//use setasign\Fpdi\Fpdi;
use setasign\Fpdi\Tcpdf\Fpdi;
use Barryvdh\Snappy\PdfWrapper;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;


class OderViewController extends Controller
{

    public function exportPdfMultiple($orderNumbers)
    {
        // Extract order numbers from the URL parameter
        $selectedOrders = explode(',', $orderNumbers);

        // Fetch orders based on the extracted order numbers
        $orders = placingOrder::whereIn('order_number', $selectedOrders)->get();
        // Assuming you want unique order numbers from the fetched orders
        $uniqueOrderNumber = $orders->unique('order_number');

        $allOrders =  $orders; //placingOrder::all();
        // Create a directory to store PDFs if it doesn't exist
        $pdfDirectory = storage_path('app/public/pdfs/');

        if (!file_exists($pdfDirectory)) {
            mkdir($pdfDirectory, 0755, true);
        }

        //foreach ($allOrders as $order) {


        $pdf = PDF::loadView('pdf.test', [
            'orders' => $orders,
            'uniqueOrder' => $uniqueOrderNumber,
            'allOrders' => $allOrders
        ]);

        $combinedPdfFileName = 'combined_invoices_' . time() . '.pdf';
        $combinedPdfPath = $pdfDirectory . $combinedPdfFileName;
        // Generate a unique filename for each PDF
        $pdfFileName = 'invoice_all_orders.pdf';
        $pdfPath = $pdfDirectory . $pdfFileName; // Adjust the path as needed

        // Save the PDF to a specific path
        $pdf->save($combinedPdfPath);

        // }

        // Return a response if needed
        return response()->json();
    }




    public function orderView()
    {

        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $uniqueNames = $orders->unique('customer_name');
        return view('orderView', ['orders' => $orders, 'uniqueOrders' => $uniqueOrders, 'uniqueNames'=>$uniqueNames]);
    }


    
    public function filterDataName(Request $request){
        $selectedName = $request->input('name'); 
        //$uniqueNames = $selectedName->unique('customer_name');
        // Fetch filtered data based on the selected region (use your logic here)
        $filteredData = placingOrder::where('customer_name', $selectedName)->get();
        $uniqueNames = $filteredData->unique('order_number');
        return response()->json($uniqueNames);
        }



    public function getOrderDetails(Request $request)
    {
        $orderNumbers = $request->input('order_number');
        // Fetch details for multiple orders
        $orderDetails = placingOrder::whereIn('order_number', $orderNumbers)->get();
        $uniqueOrders = $orderDetails->unique('order_number');

        $data = [];
        //$data_inside = [];

        foreach ($orderDetails as $order) {
            // Extract specific attributes for each order
            $data[] = [

                'order_number' => $order->order_number,
                'customer_name' => $order->customer_name,
                'created_at' => $order->created_at,
                'net_amount' => $order->net_amount,
                'product_name' => $order->product_name,
                'product_code' => $order->product_code,
                'price' => $order->price,
                'quantity' => $order->quantity,
                'free' => $order->free,
                'amount' => $order->amount
                // Add more attributes as needed
            ];
        }

        return response()->json(['data' => $data]);
        // return view('pdf.bulk_orders', ['data' => $data]);

    }



    public function viewIndividualOrder($order_number)
    {

        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        // $orderNumber = $request->query('order_number');
        //$orders = placingOrder::where('order_number', $order_number)->get();
        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        //dd($orders_name);
        return view('orderView', ['orders' => $orders, 'uniqueOrders' => $uniqueOrders, 'sum' => $sum, 'orderNumber' => $order_num, 'uniqueOrderNumber' => $uniqueOrderNumber]);
    }


    public function exportPdf($order_number)
    {

        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        //$orderNumber = $request->query('order_number');
        //$orders = placingOrder::where('order_number', $order_number)->get();
        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        //dd($orders_name);
        //return view('pdf.oders',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);


        $pdf = Pdf::loadView('pdf.orders', [
            'orders' => $orders, 'uniqueOrders' => $uniqueOrders, 'sum' => $sum, 'orderNumber' => $order_num, 'uniqueOrderNumber' => $uniqueOrderNumber
        ]);

        return $pdf->download('invoice.pdf');
    }
}
