@extends('layouts.app')

@section('content')

<div class="container">

    <h1>SKU TABLE</h1>

    <form method="POST">

        @csrf
        <div style="margin-top: 30px;">

            <table class="table">

                <thead>
                    <tr>
                        <th>SKU ID</th>
                        <th>SKU CODE</th>
                        <th>SKU NAME</th>
                        <th>MRP</th>
                        <th>DISTRIBUTOR PRICE</th>
                        <th>WEIGHT VOLUME</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($allSkus as $df)
                    <tr>
                        <td>{{ $df["skuid"] }}</td>
                        <td>{{ $df["sku_code"]}}</td>
                        <td>{{ $df["sku_name"]}}</td>
                        <td>{{ $df["mrp"] }}</td>
                        <td>{{ $df["distributor_price"] }}</td>
                        <td>{{ $df["weight_volume"] }}</td>
                        <td>{{ $df["created_at"] }}</td>
                        <td>{{ $df["updated_at"] }}</td>
                        <td>
                            <a href="{{ route('editSku', ['skuid' => $df['skuid']]) }}" class="btn btn-success">EDIT</a>
                            <a href="" class="btn btn-danger">DELETE</a>
                        </td>

                    </tr>
                    @endforeach
                    
                </tbody>

            </table>

        </div>

        {{-- <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">EDIT</button> --}}
   
     </form>


 </div>

@endsection
