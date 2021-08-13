@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-between box">

    <div class="welcome col-md-4">
        <h1><span>Welcome &nbsp</span>back !</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit sunt dolores consectetur culpa, cumque minus quam. Ipsa, consequatur culpa. Mollitia quasi laboriosam atque animi quisquam aliquid quo eius quibusdam dolorum.</p>
    </div>
    
    <div class="d-flex flex-column justify-content-start col-md-6 bg-white login">

        <div class="align-self-center m-4">
            <h2>Login</h2>
        </div>

        <div> 
            <form method="POST" action="{{ route('login') }}">
                @csrf 
                <div class="form-group m-4 groupe">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div>
                        <input id="email" type="email" placeholder="Enter your adress email" class=" input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group m-4 groupe">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                    <div>
                        <input id="password" type="password" placeholder="********" class="input  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-2 mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>

                <div class="form-group d-flex flex-column">
                        <button type="submit" class="btn submit align-self-center mb-4">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link mb-4" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
                
            </form>
        </div>
    </div>

    
</div>
@endsection

{{-- <div class="d-flex flex-column justify-content-center col-md-8 bg-white">
    <div class="d-flex flex-column justify-content-center">
           <div class="justify-self-center">
               <h2>Login</h2>
           </div>
           <div> 
               <form method="POST" action="{{ route('login') }}">
                   @csrf 
                   <div class="form-group row">
                       <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                           @error('password')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <div class="col-md-6 offset-md-4">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                               <label class="form-check-label" for="remember">
                                   {{ __('Remember Me') }}
                               </label>
                           </div>
                       </div>
                   </div>

                   <div class="form-group row mb-0">
                       <div class="col-md-8 offset-md-4">
                           <button type="submit" class="btn btn-primary">
                               {{ __('Login') }}
                           </button>

                           @if (Route::has('password.request'))
                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                   {{ __('Forgot Your Password?') }}
                               </a>
                           @endif
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
</div> --}}
