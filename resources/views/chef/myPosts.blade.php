@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <div class="post col-md-12 mt-4 bg-white">
            <h2 class="m-4">All your Posts</h2>
        </div>
    </div>
    @foreach ($Posts as $item)
    <div class="container">
        <div class="post col-md-12 mt-4 bg-white d-flex flex-column">
            <div class="align-self-end d-flex mt-4 mr-4">
                {{-- <form action="" method="post" class="mb-4">
                    <button type="submit" class="btn new pr-4 pl-4">Edit</button>
                </form> --}}
                <div class="mb-4">
                    <button type="button" data-toggle="modal" data-target="#edit" class="btn new pr-4 pl-4">Edit</button>
                </div>
                <div class="ml-4 mb-4">
                    <button type="button" data-toggle="modal" data-target="#delete" class="btn delete">Delete</button>
                </div>
            </div>
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content d-flex flex-column">
                    <div class="m-4 p-4">
                        <h3>
                            Are you sure ?
                        </h3>
                    </div>
                    <div class="align-self-end d-flex m-4">
                        <div>
                            <button type="button" class="btn delete m-0" data-dismiss="modal">Close</button>
                        </div>
                        <form action="{{route('deletePost')}}" method="post" class="ml-4 mb-4">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$item->id}}">
                            <button type="submit" class="btn new">Yes</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>


            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content d-flex flex-column">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="new_plat">
                        <form action="{{route('editPost')}}" method="post" enctype="multipart/form-data" class="col-md-10 m-auto">
                                @csrf 
                                @method('POST')
                                <div class="form-group mb-4">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Name :') }}</label>
                                    <div>
                                        <input id="name" type="text" placeholder="Enter the name the dish" class=" input @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" autocomplete="name" autofocus>
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
                                        <textarea name="description" id="description" rows="5" class="description @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus>{{$item->description}}</textarea>
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
                                        <input id="price" type="number" class=" input @error('price') is-invalid @enderror" name="price" value="{{$item->price}}"  autocomplete="price" autofocus>
                
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
                                            <img id="platImage" src="/image/{{ $item->image}}" alt="image of the dish" >
                                            <input id="image" type="file" class="col-md-12 h-100" onchange="addImage(this)" name="image"  placeholder="type here..." value="{{ $item->image}}"  autocomplete="image" autofocus >
                                        </div>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $item->id}}">
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



            <img src="/image/{{ $item->image}}" alt="image" class="col-md-12"/>
            <h2 class="m-4">{{$item->name}}</h2>
            <span class="ml-4">{{$item->price}} MAD</span>
            <p class="ml-4">{{$item->description}}</p>        
        </div>
    </div>
    @endforeach
@endsection
