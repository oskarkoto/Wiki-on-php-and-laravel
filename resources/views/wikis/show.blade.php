@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row formContainer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div style="text-align: center">
                    <h2>Show Wiki</h2>
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
    <div class="row">
        <div class="row commentContainer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                        <strong>Publication Comments:</strong>
                        @foreach ($data['comments'] as $myComment)
                            <div class="p-2 col-xs-12 col-sm-12 col-md-12" style="border-bottom: 1px solid #d3d9df">
                                <strong>Author: {{$myComment->author }} <br></strong>
                                Comment: {{ $myComment->description }} <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <form id="newComment" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="p-2 col-xs-12 col-sm-12 col-md-12 form-group">
                            <strong>Comment:</strong>
                            <input type="text" name="description" class="form-control" placeholder="Comment">
                        </div>
                        <input type="hidden" name="author" value={{ auth()->user()->id }}>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-secondary" href="{{ route('wikis.index') }}" style="margin-left: 10px"> Back</a>
        <input value="Post Comment" type="button" class="btn btn-primary"
            onclick="document.getElementById('newComment').submit();"/>
    </div>
@endsection
