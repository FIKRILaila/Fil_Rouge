@foreach ($Posts as $item)
<div class="container">
    <div class="post col-md-12 mt-4 bg-white d-flex flex-column">
        <form action="" method="post" class="align-self-center mt-4 mr-2 mb-4 cart d-flex">
            <input type="hidden" name="plat_id" value="{{ $item->id}}">
            <label for="numberPerson">For how many person : 
                <input type="number" value="1" min="1"  max=""name="numberPerson" id="numberPerson">
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