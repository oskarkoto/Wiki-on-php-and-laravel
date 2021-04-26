@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row formContainer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div style="text-align: center">
                    <h2>Edit Wiki</h2>
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
                <form id="editWiki" action="{{ route('wikis.update',$wiki->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                                <strong>Title:</strong>
                                <input type="text" name="title" value="{{ $wiki->title }}" class="form-control">
                            </div>
                            <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Wiki Content:</strong>
                                    <textarea class="form-control" style="height:150px" name="description">{{ $wiki->description }}</textarea>
                                </div>
                            </div>
                            <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <strong>Publication Type:</strong>
                                        <select name="wtype" class="form-control">
                                            <option value="1">Question</option>
                                            <option value="2">Article</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <strong>Publication State:</strong>
                                        <select name="wstate" class="form-control">
                                            <option value="1">Open</option>
                                            <option value="2">Closed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="author" value={{ $wiki->author }}>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-secondary" href="{{ route('wikis.index') }}"> Back</a>
        <input value="Save Changes" type="button" class="btn btn-primary"
               onclick="document.getElementById('editWiki').submit();"/>
    </div>
@endsection
