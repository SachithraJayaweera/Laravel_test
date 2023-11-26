@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>ADD INDIVIDUAL PURCHASE ORDER</h1>
        
        <form method="POST" action="{{route("addpo.save")}}">
            @csrf
            <div style="display: flex; flex-direction: row;">

                <div>
                    <div class="form-group">
                        <label for="Zone">Zone:</label>
                        <select type="text" class="form-control" id="zone" name="zone" placeholder="Select">
                            @foreach ($zones as $zones)
                            <option>{{ $zones->id }}</option>
                            @endforeach
                            
                            {{-- <option value="1">zone1</option>
                            <option value="2">zone2</option> --}}
        
                        </select>
    
                    </div>
        
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control" id="date" placeholder="Automatically" >
                    </div>
                </div>
    
                <div style="margin-left: 40px;">
                    <div class="form-group">
                        <label for="region">Region:</label>
                        <select type="text" class="form-control" id="region" name="region" placeholder="Select">
                            @foreach ($regions as $regions)
                            <option>{{ $regions->region_name }}</option>
                            @endforeach
        
                            {{-- <option value="1">region1</option>
                            <option value="2">region2</option> --}}
        
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="po-no">PO No:</label>
                        {{-- <input type="number" name="po_no" class="form-control" id="po_no" placeholder="Automatically"> --}}
                        <select class="form-control" id="po_no" name="po_no">
                            <option>Automatically</option>
                        </select>
                    </div>
    
                </div>
    
                <div style="margin-left: 40px;">
                    <div class="form-group">
                        <label for="po-territory">Territory:</label>
                        <select type="text" class="form-control" id="po_territory" name="po_territory" placeholder="Select">
                            
                            @foreach ($territory as $territory)
                            <option>{{ $territory->territory_name}}</option>
                            @endforeach
                            
                            {{-- <option value="1">Territory1</option>
                            <option value="2">Territory2</option> --}}
        
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="po-no">Remark:</label>
                        <input type="text" name="remark" class="form-control" id="remark" placeholder="type">
                    </div>
                    
                </div>

                <div style="margin-left: 40px;">
                    <div class="form-group">
                        <label for="distributor">Distributor:</label>

                        <select type="text" class="form-control" id="distributor" name="distributor" placeholder="Select">
                            
                            @foreach ($user as $user)
                            <option>{{ $user->name}}</option>
                            @endforeach

                            {{-- <option value="1">Distributor1</option>
                            <option value="2">Distributor2</option> --}}

                        </select>

                    </div>
                </div>
            </div>
            
            <div style="margin-top: 40px;">
                <table class="table" id="orderTable">
                    <thead>
                        <tr>
                            <th>SKU CODE</th>
                            <th>SKU NAME</th>
                            <th>UNIT PRICE</th>
                            <th>AVB QTY</th>
                            <th>ENTER Qty</th>
                            <th>UNITS</th>
                            <th>TOTAL PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        {{-- @php dd($item["skuid"]) @endphp --}}
                        <tr>
                            <td>{{ $item["sku_code"] }}</td>
                            <td>{{ $item["sku_name"]}}</td>
                            <td>{{ $item["distributor_price"] }}</td>
                            <td>{{ $item["weight_volume"] }}</td>
                            <td> <input type="number" class="quantity" name="enter-qty" data-product-id="{{ $item["skuid"] }}"  data-price={{ $item["distributor_price"] }}></td>
                            <td type="number" class="units"  name="units" data-product-id="{{ $item["skuid"] }}">0</td>
                            <td class="total" data-product-id="{{$item["skuid"] }}">0</td>
                        </tr>
                        @endforeach

                    </tbody>
                   
                </table>
                
                <!-- Include jQuery -->
                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                
                    {{-- <script>

                        $(document).ready(function() {
                        // Select all quantity input elements with the class "quantity"
                        $(".quantity").on("input", function() {
                        var $row = $(this).closest("tr");
                        var price = parseFloat($(this).data('price'));
                        var quantity = parseFloat($(this).val()) || 0;
                        var total = parseInt(price) * parseInt(quantity);
        
                        // Update the "Units" and "Total Price" cells in the same row
                        $row.find(".units").text(quantity);
                        $row.find(".total").text(total);
                        console.log(price);

                        // Calculate the total sum
                        var totalSum = 0.00;
                        $(".total").each(function() {
                            totalSum += parseFloat($(this).text()) || 0;
                        });

                        // Display the total sum
                        var totalSumElement = document.getElementById("totalSum");
                        totalSumElement.textContent = totalSum.toFixed(2); // Format the total with 2 decimal places
                        });

                    });

                </script> 
                <p>Total Amount: <span id="totalSum" name="totalSum">0.00</span></p> --}}

                <input type="hidden" name="totalSum" id="totalSumInput" value="0.00">

                <script>
                    $(document).ready(function() {
                        // Select all quantity input elements with the class "quantity"
                        $(".quantity").on("input", function() {
                            var $row = $(this).closest("tr");
                            var price = parseFloat($(this).data('price'));
                            var quantity = parseFloat($(this).val()) || 0;
                            var total = price * quantity;
                
                            // Update the "Units" and "Total Price" cells in the same row
                            $row.find(".units").text(quantity);
                            $row.find(".total").text(total);
                
                            // Calculate the total sum
                            var totalSum = 0.00;
                            $(".total").each(function() {
                                totalSum += parseFloat($(this).text()) || 0;
                            });
                
                            // Update the hidden input field with the total sum
                            $("#totalSumInput").val(totalSum.toFixed(2)); // Format the total with 2 decimal places
                        });
                    });
                </script>
                
                <button type="submit" class="btn btn-primary" style="background-color: green; border: none;">ADD PO</button>

            </div>
        </form>
    </div>

@endsection