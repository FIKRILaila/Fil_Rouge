@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        <button class="btn counter text-right align-self-end col-md-2 counter mr-2" type="button" data-toggle="collapse" data-target="#viewCart" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-shopping-cart"></i>
                Cart ({{Cart::count()}})
        </button>

    <div class="collapse" id="viewCart">
    <div class="card card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                    <th>Remove </th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (Cart::content() as $item)
                <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->qty * $item->price}}</td>
                <td> 
                    <form action="{{route('RemoveFromCart')}}" method="post">
                        @csrf
                        <input type="hidden" name="row_id" value="{{$item->rowId}}">
                        <button type="submit" class="btn btn-light"><i class="fa fa-minus-circle"></i></button>
                    </form>
                </td>
                @php $total= $total + $item->qty * $item->price; @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-between col-md-12">
            <p class=""><span class="font-weight-bold">Total price : @php echo $total; @endphp MAD</span> (Cash on delivery)</p>
            <button class="btn delete" type="button" data-toggle="collapse" data-target="#order" aria-expanded="false" aria-controls="collapseExample">Go</button>
        </div>
        <form action="{{route('order')}}" method="post" class="collapse" id="order">
            @csrf
            <label for="adresse">
                Adress : <input type="text" name="adresse" id="adresse" value="{{Auth::user()->adresse}}">
            </label>
            <input type="hidden" name="total_price" value="{{$total}}">
            <button type="submit" class="btn new">Order now</button>
        </form>
    </div>
    </div>
    <div class="post col-md-12 mt-4 bg-white">
        @foreach ($chef as $c)
        <h2 class="m-4">all dishes of chef {{$c->name}}</h2>
        @endforeach
    </div>
    </div>
    @foreach ($Posts as $item)
    <div class="container">
        <div class="post col-md-12 mt-4 bg-white d-flex flex-column">
            <form action="{{route('storeCart')}}" method="get" class="align-self-center mt-4 mr-2 mb-4 cart d-flex">
                @csrf
                {{-- @method('POST') --}}
                <input type="hidden" name="plat_id" value="{{ $item->id}}">
                <label for="qty">For how many person : 
                    <input type="number" value="1" min="1"  max=""name="qty" id="qty">
                </label>
                <button type="submit" class="btn new">Add to cart</button>
            </form>
            <img src="/image/{{ $item->image}}" alt="image" class="col-md-12"/>
            <h2 class="m-4">{{$item->name}}</h2>
            <span class="ml-4">{{$item->price}} MAD</span>
            <p class="ml-4">{{$item->description}}</p>        
        </div>
    </div>
    @endforeach
@endsection


