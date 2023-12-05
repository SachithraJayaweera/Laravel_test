@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Create Line Free Issue</h1>
    {{-- action="{{ route('data.update', $data->id) }}" --}}
    <!-- Form to edit data -->
    <form method="POST" action="{{ route('data.update'),$data->id}}">

        @csrf
        @method('PUT') <!-- Use PUT method for updating data -->
        <!-- form fields here pre-populated with existing data -->
        <input type="text" name="field_name"/>
        {{-- value="{{ $data->field_name }}" --}}
        <button type="submit">Update</button>

    </form>
 </div>

@endsection
