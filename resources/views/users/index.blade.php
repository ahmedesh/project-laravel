
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
                    <h3> All Users </h3>
                </div>

            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <a href="{{route('users.create')}}" type="button" class="btn btn-success"> Create User </a>
            </div>
        </div>
        <div class="row">
            @if($users->count() > 0)
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Date </th>
                            <th scope="col"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($users as $item)
                            <tr>
                                {{-- <th scope="row"> {{$item->id}} </th>--}}
                                <th scope="row"> {{$i++}} </th>
                                <td> {{$item->name}} </td>
                                <td> {{$item->email}} </td>
                                <td> {{$item->created_at->diffForhumans()}} </td>
                                <td>
                                    <a href="{{route('users.destroy' , $item->id)}}" class="btn btn-danger"
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
                No Users Found
            </div>
        @endif
    </div>

@endsection
