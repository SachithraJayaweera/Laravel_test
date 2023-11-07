@extends('layouts.app')

@section('content')

<div class="container">
    <h1>ADD TERRITORY</h1>
<form method="POST" action="{{route("territory.save")}}">
    @csrf
    <div class="form-group">
      <label for="zone">Zone</label>
      <select class="form-control" id="zone" name="zone">
        @foreach ($zones as $zones)
        <option>{{ $zones->id}}</option>
        @endforeach
        {{-- <option>zone 1</option>
        <option>zone 2</option>
        <option>zone 3</option> --}}
      </select>
    </div>
    <div class="form-group">
      <label for="region">Region</label>
      <select class="form-control" id="region" name="region">
        @foreach ($regions as $regions)
        <option>{{ $regions->region_name}}</option>
        @endforeach
        {{-- <option>region 1</option>
        <option>region 2</option>
        <option>region 3</option> --}}
      </select>
    </div>
    <div class="form-group">
      <label for="territory-code">Territory Code</label>
      <input type="text" class="form-control" id="territory_code" name="territory_code" value="Automatically" disabled>
    </div>
    <div class="form-group">
      <label for="territory-name">Territory Name</label>
      <input type="text" class="form-control" id="territory_name" name="territory_name" placeholder="Ex. TERRITORY 1">
    </div>
    <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">SAVE</button>
  </form>
 </div>
@endsection
