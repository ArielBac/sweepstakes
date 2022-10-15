@extends('auth.base')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="bg-white border border-solid text-primary-red p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <div class="flex flex-col">
            <label class="block text-sm font-medium text-white" for="name">Nome</label>
            <div class="nt-1">
                <input value="{{old('name')}}"
                    class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bloxk w-full sm:text-sm border-gray-300 rounded-md"
                    id="name" name="name" type="name" placeholder="Digite seu nome">
            </div>
        </div>
        <div class="flex flex-col mt-4">
            <label class="block text-sm font-medium text-white" for="email">Email</label>
            <div class="nt-1">
                <input value="{{old('email')}}"
                    class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bloxk w-full sm:text-sm border-gray-300 rounded-md"
                    id="email" name="email" type="email" placeholder="Digite seu e-mail">
            </div>
        </div>
        <div class="flex flex-col mt-4">
            <label class="block text-sm font-medium text-white" for="password">Senha</label>
            <input
                class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bloxk w-full sm:text-sm border-gray-300 rounded-md"
                id="password" name="password" type="password" placeholder="Digite sua senha">
        </div>
        <div class="flex flex-col mt-4">
            <label class="block text-sm font-medium text-white" for="password_confirmation">Confirme sua senha</label>
            <input
                class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bloxk w-full sm:text-sm border-gray-300 rounded-md"
                id="password_confirmation" name="password_confirmation" type="password_confirmation"
                placeholder="Digite sua senha">
        </div>
        <button class="mt-4 p-2 bg-white text-black rounded-lg w-full">Cadastrar</button>
    </form>
@endsection
