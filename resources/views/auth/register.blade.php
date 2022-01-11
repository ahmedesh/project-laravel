
<!DOCTYPE html>
<html lang="en">

{{-- Re-Capatcha --}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

{{--{!! NoCaptcha::renderJs() !!}--}}

@include('auth.includes.header')
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('loginpage/images/img-01.png')}}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf

                <span class="login100-form-title">
						Member Register
                    </span>


                <div class="wrap-input100 validate-input">
                    <input id="name" type="text" class="input100  @error('name') is-invalid @enderror" name="name" placeholder="full name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100  " type="password" name="password_confirmation" placeholder="Password">

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

{{-- Re-Capatcha --}}
{{--                <div class="wrap-input100 validate-input" data-validate = "Password is required">--}}
{{--                    <div class="{{$errors->has('g-recaptcha-response')? 'has-error' : ''}}">--}}
{{--                        {!! NoCaptcha::display(['data-theme' => 'dark']) !!}--}}
{{--                    </div>--}}
{{--                    @if ($errors->has('g-recaptcha-response'))--}}
{{--                        <span class="help-block">--}}
{{--                                <strong> recaptcha هذا الحقل مطلوب </strong>--}}
{{--                            </span>--}}
{{--                    @endif--}}
{{--                </div>--}}


                <div class="container-login100-form-btn">
                    <button  type="submit"  class="login100-form-btn">
                        Register
                    </button>
                </div>



                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('login')}}">
                        Login page
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


@include('auth.includes.footer')

</body>
</html>
