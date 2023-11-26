@extends('layouts.app')

@section('content')

<div class="container">
    <h1>ADD ZONE</h1>
    <form method="POST" action="{{route("addzone.save")}}">
        @csrf
        <div class="form-group">
            <label for="zoneCode">Zone Code</label>
            
            <select class="form-control" id="zoneCode">
                <option>Automatically</option>
            </select>
        </div>

        <div class="form-group">
            <label for="zoneLongDescription">Zone Long Description</label>
            <input type="text" class="form-control" name="zone_long_description" placeholder="Ex. ZONE 1">
        </div>

        <div class="form-group">
            <label for="shortDescription">Short Description</label>
            <input type="text" class="form-control" name="short_description" placeholder="Ex. Z01">
        </div>

        <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">Save</button>
    </form>

</div>

@endsection
