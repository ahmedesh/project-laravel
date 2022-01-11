
@extends('layouts/app')
@section('content')

    <div class="container">

        @if($message = Session::get('success'))
            <div class="alert alert-primary container" role="alert" style="width: 30%">
                {{$message}}
            </div>
        @endif

        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h3> Trashed Posts </h3>
                </div>

            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <a href="{{route('posts.index')}}" type="button" class="btn btn-success"> All Posts </a>
            </div>
        </div>
        <div class="row">
            @if($posts->count() > 0)
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> User </th>
                            <th scope="col"> Title </th>
                            <th scope="col"> Image </th>
                            <th scope="col"> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $item)
                            <tr>
                                <th scope="row"> {{$item->id}} </th>
                                <td> {{$item->user->name}} </td>
                                <td> {{$item->title}} </td>
                                <td>
                                    <img src="{{URL::asset($item->photo)}}" class="img-thumbnail"
                                         alt="{{$item->photo}}" width="100" height="100">
                                </td>
                                <td>
                                    <a href="{{route('posts.restore' , $item->id)}}" class="btn btn-info">   Restore </a>  {{-- posts دا هو ال Route--}}
                                    <a href="{{route('posts.hdelete' , $item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to deleted this Product Forever ?!')">
                                         Delete</a>  {{-- posts.destroy دا هو ال RouteName--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @else
            <div class="alert alert-danger w-25 text-center" role="alert">
                No Trashed Posts Found
            </div>
        @endif
    </div>

@endsection
