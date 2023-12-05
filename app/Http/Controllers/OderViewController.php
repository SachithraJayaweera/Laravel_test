<?php

namespace App\Http\Controllers;
use App\Models\placingOrder;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;

class OderViewController extends Controller
{
    public function orderView()
    {
        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        
        return view('orderView', ['orders' => $orders, 'uniqueOrders' => $uniqueOrders]);

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
        //return view('orderView', ['data' => $data]);
    }


    public function viewIndividualOrder($order_number){

        $orders= placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
       // $orderNumber = $request->query('order_number');
        //$orders = placingOrder::where('order_number', $order_number)->get();
        $order_num = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $order_num->unique('order_number');
        //dd($orders_name);
        return view('orderView',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);
   
    }


    public function exportPdf($order_number)
    {
        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        $orderDetails = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $orderDetails->unique('order_number');

        // Initialize an array to hold paths of generated PDFs
        $pdfPaths = [];

        foreach ($orderDetails as $order) {
            $pdf = PDF::loadView('pdf.bulk_orders_single', [
                'order' => $order // Pass individual order data to the view
            ]);

            // Generate a unique filename for each PDF
            $pdfFileName = 'invoice_' . $order->order_number . '.pdf';
            $pdfPath = storage_path('app/public/' . $pdfFileName); // Adjust the path as needed

            // Save the PDF to a specific path
            $pdf->save($pdfPath);

            // Add the path to the generated PDF to the array
            $pdfPaths[] = $pdfPath;
        }

        // Zip the generated PDFs into a single downloadable file
        $zipFileName = 'invoices.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName); // Adjust the path as needed

        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($pdfPaths as $pdfPath) {
                $pdfFileName = basename($pdfPath);
                $zip->addFile($pdfPath, $pdfFileName);
            }
            $zip->close();
        }

        // Return the zip file for download
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    
    // public function exportPdf($order_number){

    //     $orders= placingOrder::all();
    //     $uniqueOrders = $orders->unique('order_number');
    //     $sum = placingOrder::sum('amount');
    //     //$orderNumber = $request->query('order_number');
    //     //$orders = placingOrder::where('order_number', $order_number)->get();
    //     $order_num = placingOrder::where('order_number', $order_number)->get();
    //     $uniqueOrderNumber = $order_num->unique('order_number');
    //     //dd($orders_name);
    //     //return view('pdf.oders',['orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber]);


        
    //     $pdf = Pdf::loadView('pdf.bulk_orders',[
    //         'orders'=> $orders, 'uniqueOrders'=>$uniqueOrders, 'sum'=>$sum, 'orderNumber'=>$order_num, 'uniqueOrderNumber'=>$uniqueOrderNumber
    //     ]);

    //     return $pdf->download('invoice.pdf');
    // }




    
}



class OderViewController extends Controller
{
    // ... (other methods)

    public function exportPdf($order_number)
    {
        $orders = placingOrder::all();
        $uniqueOrders = $orders->unique('order_number');
        $sum = placingOrder::sum('amount');
        $orderDetails = placingOrder::where('order_number', $order_number)->get();
        $uniqueOrderNumber = $orderDetails->unique('order_number');

        // Create a directory to store PDFs if it doesn't exist
        $pdfDirectory = storage_path('app/public/pdfs/');
        if (!file_exists($pdfDirectory)) {
            mkdir($pdfDirectory, 0755, true);
        }

        foreach ($orderDetails as $order) {
            $pdf = PDF::loadView('pdf.bulk_orders_single', [
                'order' => $order // Pass individual order data to the view
            ]);

            // Generate a unique filename for each PDF
            $pdfFileName = 'invoice_' . $order->order_number . '.pdf';
            $pdfPath = $pdfDirectory . $pdfFileName; // Adjust the path as needed

            // Save the PDF to a specific path
            $pdf->save($pdfPath);
        }

        // Provide a response or redirect to the directory where PDFs are saved
        return 'PDFs generated and saved in the directory: ' . $pdfDirectory;
        // or return redirect('/pdfs'); // Redirect to a route that lists the saved PDFs
    }
}
