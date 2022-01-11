
@extends('layouts/app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4"> Create Post </h1>
                <a href="{{route('tags.index')}}" type="button" class="btn btn-success"> Tags </a>
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

            <form method="POST" action="{{route('tags.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> Name </label>
                    <input name="tag" type="text" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
