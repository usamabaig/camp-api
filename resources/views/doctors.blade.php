@extends('layouts.app')

@section('content')
    <div class="container">
{{--        {{dd($errors)}}--}}
        <div class="row">
            <form action="/import/doctors" method="post" enctype="multipart/form-data" files="true">
                {{csrf_field()}}
                <div class="col-md-4">
                    <input type="file" name="doctor_excel_file">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="row">
            {{ isset($message) ? $message : '' }}
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Doctor Id</th>
                <th>Doctor Phone Number</th>
{{--                <th>Actions</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->dr_id }}</td>
                    <td>{{ $doctor->dr_phone_no }}</td>
{{--                    <td><a class="btn btn-danger btn-sm" href="{{ route('user.permanent.delete', [$doctor->id]) }}">Delete Doctor</a></td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
