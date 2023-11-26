@extends('layouts.app')

@section('content')

<div class="container">
<h1>ADD REGION</h1>
<!-- resources/views/regions/add.blade.php -->
<form method="POST" action="{{route("region.save")}}">
    @csrf
    <div class="form-group">
        <label for="zone">Zone</label>
        <select class="form-control" id="zone" name="zone">
            @foreach ($zones as $zones)
            <option>{{ $zones->id}}</option>
            @endforeach
            {{-- <option value="1">Zone 1</option>
            <option value="2">Zone 2</option>
            <option value="3">Zone 3</option> --}}
        </select>

    </div>

    <div class="form-group">

        <label for="regionCode">Region Code</label>
        <select class="form-control" id="region_code" name="region_code">
            <option>Automatically</option>
        </select>

    </div>

    <div class="form-group">
        <label for="region_name">Region Name</label>
        <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Ex. REGION1">
    </div>

    
    <button type="submit" class="btn btn-primary" style="background-color: green; border: none; margin-top:10px;">SAVE</button>

</form>
</div>

@endsection
