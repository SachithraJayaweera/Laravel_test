@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Placing Order</h1>

    <form method="POST" action="{{route("placingorder.save")}}">

        @csrf
        <div style="display: flex; flex-direction: row;">
            <div>
                <div class="form-group">
                    <label for="customer_name">Customer Name:</label>

                    <select type="text" class="form-control" id="customer_no" name="customer_no" placeholder="Select">
                        
                        @foreach ($users as $user)
                        <option>{{ $user->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="order_no">Order number</label>
                    <input type="text" id="order_no" value="{{ $nextOrderNumber }}" name="order_no" class="form-control" id="order_no" placeholder="Automatically" readonly>

                </div>

            </div>
        </div>


        <div style="margin-top: 40px;">

            <table class="table" id="orderTable">

                <thead>
                    <tr>
                        {{-- style="display: none;" --}}
                        <th style="display: none;">Customer Name</th>
                        <th style="display: none;">order Number</th>
                        <th>Product Name</th>
                        <th style="display: none;">freeQty</th>
                        <th style="display: none;">Type</th>
                        <th style="display: none;">Ratio</th>
                        <th style="display: none;">Lower Limit</th>
                        <th style="display: none;">Upper Limit</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Free</th>
                        <th>Amount</th>
                        <th>With Discount</th>
                        <th style="display: none;">Net Amount</th>
                    </tr>
                </thead>


                <tbody>

                @foreach($issues as $issue)

                <tr>
                    <td name="customer_name" style="display: none;"></td>
                    <td name="order_number" style="display: none;">{{ $nextOrderNumber }}</td>
                    <td name="product_name">{{ $issue->pu_product }}</td>
                    <td style="display: none;">{{ $issue->free_quantity }}</td>
                    <td style="display: none;">{{ $issue->type }}</td>
                    <td style="display: none;">{{ $issue->ratio }}</td>
                    <td style="display: none;">{{ $issue->lower_limit }}</td>
                    <td style="display: none;">{{ $issue->upper_limit }}</td>
                    <td name="product_code">{{ $issue->product_code }}</td>
                    <td name="price">{{ $issue->product_price }}</td>

                    <td name="quantity">
                        <input type="number" class="quantity" name="enter-qty" placeholder="min:{{ $issue->lower_limit }} max:{{ $issue->upper_limit }}" data-price="{{ $issue->product_price }}" data-ratio="{{ $issue->ratio }}" data-product-id="{{ $issue->id }}"
                         data-type="{{ $issue->type }}" data-free_quantity="{{ $issue->free_quantity }}" data-lower_limit="{{ $issue->lower_limit }}" data-upper_limit="{{ $issue->upper_limit }}">
                    </td>

                    <td name="free" class="units" data-product-id="{{ $issue->id }}">0</td>
                    <td name="amount" class="total" data-product-id="{{ $issue->id }}">0</td>
                    <td name="total_amount" class="total_amount" data-product-id="{{ $issue->id }}">0</td>
                    <td name="net_amount" style="display: none;"></td>
                </tr>
                @endforeach 


                @foreach($skus as $issue)

                @if(!in_array($issue->sku_name, array_merge($def_skus, $def_discounts)))
                {{-- <option value = "{{$sku->sku_name}}" data-price="{{$sku->distributor_price }}" data-code="{{$sku->sku_code }}">{{ $sku->sku_name}}</option> --}}
                <tr>
                    <td name="customer_name" style="display: none;"></td>
                    <td name="order_number" style="display: none;">{{ $nextOrderNumber }}</td>
                    <td name="product_name">{{ $issue->sku_name }}</td>
                    <td style="display: none;">{{ $issue->free_quantity }}</td>
                    <td style="display: none;">{{ $issue->type }}</td>
                    <td style="display: none;">{{ $issue->ratio }}</td>
                    <td style="display: none;">{{ $issue->lower_limit }}</td>
                    <td style="display: none;">{{ $issue->upper_limit }}</td>
                    <td name="product_code">{{ $issue->sku_code }}</td>
                    <td name="price">{{ $issue->distributor_price }}</td>

                    <td name="quantity">
                        <input type="number" class="quantity" name="enter-qty" placeholder="No free Issues& Discounts" data-price="{{ $issue->distributor_price }}" data-product-id="{{ $issue->skuid }}"
                        >
                    </td>

                    <td name="free" class="units" data-product-id="{{ $issue->id }}">0</td>
                    <td name="amount" class="total" data-product-id="{{ $issue->id }}">0</td>
                    <td name="total_amount" class="total_amount" data-product-id="{{ $issue->id }}">0</td>
                    <td name="net_amount" style="display: none;"></td>

                </tr>
                @endif

                @endforeach 


                @foreach($discounts as $issue)

                <tr>
                    <td name="customer_name" style="display: none;"></td>
                    <td name="order_number" style="display: none;">{{ $nextOrderNumber }}</td>
                    <td name="product_name">{{ $issue->pu_product }}</td>
                    <td style="display: none;">{{ $issue->free_quantity }}</td>
                    <td style="display: none;">{{ $issue->type }}</td>
                    <td style="display: none;">{{ $issue->ratio }}</td>
                    <td style="display: none;">{{ $issue->lower_limit }}</td>
                    <td style="display: none;">{{ $issue->upper_limit }}</td>
                    <td name="product_code">{{ $issue->product_code }}</td>
                    <td name="price">{{ $issue->product_price }}</td>

                    <td name="quantity">
                        <input type="number" class="quantity" name="enter-qty" placeholder="discount {{ $issue->discount}}% > {{ $issue->pu_quantity}}"
                         data-price="{{ $issue->product_price }}" data-ratio="{{ $issue->ratio }}" data-product-id="{{ $issue->id }}"
                         data-dis_level="{{ $issue->pu_quantity }}">
                    </td>

                    <td name="free" class="units" data-product-id="{{ $issue->id }}">0</td>
                    <td name="amount" class="total" data-product-id="{{ $issue->id }}">0</td>
                    <td name="total_amount" class="total_amount" data-product-id="{{ $issue->id }}">0</td>
                    <td name="net_amount" style="display: none;"></td>
                </tr>
                @endforeach 


                </tbody>

            </table>

            <input type="hidden" name="tableData" id="tableDataInput">          
            <p>Net Amount:<input type="" name="totalSum" id="totalSumInput" value="0.00"></p> <br>

            <button id="submitBtn" type="submit" class="btn btn-primary" style="background-color: green; border: none;">SAVE</button><br><br>
            
            <a href="{{ route('orderView') }}" class="btn btn-primary" style="background-color: green; border: none;">VIEW</a> 
          
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#customer_no').change(function () {
            var selectedCustomer = $(this).val();
            var selectedCustomerName = $(this).find('option:selected').text();
            
            // Loop through each row in the table and update the first two columns
            $('#orderTable tbody tr').each(function () {
                $(this).find('td:first').text(selectedCustomerName); // Update Customer Name column
                //$(this).find('td:eq(1)').text(selectedCustomer); // Update Order Number column (assuming it's the second column)
            });
        });
    });


$(document).ready(function () {

    $('#submitBtn').click(function () {
        var dataArray = [];

        $('#orderTable tbody tr').each(function () {
            var row = {};
            $(this).find('td').each(function () {
                var columnName = $(this).attr('name');
                var columnValues;

                // Check if the td contains an input field
                var $input = $(this).find('input');
                if ($input.length > 0) {
                    columnValue = $input.val().trim();
                } else {
                    columnValue = $(this).text().trim();
                }

                row[columnName] = columnValue;
            });

            dataArray.push(row);
        });

        // Update the hidden input field with the table data
        $('#tableDataInput').val(JSON.stringify(dataArray));

        // Now, submit the form
        $('form').submit();

    });
});


    $(document).ready(function () {

        // Function to update total sum and net_amount column
    function updateTotalSum() {
    var totalSum = 0.00;

        // Calculate the total sum of amounts in the table
        $(".total_amount").each(function () {
            totalSum += parseFloat($(this).text()) || 0;
        });

        // Update the total sum displayed in the input field
        $("#totalSumInput").val(totalSum.toFixed(2));

        // Update the 'net_amount' column for each row
        $("td[name='net_amount']").text(totalSum.toFixed(2));
    }


    updateTotalSum();




    // Select all quantity input elements with the class "quantity"
    $(".quantity").on("input", function () {


        var $row = $(this).closest("tr");
        var free_quantity = parseInt($(this).data('free_quantity'));
        var type = parseInt($(this).data('type'));
        var price = parseFloat($(this).data('price'));
        var ratio = parseFloat($(this).data('ratio'));
        var lower_limit = parseInt($(this).data('lower_limit'));
        var upper_limit = parseInt($(this).data('upper_limit'));
        var discount_level = parseFloat($(this).data('dis_level'));
        var quantity = parseFloat($(this).val()) || 0; // Fetch value from input field

        if (!isNaN(quantity) && !isNaN(price)) {

            var amount = quantity * price;
            $row.find(".total").text(amount.toFixed(2));
            //$row.find(".total_amount").text(amount.toFixed(2));
            
                if(quantity>=discount_level){
                    var disc_amount = ratio * amount;
                    var disc_price = amount - disc_amount;
                    $row.find(".total_amount").text(disc_price.toFixed(2));
                }else{
                    $row.find(".total_amount").text(amount.toFixed(2));

                }


                if (type == 2) {
                    var free = quantity * ratio;
                    var freeInt = parseInt(free);
                    $row.find(".units").text(freeInt.toFixed(2));

                    if (quantity < lower_limit) {
                        $row.find(".units").text(0);

                    } else if (quantity > lower_limit > upper_limit) {
                        var free = quantity * ratio;
                        var freeInt = parseInt(free);
                        $row.find(".units").text(freeInt.toFixed(2));

                    } else if(quantity > upper_limit) {
                        var free_max = upper_limit * ratio;
                        var freeInt_max = parseInt(free_max);
                        $row.find(".units").text(freeInt_max);
                    }

                } else if (type == 1) {
                    var free = free_quantity;
                    $row.find(".units").text(free.toFixed(2));
                }

            var totalSum = 0.00;

            $(".total").each(function () {
                totalSum += parseFloat($(this).text()) || 0;
            });

            updateTotalSum();

        }
    });

});

</script>

@endsection
