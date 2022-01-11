
@extends('layouts/app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4"> Edit Post </h1>
                    <a href="{{route('tags.index')}}" type="submit" class="btn btn-primary"> Tags </a>
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

                <form method="POST" action="{{route('tags.update' , $tag->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Name </label>
                        <input name="tag" type="text" class="form-control" value="{{$tag->tag}}">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
