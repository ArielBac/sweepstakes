@extends('auth.base')

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Cadastrar
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-white border border-solid text-red-700 p-4 rounded mb-4">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Exemplo" required="" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="exemplo@exemplo.com" required="" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirme sua
                                senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cadastrar</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Já tem uma conta? <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Entrar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>


    {{-- <form action="{{ route('register') }}" method="POST">
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
    </form> --}}
@endsection
