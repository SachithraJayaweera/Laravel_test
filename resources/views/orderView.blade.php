@extends('layouts.app')
@section('content')

<div class="container">
    <h1>ORDER VIEW</h1>


    <div style="margin-left:85%">
        <a href="{{ route('exportPdf', ['order_number' => 2]) }}" class="btn btn-primary" name="view_order" style="background-color: green; border: none;">Export PDF</a>
    </div>


    <form>
        <div style="margin-top: 30px;">
            <table class="table">
                
                <thead>
                    <tr>
                        <th>SELECT ORDERS</th>
                        <th>ORDER NUMBER</th>
                        <th>CUSTOMER NAME</th>
                        <th>ORDER DATE/TIME</th>
                        <th>NET AMOUNT</th>
                        <th>DETAILED VIEW</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($uniqueOrders as $po)
                    <tr>
                        <td><input class="orders" type="checkbox" name="orders" data-order-number="{{ $po['order_number'] }}"></td>
                        <td>{{ $po["order_number"] }}</td>
                        <td>{{ $po["customer_name"]}}</td>
                        <td>{{ $po["created_at"] }}</td>
                        <td>{{ $po["net_amount"] }}</td>
                        <td><a href="{{ route('viewIndividualOrder', ['order_number' => $po['order_number']]) }}" class="btn btn-primary" name="view_order" style="background-color: green; border: none;">VIEW</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>


<div id="order-details">
    <!-- This section will contain the details of the selected order -->
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {

    var selectedOrders = []; // Array to store selected order numbers

    $(".orders").on('change', function(event) {
        var orderNumber = $(this).data('order-number');

        if ($(this).is(':checked')) {
            selectedOrders.push(orderNumber);
        } else {
            var index = selectedOrders.indexOf(orderNumber);
            if (index !== -1) {
                selectedOrders.splice(index, 1);
            }
        }

        getOrderDetails(selectedOrders); // Pass array of selected order numbers
    });


    function getOrderDetails(orderNumbers) {
        $.ajax({
            url: '/getOrderDetails',
            method: "GET",
            data: {
                order_number: orderNumbers // Pass array of order numbers
            },
            // success: function(response) {
            //     var orderDetails = response.data;
            //     //var orderDetailsInside = response.data_inside
            //     var orderDetailsHTML = generateOrderDetailsHTML(orderDetails);
            //     $("#order-details").html(orderDetailsHTML);
            //     //var orderDetailsHTMLinside = generateOrderDetailsHTML(orderDetailsInside);
            //     //$("#order-details").html(orderDetailsHTMLinside);
            // },
            success: function(response) {
                var orderDetails = response.data;
                displayOrderDetails(orderDetails); // Display JSON object directly
            },
            error: function(error) {
                console.error(error);
            }
        });

    }

    function displayOrderDetails(orderDetails) {
    var jsonText = JSON.stringify(orderDetails, null, 2); // Convert object to JSON string with formatting

    // Display JSON string in a preformatted HTML element
    var html = '<pre>' + jsonText + '</pre>';
    $("#order-details").html(html);
    }


    function generateOrderDetailsHTML(orderDetails) {
        // Convert the JSON data to HTML representation
        var html = '';
        orderDetails.forEach(function(order) {
            html += '<div>';
            html += '<h4>Order Number: ' + order.order_number + '</h4>';
            html += '<p>Customer Name: ' + order.customer_name + '</p>';
            html += '<p>Customer Name: ' + order.product_name + '</p>';
            html += '<p>Customer Name: ' + order.product_name + '</p>';
            html += '<p>Customer Name: ' + order.product_name + '</p>';
            html += '<p>Created At: ' + order.created_at + '</p>';
            html += '<p>Net Amount: ' + order.net_amount + '</p>';
            // Add more details as needed
            html += '</div>';
        });

        return html;
    }
});

</script>

@endsection


