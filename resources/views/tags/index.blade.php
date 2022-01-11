
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
                    <h3> All Tags </h3>
                </div>

            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <a href="{{route('tags.create')}}" type="button" class="btn btn-success"> Create Tag </a>
            </div>
        </div>
        <div class="row">
          @if($tag->count() > 0)
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> Tag </th>
                        <th scope="col"> Date </th>
                        <th scope="col"> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($tag as $item)
                        <tr>
                            {{-- <th scope="row"> {{$item->id}} </th>--}}
                            <th scope="row"> {{$i++}} </th>
                            <td> {{$item->tag}} </td>
                            <td> {{$item->created_at->diffForhumans()}} </td>
                            <td>
                                <a href="{{route('tags.edit' , $item->id)}}" class="btn btn-primary"> Edit </a>  {{-- tags دا هو ال Route--}}
                                <a href="{{route('tags.destroy' , $item->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure to deleted this Tag ?!')"> Deleted </a>  {{-- tags دا هو ال Route--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                    @else
                        <div class="alert alert-danger w-25 text-center" role="alert">
                           No Tags Found
                        </div>
                    @endif
    </div>

@endsection
