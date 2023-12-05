@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create Line Free Issue View</h1>

    <form method="POST">

        @csrf
        <div style="margin-top: 30px;">

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>LABEL</th>
                        <th>TYPE</th>
                        <th>PURCHASE PRODUCT</th>
                        <th>FREE PRODUCT</th>
                        <th>PURCHASE QUANTITY</th>
                        <th>FREE QUANTITY</th>
                        <th>LOWER LIMIT</th>
                        <th>UPPER LIMIT </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($dfIssuse as $df)
                    <tr>
                        <td>{{ $df["id"] }}</td>
                        <td>{{ $df["label"]}}</td>
                        <td>{{ $df["type"] }}</td>
                        <td>{{ $df["pu_product"] }}</td>
                        <td>{{ $df["free_product"] }}</td>
                        <td>{{ $df["pu_quantity"] }}</td>
                        <td>{{ $df["free_quantity"] }}</td>
                        <td>{{ $df["lower_limit"] }}</td>
                        <td>{{ $df["upper_limit"] }}</td>

                    </tr>
                    @endforeach
                    
                </tbody>

            </table>

        </div>

        {{-- <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">EDIT</button> --}}
   
     </form>


 </div>

@endsection
