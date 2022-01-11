

@extends('layouts.app')

@section('content')

    <a href="{{route('posts.index')}}" type="submit" class="btn btn-primary my-3"> Posts </a>

    <div class="card">
        <h5 class="card-header">Post Info</h5>
        {{--            محطتش هنا foreach عشان انا كدا كدا بستدعيه بال id بتاعه--}}
        <img src="{{URL::asset($post->photo)}}" class="card-img-top w-25 h-25" alt="{{$post->photo}}">
        <div class="card-body">
            <h5 class="card-title"> <b>Name:- </b> {{$post->user->name}} </h5>
            <h5 class="card-title"> <b>title:- </b> {{$post->title}} </h5>
            <h5 class="card-title"> <b>tags:- </b>  @foreach($post->tags as $item2)
                                                                {{$item2->tag}} ,
                                                            @endforeach </h5>
            <h5 class="card-title"> <b>description:- </b> {{$post->description}} </h5>
            <h5 class="card-title"> <b>slug:- </b> {{$post->slug}} </h5>
            <h5 class="card-title"> <b>created at:- </b> {{$post->created_at->diffForhumans()}} </h5>
            <h5 class="card-title"> <b>updated at:- </b> {{$post->updated_at->diffForhumans()}} </h5>
            <a href="{{route('posts.softDelete', $post->id)}}" type="submit" class="btn btn-danger my-3"> Soft Delete </a>
    </div>
    </div>

@endsection
