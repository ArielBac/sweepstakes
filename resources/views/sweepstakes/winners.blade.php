@extends('layouts.base')

@section('title', '| Editar')

@section('content')
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="min-w-0 flex-1">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Ganhadorers!</h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            <a href="{{ redirect()->back()->getTargetUrl() }}"
                class="order-0 inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:order-1 sm:ml-3">
                Voltar
            </a>
        </div>
    </div>



    <div class="h-fit" x-data>
        <div class="" x-data="{
            animationfinished: false,
            init() { setTimeout(() => this.animationfinished = true, 1500) }
        }">
            <img x-show="!animationfinished" class="min-h-full" src="{{ asset('gifs/sparks.gif') }}">

            <div class="flex flex-col w-full" x-show="animationfinished" x-transition>
                @foreach ($winners as $winner)
                    <div class="flex items-center space-x-3 lg:pl-2 mt-5 ml-5">
                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true">
                        </div>
                        <a href="#" class="truncate hover:text-gray-600">
                            <span>
                                {{ $winner->name }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
