@extends('layouts.app')

@section('content')
    <div class="container col-md-6  d-flex flex-column">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
            @if (Auth::user()->role == "chef")
            <button type="button" data-toggle="modal" data-target="#newPlat"  class="align-self-end btn new">new plat</button>
            @endif

            <div class="modal fade" id="newPlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="new_plat">
                            <h2 class="text-md-center">New Dish</h2>
                            <div class="col-md-10 m-auto">
                                <hr>
                            </div>
                            <form action="{{route('storePlat')}}" method="post" enctype="multipart/form-data" class="col-md-10 m-auto">
                                    @csrf 
                                    @method('POST')
                                    <div class="form-group mb-4">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Name :') }}</label>
                                        <div>
                                            <input id="name" type="text" placeholder="Enter the name the dish" class=" input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="description" class="col-form-label text-md-right">{{ __('Description :') }}</label>
                                        <div>
                                            <textarea name="description" id="description" placeholder="description" rows="5" class="description @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="price" class="col-form-label text-md-right">{{ __('Price (MAD) :') }}</label>
                                        <div>
                                            <input id="price" type="number" class=" input @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                    
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 col-md-6">
                                            <label for="image" class="col-form-label text-md-right">{{ __('Choose an Image :') }}</label>
                                            <div id="Pimage">
                                                <img id="platImage" src="{{asset('images/noImage.svg')}}" alt="image of the dish" >
                                                <input id="image" type="file" class="col-md-12 h-100" onchange="addImage(this)" name="image"  placeholder="type here..." value="{{ old('image') }}" required autocomplete="image" autofocus >
                                            </div>
                                    </div>
                
                                    <div class="form-group d-flex flex-column">
                                        <button type="submit" class="btn save align-self-center mb-4">
                                            {{ __('SAVE') }}
                                        </button>
                                    </div>
                            </form>
                    </div>
            </div>
            </div>
            </div>
        @foreach ($allPost as $item)

        <div class="post col-md-12 mt-4 bg-white d-flex flex-column">
            <a href="{{route('allPostsChef', ['id'=> $item->user->id])}}" class="profil col-md-12 mt-2 align-self-center">
                <p><i class="fa fa-user"></i>&nbsp {{$item->user->name}}</p>
            </a>
            <img src="/image/{{ $item->image}}" alt="" class="col-md-12" />
            <h2 class="m-4">{{$item->name}}</h2>
            <span class="ml-4">{{$item->price}} MAD</span>
            <p class="ml-4">{{$item->description}}</p>        
        </div>

        @endforeach
    </div>
@endsection
