@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create Line Free Issue</h1>

    <form method="POST" action="{{route("definefreeissues.save")}}">

        @csrf
            <div class="form-group">
                <label for="name">Free Issue Label</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="Enter Free Issue Label">
            </div>


            <div class="form-group">
                <label for="nic">Type</label>
                <select type="text" class="form-control" id="type" name="type" placeholder="Enter territory">

                    <option value="1">Flat</option>
                    <option value="2">Multiple</option>

                </select>
                
            </div>

            <div class="form-group">
                <label for="address">Purchase Product</label>

                <select type="text" class="form-control" id="pu_product" name="pu_product" placeholder="Select">                              
                    @foreach ($skus as $sku)

                        @if(!in_array($sku->sku_name, $def_skus))
                        <option value ="{{$sku->sku_name}}" data-price="{{$sku->distributor_price }}" data-code="{{$sku->sku_code }}" data-weight_volume="{{$sku->weight_volume }}">{{ $sku->sku_name}}</option>
                        @endif

                    @endforeach
                </select>

            </div>


            <div class="form-group" style="display: none;">
                
                <label for="productCode">Product Code</label>
                <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Auto Selected">
                
                {{-- <select type="text" class="form-control" id="product_price" name="product_price" placeholder="Select">
                       
                    @foreach ($skus as $skus)
                    <option>{{ $skus->distributor_price}}</option>
                    @endforeach

                </select> --}}

            </div>



            <div class="form-group" style="display: none;">
                
                <label for="productPrice">Product price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Auto Selected">

            </div>

            <div class="form-group" style="display: none;">
                
                <label for="weight_volume">Weight Volume</label>
                <input type="text" class="form-control" id="weight_volume" name="weight_volume" placeholder="Auto Selected">

            </div>

            <div class="form-group">
                <label for="freeProduct">Free Product</label>
                <input type="text" class="form-control" id="free_product" name="free_product" placeholder="Auto Selected">
            </div>

            <div class="form-group">
                <label for="purchaseQuantity">Purchase quantity</label>
                <input type="text" class="form-control" id="pu_quantity" name="pu_quantity" placeholder="Purchase quantity">
            </div>

            <div class="form-group">
                <label for="freeQuantity">Free quantity</label>
                <input type="text" class="form-control" id="free_quantity" name="free_quantity" placeholder="Free quantity">
            </div>

            <div class="form-group">
                <label for="lowerLimit">Lower Limit</label>
                <input type="text" class="form-control" id="lower_limit" name="lower_limit" placeholder="Enter Lower Limit">
            </div>

            <div class="form-group">
                <label for="upperLimit">Upper Limit</label>
                <input type="text" class="form-control" id="upper_limit" name="upper_limit" placeholder="Enter Upper Limit">
            </div>

            <button href="{{ route('definefreeissuesview') }}" type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">ADD</button>
    </form>

    <div style="display: inline; flex-direction: row; margin-right: 75%">
        <br>
        <a href="{{ route('definefreeissuesview') }}" class="btn btn-primary" style="background-color: green; border: none;">VIEW</a> 
        {{-- <a href="{{ route('defineFreeIssuesEdit') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">EDIT</a>  --}}
    </div>
 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {

            var dropdown = document.getElementById('pu_product');
            var input1 = document.getElementById('free_product');
    
            dropdown.addEventListener('change', function() {
                input1.value = dropdown.value;
            });
        });

            $(document).ready(function() {

                $('#pu_product').change(function() {
                    var selectedPrice = $(this).find(':selected').data('price');
                    var selectedCode = $(this).find(':selected').data('code');
                    var selectedVolume = $(this).find(':selected').data('weight_volume');
                    $('#product_price').val(selectedPrice);
                    $('#product_code').val(selectedCode);
                    $('#weight_volume').val(selectedVolume);

            });

        });

    </script>

 </div>

@endsection
