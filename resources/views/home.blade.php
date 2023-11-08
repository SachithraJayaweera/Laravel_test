@extends('layouts.app')

@section('content')


<div class="container">

    <h1>You Logged in as an admin</h1>
    <div style="display: flex; flex-direction: column; margin-right: 75%">
        <a href="{{ route('addzone') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to AddZone</a>
        <a href="{{ route('region') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to Region</a>
        <a href="{{ route('territory') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to Terrytory</a>
        <a href="{{ route('adduser') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to AddUser</a>
        <a href="{{ route('addsku') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to AddSKU</a>
        {{-- <a href="{{ route('addpo') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to Add PO</a> --}}
        <a href="{{ route('viewpo') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to View PO</a>
            
    </div>
    
</div>

@endsection
