@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Wikis</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Detail</th>
            <th>Type</th>
            <th>State</th>
            <th>Author</th>
            <th>Submitted at</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data['wikis'] as $wiki)
            <tr>
                <td>{{ $wiki->title }}</td>
                <td>{{ $wiki->description }}</td>
                @foreach ($data['types'] as $myType)
                    @if ($myType->id == $wiki->wtype)
                        <td>{{ $myType->description }}</td>
                        @break
                    @endif
                @endforeach

                @foreach ($data['states'] as $myState)
                    @if ($myState->id == $wiki->wstate)
                        <td>{{ $myState->description }}</td>
                        @break
                    @endif
                @endforeach

                @foreach ($data['users'] as $myUser)
                    @if ($myUser->id == $wiki->author)
                        <td>{{ $myUser->name }}</td>
                        @break
                    @endif
                @endforeach
                <td>{{ $wiki->created_at }}</td>
                <td>
                    <form action="{{ route('wikis.destroy',$wiki->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('wikis.show',$wiki->id) }}">Show</a>
                        @can('wiki-edit')
                            <a class="btn btn-primary" href="{{ route('wikis.edit',$wiki->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('wiki-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        @can('wiki-create')
            <a class="btn btn-secondary" href="{{ route('home') }}" style="margin-left: 10px"> Back</a>
            <a class="btn btn-primary" href="{{ route('wikis.create') }}"> Create New Wiki</a>
        @endcan
    </div>
    {!! $data['wikis']->links() !!}
@endsection
