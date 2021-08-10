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
        @if ($orders->isEmpty())
        <div class="text-center">
            <b>
                You have not received any order yet
            </b> 
        </div>
        @else
            <table class="table bg-white p-4 col-md-12 border border-dark">
                <thead class="validate">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Content</th>
                    <th scope="col">By</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Validate</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($orders as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>
                        @foreach ($rows as $r)
                            @if ($r->cmd_id == $item->id)
                                <img src="/image/{{ $r->plats->image}}" alt="image" class="col-md-2 mb-2"/>
                                {{$r->plats->name}} for 
                                {{$r->pourCombien}}
                                person <br>
                                @foreach ($users as $u)
                                    @if ($u->id == $item->user_id)
                                        <td>{{$u->name}}</td>
                                    @endif
                                @endforeach
                                @endif
                                @endforeach
                        </td>
                        <td>{{$item->adresse}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->created_at}} </td>
                        <td>
                            @if($item->validate == false)  
                                <form action="{{route('validate')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cmd_id" value="{{$item->id}}">
                                    <button type="submit" class="btn new">Validate</button>
                                </form>
                            @else
                                already validated
                            @endif
                        </td>
                    </tr>
            @endforeach 
                </tbody> --}}
                @foreach ($orders as $item)
                    @foreach ($rows as $r)
                    @if ($r->cmd_id == $item->id)
                        @if (Auth::id() == $r->plats->chef_id)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                                <td>
                                    <img src="/image/{{ $r->plats->image}}" alt="image" class="col-md-2 mb-2"/>
                                    {{$r->plats->name}} for 
                                    {{$r->pourCombien}}
                                    person <br>
                                    @foreach ($users as $u)
                                        @if ($u->id == $item->user_id)
                                            <td>{{$u->name}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$item->adresse}}</td>
                            <td>{{$item->total_price}}</td>
                            <td>{{$item->created_at}} </td>
                            <td>
                                @if($item->validate == false)  
                                <form action="{{route('validate')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cmd_id" value="{{$item->id}}">
                                    <button type="submit" class="btn new">Validate</button>
                                </form>
                                @else
                                already validated
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
            @endforeach 
                </tbody>
              </table>
              @endif
    </div>

@endsection
