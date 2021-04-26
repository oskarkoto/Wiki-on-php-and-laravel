@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row formContainer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div style="text-align: center">
                    <h2>Show User</h2>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Permissions:<br></strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('roles.index') }}" style="margin-left: 10px"> Back</a>
    </div>
@endsection
