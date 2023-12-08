@extends('layouts.app')
@section('content')

<div class="container">
    <h1>ORDER VIEW</h1>

    <div style="display: flex; flex-direction: row;">

        <div class="form-group">
            <label for="name">Select Customer Name:</label>
            <select type="text" class="form-control" id="name" name="name" placeholder="Select">
                <option value="" disabled selected>Select</option> <!-- Placeholder option -->
                @foreach ($uniqueNames as $order)
                <option>{{ $order->customer_name }}</option>
                @endforeach
            </select>
        </div>

    </div>


    <div style="margin-left:85%">
        <a href="" class="btn btn-primary export-pdf-btn" style="background-color: green; border: none;">Export PDF</a>
    </div>
 

    <form>
        <div style="margin-top: 30px;">
            <table class="table">
                
                <thead>
                    <tr>
                        <th><input class="select_all" type="checkbox" name="select_all"> SELECT ORDERS</th>
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

{{-- <div id="responseContainer">

</div> --}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


$(document).ready(function() {


    $('#name').on('change', function () {
        var selectedName = $(this).val();

        // Make an AJAX request to fetch filtered data
        $.ajax({
            url: '/filterDataName', // Replace with your route
            method: 'GET',
            data: { name: selectedName },
            success: function (response) {
                // Update table with filtered data
                //$('#responseContainer').text(JSON.stringify(response));
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
        $.each(data, function (index, po) {
            $('tbody').append(`
                <tr>
                    <td><input class="orders" type="checkbox" name="orders" data-order-number="{{ $po['order_number'] }}"></td>
                    <td>${po.order_number}</td>
                    <td>${po.customer_name}</td>
                    <td>${po.created_at}</td>
                    <td>${po.net_amount}</td>
                    <td><a href="{{ route('viewIndividualOrder', ['order_number' => $po['order_number']]) }}" class="btn btn-primary" name="view_order" style="background-color: green; border: none;">VIEW</a></td>
                </tr>
            `);
        });
    }





    var selectedOrders = []; // Array to store selected order numbers

    $(".select_all").on('change', function(event) {
        if($(this).is(':checked')){
            $(".orders").prop('checked', true); // Check all checkboxes
        } else {
            $(".orders").prop('checked', false); // Uncheck all checkboxes
        }
    });




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


    $(".export-pdf-btn").on('click', function(event) {
    event.preventDefault();

    var selectedOrders = [];

    $(".orders:checked").each(function() {
        selectedOrders.push($(this).data('order-number'));
    });

    if (selectedOrders.length > 0) {
        sendSelectedOrders(selectedOrders);
    } else {
        alert('Please select orders to export as PDF.');
    }

 });


 function sendSelectedOrders(selectedOrders) {
    // Combine selected order numbers into a comma-separated string

    var orderNumbers = selectedOrders.join(',');

    $.ajax({
        url: '/export-pdf-multiple/' + orderNumbers, // Adjust the URL as per your route
        method: 'GET',
        success: function(response) {
            // Handle success response if needed
            console.log(response);
            var jsonResponse = JSON.stringify(response, null, 2); // Convert JSON to string with formatting
            $('#order-details').html('<pre>' + jsonResponse + '</pre>');
            alert('pdf generated sccesfully');
        },
        error: function(error) {
            console.error(error);
            alert('Error generating PDF for Order Numbers');
            // Handle error if needed
        }
    });
 }

});

</script>

@endsection


