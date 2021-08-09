@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-between">
                <div class="welcome col-md-4">
                    <h1><span>Let's Sign You  &nbsp</span>Up!</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit sunt dolores consectetur culpa, cumque minus quam. Ipsa, consequatur culpa. Mollitia quasi laboriosam atque animi quisquam aliquid quo eius quibusdam dolorum.</p>
                </div>
                <div class="d-flex flex-column justify-content-start col-md-6 bg-white login mt-0">
                    <div class="align-self-center m-4">
                        <h2>
                            Create an account
                        </h2>
                    </div>
                    <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text" class="input @error('name') is-invalid @enderror" placeholder="Enter your name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" placeholder="Enter your adress email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="phone" class="col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div>
                                <input id="phone" type="tel" placeholder="Enter your number phone" class="input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="adress" class="col-form-label text-md-right">{{ __('Adress') }}</label>

                            <div>
                                <input id="adress" type="text" placeholder="Enter your adress" class="input @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress">

                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            
                            <div>
                                <input id="password" type="password" placeholder="********" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            
                            <div>
                                <input id="password-confirm" placeholder="********" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group ml-4 mb-2 groupe">
                            <label class="col-form-label mb-4 text-md-right">{{ __('Do you want to register as a chef or client ?') }}</label>

                            <div class="row ml-0">
                                <div class="mr-4">
                                    <input type="radio" value="normal" id="normal" name="role" checked>
                                    <label for="normal" class="mr-4">Client</label>
                                </div>
                                <div class="ml-4">
                                    <input type="radio" id="chef" name="role" value="chef">
                                    <label for="chef">Chef</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4 ml-4 groupe">
                            <label for="cin" class="col-form-label text-md-right">{{ __('CIN') }}</label>

                            <div>
                                <input id="cin" type="text" placeholder="Enter your CIN" class="input @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" autocomplete="cin">

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group d-flex flex-column">
                                <button type="submit" class="btn submit align-self-center mb-0">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
