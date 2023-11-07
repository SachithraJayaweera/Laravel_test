@extends('layouts.app')

@section('content')

<div class="container">
    <h1>ADD USERS</h1>
    <form method="POST" action="{{route("adduser.save")}}">
        @csrf
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="nic">NIC*</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter NIC">
            </div>
            <div class="form-group">
                <label for="address">Address*</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile*</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
            </div>
            <div class="form-group">
                <label for="email">E-Mail*</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="gender">Gender*</label>
                <select type="text" class="form-control" id="gender" name="gender" placeholder="Enter gender">
                    <option value="1">male</option>
                    <option value="2">female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="territory">Territory*</label>
                <select type="text" class="form-control" id="territory" name="territory" placeholder="Enter territory">
                    
                    @foreach ($territory as $territory)
                    <option>{{ $territory->territory_name}}</option>
                    @endforeach
                    {{-- <option value="1">territory 1</option>
                    <option value="2">territory 2</option>
                    <option value="3">territory 3</option> --}}
                </select>
            </div>

            <div class="form-group">
                <label for="username">User Name*</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name">
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-success" style="background-color: green; border: none; margin-top:10px;">SAVE</button>

    </form>    
 </div>

@endsection
