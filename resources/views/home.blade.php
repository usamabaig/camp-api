@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">Deleted Users</div>
                <div class="card-body">
                    <p>All deleted users will be listed here to restore or delete permanently</p>
                    <a class="btn btn-primary btn-sm" href="{{ route('user.deleted') }}">View</a>
                </div>
            </div>
        </div>
        @foreach($teams as $team)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header"><b>{{ $team->team_name }} Team</b></div>
                    <div class="card-body">
                        <p>All Regions, Districts and territories belonging to {{ $team->team_name }} Team will be listed here.</p>
                        <a class="btn btn-primary btn-sm" href="{{ route('team.details', [$team->id, 'region']) }}">Regions</a>
                        <a class="btn btn-success btn-sm" href="{{ route('team.details', [$team->id, 'district']) }}">Districts</a>
                        <a class="btn btn-dark btn-sm" href="{{ route('team.details', [$team->id, 'territory']) }}">Territories</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">Import Doctors</div>
                <div class="card-body">
                    <p>Import doctors from excel file.</p>
                    <a class="btn btn-primary btn-sm" href="{{ route('doctor') }}">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
