@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full pt-10 pl-10 pr-10 pb-32">
                <p class="text-gray-700">
                    Hi, welcome back!
                </p>
                <div class="grid grid-cols-3 gap-4 mt-10">
                    <div class="border rounded border-black-500 border-opacity-100 h-52">
                        1
                    </div>
                    <div class="border rounded border-black-500 border-opacity-100 h-52">
                        1
                    </div>
                    <div class="border rounded border-black-500 border-opacity-100 h-52">
                        1
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
