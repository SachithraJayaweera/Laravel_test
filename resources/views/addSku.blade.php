@extends('layouts.app')

@section('content')

<div class="container">
    <h1>ADD SKU</h1>
    <form method="POST" action="{{route("addsku.save")}}">
        @csrf
        <div class="form-group">
            <label for="zoneCode">SKU ID</label>
            <input type="number" class="form-control" id="sku_id" placeholder="Automatically" name="sku_id" readonly>
            {{-- <select class="form-control" id="skuid" name="skuid">
                <option>Automatically</option>
            </select> --}}
        </div>

        <div class="form-group">
            <label for="sku_code">SKU Code</label>
            <input type="text" class="form-control" id="sku_code" name="sku_code" required>
        </div>
        <div class="form-group">
            <label for="sku_name">SKU Name</label>
            <input type="text" class="form-control" id="sku_name" name="sku_name" placeholder="Main Product Name /auto" required>
        </div>
        <div class="form-group">
            <label for="mrp">MRP</label>
            <input type="number" class="form-control" id="mrp" name="mrp" required>
        </div>
        <div class="form-group">
            <label for="distributor_price">Distributor Price</label>
            <input type="number" class="form-control" id="distributor_price" name="distributor_price" required>
        </div>
        <div class="form-group">
            <label for="weight_volume">Weight/Volume</label>
            <input type="number" class="form-control" id="weight_volume" name="weight_volume" required>
            {{-- <select class="form-control" id="weight_volume" name="weight_volume">
                <option value="kg">Kilograms</option>
                <option value="g">Grams</option>
                <option value="l">Liters</option>
                <option value="ml">Milliliters</option>
            </select> --}}
        </div>
        <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">Save</button>
    </form>
      
 </div>

@endsection
