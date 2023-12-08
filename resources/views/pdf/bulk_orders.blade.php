<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invoices PDF</title>
        <style>

            /* Define a CSS class for page break */
            .page-break {
                page-break-before: always;
            }

        </style>

    </head>
    

    <body>
                

        <div class="container">

            @foreach ($uniqueOrder as $index => $order)

            {{-- <div class="page-break"> --}}
            <h1>Invoice</h1>

            <form>
    
                <div style="display: flex; flex-direction: row;">

                    {{-- <p>order number:{{$orderNumber}}</p> --}}  
                         
                    <div style="display: flex; flex-direction: column;">
    
                        <div class="form-group;" style="display: flex; flex-direction: row; margin : 10px;">
                            <label for="id">Order Number : {{ $order->order_number }}</label>

                            {{-- @foreach($uniqueOrder as $order)
                                <p>{{ $order->order_number}}</p>
                            @endforeach --}}

                        </div>
    
    
                        <div class="form-group;" style="display: flex; flex-direction: row; margin : 10px;">
                            <label for="name">Customer Name : {{ $order->customer_name }}</label>

                            {{-- @foreach($uniqueOrder as $order)
                                <p>{{ $order->customer_name }}</p>
                            @endforeach --}}

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

                        @foreach($allOrders as $item)
                            @if($item->order_number === $order->order_number)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->free }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>  

                    </table>  
                </div>
    
                <div style="display: flex; flex-direction: column;">   
                    <p>Net Amount: {{ $order->net_amount}}.00</p> <br>        
                </div> 


            </form>
            
            {{-- Add a page break after each iteration except the last one --}}
            {{-- @if($index < count($uniqueOrder) - 1) --}}
                <div class="page-break"></div>
            {{-- @endif --}}
                
            @endforeach

        </div>
     
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>

    </script>


</body>
    
</html>