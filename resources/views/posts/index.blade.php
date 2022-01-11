
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
                    <h3> All Posts </h3>
                </div>

            </div>
        </div>
            <div class="row my-3">
                <div class="col">
                    <a href="{{route('posts.create')}}" type="button" class="btn btn-success"> Create Post </a>
                    <a  href="{{route('posts.trashed')}}" type="button" class="btn btn-danger"> Trash </a> {{-- posts.trashed دا هو ال name اللي فال ٌRoute --}}
                </div>
            </div>
        <div class="row">
            @if($post->count() > 0)
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> User </th>
                        <th scope="col"> Title </th>
                        <th scope="col"> Date </th>
                        <th scope="col"> Image </th>
                        <th scope="col"> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                         @php
                            $i = 1;
                         @endphp
                    @foreach($post as $item)
                    <tr>
{{--                        <th scope="row"> {{$item->id}} </th>--}}
                        <th scope="row"> {{$i++}} </th>
                        <td> {{$item->user->name}} </td>
                        <td> {{$item->title}} </td>
                        <td> {{$item->created_at->diffForhumans()}} </td>
                        <td>
                            <img src="{{URL::asset($item->photo)}}" class="img-thumbnail"
                                 alt="{{$item->photo}}" width="100" height="100">
                            </td>
                        <td>

                          {{-- for Authorization --}}
                            @if($item->user_id == Auth::id())
                                <a href="{{route('posts.show'    , $item->id)}}" class="btn btn-info">   View</a>  {{-- posts دا هو ال Route--}}
                                <a href="{{route('posts.edit'    , $item->id)}}" class="btn btn-primary"> Edit </a>  {{-- posts دا هو ال Route--}}
                                <a href="{{route('posts.softDelete' , $item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to Soft deleted this Product ?!')">
                                    Soft delete</a>  {{-- posts.destroy دا هو ال RouteName--}}
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            @else
                <div class="alert alert-danger w-25 text-center" role="alert">
                   No Posts Found
                </div>
            @endif
    </div>

@endsection
