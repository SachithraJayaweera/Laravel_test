@extends('layouts.app')

@section('content')

<head>
    <!-- Other meta tags, title, and other CSS/JS files -->

    <style>
        /* Define a class to hide elements when printing */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

    <div class="container">

        <h1>PLACING ORDER VIEW</h1>

        <form>

            <div style="display: flex; flex-direction: column;">

                <div class="form-group">
                    <label for="id">Select Order ID:</label>
                    <select type="text" class="form-control" id="order_number" name="order_number" placeholder="Select">                   
                        @foreach ($uniqueOrders as $order)
                        <option data-names ="{{$order->customer_name }}" data-net ="{{$order->net_amount }}">{{ $order->order_number }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="name">Customer Name:</label>
                    <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Auto Selected">
                    {{-- <select type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Select">
                       
                        @foreach ($orders as $order)
                        <option data-names="{{$order->customer_name}}">{{ $order->customer_name }}</option>
                        @endforeach

                    </select> --}}
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
    
                        @foreach($orders as $order)

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

                <p>Net Amount:<input type="" name="totalSum" id="totalSumInput" value="0.00"></p> <br>
                <button onclick="printPage()" class="btn btn-primary no-print">Print</button>

            </div>      
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    function printPage() {
        window.print();
    }

    document.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.getElementById('order_number');
            //var input1 = document.getElementById('free_product');
    
            dropdown.addEventListener('change', function() {
                dropdown.value = dropdown.value;
            });
        });

    $(document).ready(function () {

    function calculateNetAmount() {
        var totalSum = 0.0;

        // Loop through each row in the table and sum up the amounts
        $('table tbody tr').each(function () {
            var amount = parseFloat($(this).find('td:nth-child(6)').text());
            totalSum += amount || 0;
        });

        // Update the Net Amount input field
        $('#totalSumInput').val(totalSum.toFixed(2));
    }

    calculateNetAmount();

    $('#order_number').on('change', function () {
        var selectedOrder = $(this).val();

        // Make an AJAX request to fetch filtered data
        $.ajax({
            url: '/filterData', // Replace with your route
            method: 'GET',
            data: { order_number: selectedOrder },
            success: function (response) {
                // Update table with filtered data
                updateTable(response);
            },

            error: function (error) {
                console.log(error);
            }

        });
    });


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

@endsection
