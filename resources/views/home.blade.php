@extends('layouts.app')

@section('content')
    <div class="container" id="mainContainer">
        <div class="row justify-content-center">
            <div class="col-md-2" id="lBar">
                <div id="leftSideBar" class="border border-left-0 border-bottom-0 border-primary">
                    <div class="row pt-2 pl-3">
                        <a class="nav-link" href="{{ route('wikis.index') }}">Check all Wikis</a>
                    </div>
                    <div class="row pt-2 pl-3">
                        <a class="nav-link" href="{{ route('wikis.create') }}">Create a new Wiki</a>
                    </div>
                </div>
            </div>
            <div class="col-md-10" id="cBar">
                <div class="col-md-7 p-2" id="welcomeBar">
                    <h1 class="p-2">Welcome to wikiP4</h1>
                    <p class="p-2">A wiki just for employees where you will find the most recent questions and articles published by colleagues,
                        and post your own. Enjoy!</p>
                </div>
                <div class="row">
                    <div class="col-md-12 p-2" id="mainBar">
                        <div class="row">
                            <div class="col-md-8 p-2" id="feauturedBar">
                                <h4>Featured Wiki</h4>
                                <div class="card">
                                    <div class="card-header"> <strong>Title: </strong>{{ $data['wiki']->title }} </div>
                                    <div class="card-body">
                                        {{$data['wiki']->description }} <br><br>
                                        <strong>Author: </strong>
                                        @foreach ($data['users'] as $myUser)
                                            @if ($myUser->id == $data['wiki']->author)
                                                {{ $myUser->name }}
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p-2" id="recentBar">
                                <h4>Recent Wikis</h4>
                                @foreach ($data['wikis'] as $post)
                                    <div class="card text-white bg-primary mb-3">
                                        <div class="card-header"> <strong>Title: </strong>{{ $post->title }} </div>
                                        <div class="card-body">
                                            {{ $post->description }} <br><br>
                                            <strong>Author: </strong>
                                            @foreach ($data['users'] as $myUser)
                                                @if ($myUser->id == $post->author)
                                                    {{ $myUser->name }}
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Starts-->
        <div class="containerBg">
            <footer id="siteFooter" class="container-fluid">
                wikiP4 - Programacion 4 ULATINA - Oscar Roberto Coto Calderon
            </footer>
        </div>
        <!--Footer Ends-->
    </div>
@endsection
