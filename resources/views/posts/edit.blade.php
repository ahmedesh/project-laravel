
@extends('layouts/app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4"> Edit Post </h1>
                    <a href="{{route('posts.index')}}" type="submit" class="btn btn-primary"> Posts </a>
                </div>
            </div>
        </div>
        <div class="row">

            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger" role="alert">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="col">

                <form method="POST" action="{{route('posts.update' , $post->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Title </label>
                        <input name="title" type="text" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        @foreach($tags as $item)
                            <label> {{$item->tag}} </label>
                            <input type="checkbox" name="tags[]" class="mx-2" value="{{$item->id}}"
                                  @foreach($post->tags as $item2)
                                      @if($item->id == $item2->id)
                                          checked
                                @endif
                                      @endforeach
                            >
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label> Description </label>
                        <textarea name="description" class="form-control"> {!! $post->description !!} </textarea>
                    </div>
                    <div class="form-group">
                        <label> Photo </label>
                        <input name="photo" type="file" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
