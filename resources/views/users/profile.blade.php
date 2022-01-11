@extends('layouts.app')

@section('content')

    @php
    $genderArray = ['Male' , 'Female'];
    $provinceArray = ['Baghdad','Kirkuk','Mosul','Diyala','Wasit','Basra'];
@endphp

    @if(count($errors) > 0)  {{-- $errors دي فانكشن متعرفه جاهزه ف لارفيل --}}
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
        @endforeach
    @endif
    @if($message = Session::get('success'))
        <div class="alert alert-primary container" role="alert" style="width: 30%">
            {{$message}}
        </div>
    @endif

    <form method="POST" action="{{route('profile.update')}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1"> Name </label>
            <input type="text" name="name" class="form-control"  value="{{$users->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"> facebook </label>
            <input type="text" name="facebook" class="form-control"  value="{{$users->profile->facebook}}">
            {{-- profile =>  دي اسم الفانكشن الموجوده داحل User.php --}}
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"> Gender </label>
            <select class="form-control" name="gender">
                @foreach($genderArray as $item)
                <option value="{{$item}}" {{( $users->profile->gender == $item) ? 'selected' : '' }} > {{$item}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"> Province </label>
            <select class="form-control" name="province">
                @foreach($provinceArray as $item)
                    <option value="{{$item}}" {{( $users->profile->province == $item) ? 'selected' : '' }} > {{$item}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Bio  </label>
            <textarea class="form-control" name="bio" rows="3">
            {!! $users->profile->bio !!}
          </textarea>
        </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"> Password </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"> Confirm Password </label>
                <input type="password" class="form-control" name="c_password">
            </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit"> Update </button>
        </div>
    </form>
@endsection
