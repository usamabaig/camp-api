@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                @if(auth()->user()->id == 1)
                <div class="card-header">Deleted Users</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>All deleted users will be listed here to restore or delete permanently</p>
                    <a class="btn btn-primary btn-sm" href="{{ route('user.deleted') }}">View</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
