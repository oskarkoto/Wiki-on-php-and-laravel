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
                <div id="welcomeBar">
                    <h1 class="p-2">Welcome to wikiP4</h1>
                    <p class="p-2">A wiki just for employees where you will find the most recent questions and articles published by colleagues,
                        and post your own. Enjoy!</p>
                </div>
                <div class="row">
                    <div class="col-md-7 p-2" id="feauturedBar">
                        <h4>Featured Post</h4>
                        <div class="card">
                            <div class="card-header">Card1</div>
                            <div class="card-body">Card1</div>
                        </div>
                    </div>
                    <div class="col-md-5 p-2" id="recentBar">
                        <h4>Recent Posts</h4>
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Card1</div>
                            <div class="card-body">Card1</div>
                        </div>
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Card2</div>
                            <div class="card-body">Card2</div>
                        </div>
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Card3</div>
                            <div class="card-body">Card3</div>
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
