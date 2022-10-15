@extends('auth.base')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        @error('email')
            <div class="bg-white text-primary-red p-4 rounded mb-4">
                {{ $message }}
            </div>
        @enderror
        <div class="flex flex-col">
            <label class="block text-sm font-medium text-white" for="email">Email</label>
            <div class="nt-1">
                <input
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
        <button class="mt-4 p-2 bg-white text-black rounded-lg w-full">Entrar</button>
    </form>
@endsection
