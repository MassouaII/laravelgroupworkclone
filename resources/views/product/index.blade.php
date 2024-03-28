<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div style="display: flex; gap: 3rem; margin: 20px">
        @foreach($products as $product)
            <div class="flex: 1">
                <img src="{{$product->image}}" style="max-width: 100%">
                <h5>{{$product->name}}</h5>
                <p>€{{$product->price}}</p>
            </div>
        @endforeach
    </div>
    <p style="padding-top: 2rem;">
    <form action="{{route('checkout')}}" method="POST">
        @csrf
        <button style="border: 1px solid #000; margin: 30px;" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Checkout</button>
    </form>
    </p>
</x-app-layout>
