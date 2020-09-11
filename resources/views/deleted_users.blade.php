@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>CNIC</th>
                <th>Employee Code</th>
                <th>Mobile No.</th>
                <th>Actions</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->cnic }}</td>
                <td>{{ $user->employee_code }}</td>
                <td>{{ $user->mobile_no }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{ route('user.restore', [$user->id]) }}">Restore User</a></td>
                <td><a class="btn btn-danger btn-sm" href="{{ route('user.permanent.delete', [$user->id]) }}">Permanently Delete User</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
