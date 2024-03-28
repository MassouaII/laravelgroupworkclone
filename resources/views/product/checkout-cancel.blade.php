<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Failure!') }}
        </h2>
    </x-slot>
    <div class="w-[400px] mx-auto bg-red-500 py-2 px-3 text-white rounded text-center">
        <h1>Your payment was not successful!!</h1>
        <p>{{$message ?? ''}}</p>
    </div>

</x-app-layout>
