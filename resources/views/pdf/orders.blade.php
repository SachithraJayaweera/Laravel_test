<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invoices PDF</title>
    </head>
    <body>
        <h1>Invoice</h1>
        <div class="container">

            <h1></h1>     
            <form>
    
                <div style="display: flex; flex-direction: row;">
                    {{-- <p>order number:{{$orderNumber}}</p> --}}       
                    <div style="display: flex; flex-direction: column;">
    
                        <div class="form-group;" style="display: flex; flex-direction: row; margin : 10px;">
                            <label for="id">Order Number : </label>
    
                            @foreach($uniqueOrderNumber as $order)
                                <p>{{ $order['order_number'] }}</p>
                            @endforeach
    
                        </div>
       
                        <div class="form-group;" style="display: flex; flex-direction: row; margin : 10px;">
                            <label for="name">Customer Name : </label>
                            @foreach($uniqueOrderNumber as $order)
                                <p>{{ $order['customer_name'] }}</p>
                            @endforeach
                        </div>
                    </div>                  
                </div>
 
                
                <div style="margin-top: 30px;">
    
                    <table class="table">
    
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Free</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
        
                        <tbody>
        
                            @foreach($orderNumber as $order)
    
                            <tr>
                                <td>{{$order["product_name"]}}</td>
                                <td>{{$order["product_code"]}}</td>
                                <td>{{$order["price"]}}</td>
                                <td>{{$order["quantity"]}}</td>
                                <td>{{$order["free"]}}</td>
                                <td>{{$order["amount"]}}</td>
                            </tr>
                            @endforeach   

                        </tbody>               
                    </table>
    
                </div>
    
                <div style="display: flex; flex-direction: column;">   
                    <p>Net Amount: {{ $order->net_amount}}.00</p> <br>        
                </div> 

            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    
        function printPage() {
            window.print();
        }
    
    
        // document.addEventListener('DOMContentLoaded', function() {
        //         var dropdown = document.getElementById('order_number');
        //         //var input1 = document.getElementById('free_product');
        
        //         dropdown.addEventListener('change', function() {
        //             dropdown.value = dropdown.value;
        //         });
        //     });
    
    
        $(document).ready(function () {
    
        function updateTable(data) {
            // Clear existing table rows
            $('tbody').empty();
    
            // Iterate through filtered data and append to table
            $.each(data, function (index, order) {
                $('tbody').append(`
                    <tr>
                        <td>${order.product_name}</td>
                        <td>${order.product_code}</td>
                        <td>${order.price}</td>
                        <td>${order.quantity}</td>
                        <td>${order.free}</td>
                        <td>${order.amount}</td>
                    </tr>
                `);
            });
        }
    
    
        $('#order_number').change(function() {
            var selected_names = $(this).find(':selected').data('names');
            var selected_net = $(this).find(':selected').data('net');
            $('#cus_name').val(selected_names);
            $('#totalSumInput').val(selected_net);
        });
    
    });
       
    </script>
    
    </body>
    
</html>