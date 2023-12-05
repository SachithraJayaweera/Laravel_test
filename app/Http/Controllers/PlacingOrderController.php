<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placingOrder;
use App\Models\AddUser;
use App\Models\AddSku;
use App\Models\DefineDiscounts;
use App\Models\defineFreeIssues;


class PlacingOrderController extends Controller
{

    public function placingOrder()
    {
        $users = AddUser::all();
        $skus = AddSku::all();
        $issues = defineFreeIssues::all();
        $discounts = DefineDiscounts::all();
        //$products = AddSku::all();
        $def_skus = defineFreeIssues::pluck('pu_product')->toArray();
        $def_discounts = DefineDiscounts::pluck('pu_product')->toArray();
        //$pos = placingOrder::all();
        $lastOrder = placingOrder::latest('order_number')->first();
        $nextOrderNumber = 1; // Default order number if no orders exist

        if ($lastOrder) {
            // If there is a last order number, increment it by 1
            $nextOrderNumber = $lastOrder->order_number + 1;
        }
        return view('placingorder',['users' => $users, 'skus'=>$skus, 'issues'=>$issues, 'nextOrderNumber'=>$nextOrderNumber, 'def_skus' => $def_skus, 'def_discounts'=>$def_discounts, 'discounts'=>$discounts]);
        
    }


    public function save(Request $request)
    {
    $tableData = $request->input('tableData');
    $decodedTableData = json_decode($tableData, true);

    // Filter the table data to keep only rows with a quantity value
    $filteredTableData = array_filter($decodedTableData, function ($row) {
        return isset($row['quantity']) && !empty($row['quantity']);
    });

    foreach ($filteredTableData as $row) {
        // Assuming you have a model named 'PlacingOrder' to represent the table data
        //if(($row['customer_name'])){
            PlacingOrder::create([
                'customer_name' => $row['customer_name'],
                'order_number' => $row['order_number'],
                'product_name' => $row['product_name'],
                'product_code' => $row['product_code'],
                'price' => $row['price'],
                'quantity' => $row['quantity'],
                'free' => $row['free'],
                'amount' => $row['amount'],
                'net_amount' => $row['net_amount'],
            ]);

           // return response()->json(['message' => 'Table data saved successfully']);
        //}else{

          //  return response()->json(['message' => 'enter the customer name first']);
       // }

    }

     return response()->json(['message' => 'Table data saved successfully']);
    }




    // public function save(Request $request)
    // {
    //     $tableData = $request->input('tableData'); // Assuming the name attribute for your table data is 'tableData'
    //     $decodedTableData = json_decode($tableData, true);

    //     //dd($decodedTableData);

    //     foreach ($decodedTableData as $row) {
    //         // Assuming you have a model named 'Order' to represent the table data

    //         placingOrder::create([
    //             'customer_name' => $row['customer_name'],
    //             'order_number' => $row['order_number'],
    //             'product_name' => $row['product_name'],
    //             'product_code' => $row['product_code'],
    //             'price' => $row['price'],
    //             'quantity' => $row['quantity'],
    //             'free' => $row['free'],
    //             'amount' => $row['amount'],
    //             'net_amount' => $row['net_amount'],
    //         ]);

    // }

    // return response()->json(['message' => 'Table data saved successfully']);
    
    // }

}
