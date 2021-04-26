@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row formContainer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div style="text-align: center">
                    <h2>Create New Wiki</h2>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="newWiki" action="{{ route('wikis.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="p-2 col-xs-12 col-sm-12 col-md-12 form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="p-2 col-xs-12 col-sm-12 col-md-12 form-group">
                            <strong>Wiki content:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Contents"></textarea>
                        </div>
                        <div class="p-2 col-xs-12 col-sm-12 col-md-12 form-group">
                            <strong>Publication Type:</strong>
                            <select name="wtype" class="form-control">
                                <option value="1">Question</option>
                                <option value="2">Article</option>
                            </select>
                        </div>
                        <input type="hidden" name="wstate" value="1"/>
                        <input type="hidden" name="author" value={{ auth()->user()->id }}>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-secondary" href="{{ route('wikis.index') }}"> Back</a>
        <input value="Post Wiki" type="button" class="btn btn-primary"
               onclick="document.getElementById('newWiki').submit();"/>
    </div>
@endsection
