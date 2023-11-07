@extends('layouts.app')

@section('content')


<div class="container">

    <h1>You Logged in as an user</h1>
    
    <div style="display: flex; flex-direction: column; margin-right: 75%">

        <a href="{{ route('addpo') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to Add PO</a>
        <a href="{{ route('viewpo') }}" class="btn btn-primary" style="background-color: green; border: none; margin-top:20px; padding:15px">Go to View PO</a>
    
    </div>
    
</div>

@endsection
