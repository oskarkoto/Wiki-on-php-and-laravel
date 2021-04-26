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
                        <strong>Title:</strong>
                        {{ $data['wikis']->title }}
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Publication Content:</strong>
                        {{ $data['wikis']->description }}
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Publication Type:</strong>
                        @foreach ($data['types'] as $myType)
                            @if ($myType->id == $data['wikis']->wtype)
                                {{ $myType->description }}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Publication State:</strong>
                        @foreach ($data['states'] as $myState)
                            @if ($myState->id == $data['wikis']->wstate)
                                {{ $myState->description }}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Publication Author:</strong>
                        @foreach ($data['users'] as $myUser)
                            @if ($myUser->id == $data['wikis']->author)
                                {{ $myUser->name }}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Submitted at:</strong>
                        {{ $data['wikis']->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('users.index') }}" style="margin-left: 10px"> Back</a>
    </div>
@endsection
