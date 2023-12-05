@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>PURCHASE ORDER VIEW</h1>

        <form>

            <div style="display: flex; flex-direction: row;">


                <div class="form-group">
                    <label for="region">Region:</label>
                    <select type="text" class="form-control" id="region" name="region" placeholder="Select">
                        @foreach ($regions as $regions)
                        <option>{{ $regions->region_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group" style="margin-left: 30px;">
                    <label for="po-territory">Territory:</label>
                    <select type="text" class="form-control" id="po_territory" name="po_territory" placeholder="Select">
                       
                        @foreach ($territory as $territory)
                        <option>{{ $territory->territory_name}}</option>
                        @endforeach
    
                    </select>
                </div>

                <div class="form-group" style="margin-left: 30px;">
                    <label for="po-no">PO No:</label>
                    <input type="number" name="po-no" class="form-control" id="po-no" placeholder="type & search">
                </div>
    
                <div class="form-group" style="margin-left: 30px;">
                    <label for="date">From:</label>
                    <input type="date" name="from" class="form-control" id="from" >
                </div>
    
                <div class="form-group" style="margin-left: 30px;">
                    <label for="date">to:</label>
                    <input type="date" name="to" class="form-control" id="to" >
                </div>
    
            </div>

            <div style="margin-top: 30px;">

                <table class="table">

                    <thead>
                        <tr>
                            <th style="background-color: green;">REGION</th>
                            <th style="background-color: green;">TERRITORY</th>
                            <th style="background-color: green;">DISTRIBUTOR</th>
                            <th style="background-color: green;">PO NUMBER</th>
                            <th style="background-color: green;">DATE/TIME</th>
                            <th style="background-color: green;">TOTAL AMOUNT</th>
                            <th style="background-color: green;">VIEW PO</th>
                        </tr>
                    </thead>
    
                    <tbody>
    
                        @foreach($po_data as $po)

                        <tr>
                            <td>{{ $po["region"] }}</td>
                            <td>{{ $po["po_territory"]}}</td>
                            <td>{{ $po["distributor"] }}</td>
                            <td>{{ $po["po_no"] }}</td>
                            <td>{{ $po["updated_at"] }}</td>
                            <td>{{ $po["totalSum"] }}</td>
                            <td><button type="button" class="btn-primary" onclick="alert('Button clicked!')" style="background-color: green; border: none;">VIEW</button></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    $(document).ready(function () {
    $('#region').on('change', function () {
        var selectedRegion = $(this).val();

        // Make an AJAX request to fetch filtered data
        $.ajax({
            url: '/filterData', // Replace with your route
            method: 'GET',
            data: { region: selectedRegion },
            success: function (response) {
                // Update table with filtered data
                updateTable(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#po_territory').on('change', function () {
        var selectedTerritory = $(this).val();

        // Make an AJAX request to fetch filtered data
        $.ajax({
            url: '/filterDataTerritory', // Replace with your route
            method: 'GET',
            data: { territory: selectedTerritory },
            success: function (response) {
                // Update table with filtered data
                updateTable(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    
    function updateTable(data) {
        // Clear existing table rows
        $('tbody').empty();

        // Iterate through filtered data and append to table
        $.each(data, function (index, po) {
            $('tbody').append(`
                <tr>
                    <td>${po.region}</td>
                    <td>${po.po_territory}</td>
                    <td>${po.distributor}</td>
                    <td>${po.po_no}</td>
                    <td>${po.updated_at}</td>
                    <td>${po.totalSum}</td>
                    <td><button type="button" class="btn-primary" onclick="alert('Button clicked!')" style="background-color: green; border: none;">VIEW</button></td>
                </tr>
            `);
        });
    }
    });


    </script>

@endsection
