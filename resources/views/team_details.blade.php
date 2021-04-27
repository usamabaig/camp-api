@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Team: <b>{{ $team->team_name }}</b></h3>
    </div>
    <hr>
    @if($data == 'region')
    <div class="container">
        <form method="post" action="{{route('add.data')}}">
            {{csrf_field()}}
            <input type="hidden" name="team_id" value="{{ $team->id }}">
            <input type="hidden" name="data_name" value="region">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Region Name</th>
                <th>Team Name</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($regions as $region)
                <tr>
                    <td>{{ $region->region_name }}</td>
                    <td>{{ $region->team->team_name }}</td>
                    <td class="text-center"><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Are you sure you want to delete this region?')">Delete Region</a></td>
                </tr>
            @endforeach
            <tr>
                <td><input class="form-control" name="region_name" type="text" placeholder="Region Name"></td>
                <td>{{ $team->team_name }}</td>
                <td class="text-center"><button type="submit" class="btn btn-sm btn-primary">Add Region</button></td>
            </tr>
            </tbody>
        </table>
        </form>
    </div>
    @endif

    @if($data == 'district')
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>District Name</th>
                    <th>Region Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $district)
                    <tr>
                        <td>{{ $district->district_name }}</td>
                        <td>{{ $district->region->region_name }}</td>
                        <td class="text-center"><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Are you sure you want to delete this district?')">Delete District</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if($data == 'territory')
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Territory Name</th>
                    <th>District Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($territories as $territory)
                    <tr>
                        <td>{{ $territory->territory_name }}</td>
                        <td>{{ $territory->district->district_name }}</td>
                        <td class="text-center"><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Are you sure you want to delete this district?')">Delete District</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
