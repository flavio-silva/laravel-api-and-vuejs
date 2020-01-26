@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center bg-gray-300 mx-auto">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6 my-8">
        <svg class="fill-current text-white w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M3.9 4.2c-.5 0-.8.3-.8.8s.4.8.8.8c.5 0 .8-.4.8-.8.1-.5-.3-.8-.8-.8zM3.3 18.6c0 1.4-.2 2.1-1.5 2.1-.3 0-.7 0-.9-.1l-.3 1.1c.3.1.7.2 1.1.2 1.9 0 2.7-1.2 2.7-3.2V8.1H3.3v10.5zM9.4 17.5c1.4 0 2.3-.4 3-1.2.8-1 1.1-2.1 1.1-3.8 0-1.4-.2-2.7-1-3.5-.6-.7-1.5-1.1-2.9-1.1s-2.3.4-3 1.2c-.8 1-1.1 2.2-1.1 3.8 0 1.5.2 2.6 1 3.5.6.7 1.5 1.1 2.9 1.1zM7.5 9.7c.3-.4.9-.8 2-.8 1 0 1.6.3 1.9.7.5.6.7 1.7.7 2.9s-.2 2.4-.7 3.1c-.3.4-.9.8-2 .8-1 0-1.6-.3-1.9-.7-.5-.6-.7-1.6-.7-2.9 0-1.2.2-2.4.7-3.1zM15 14.4c0 2.1.4 3.1 2.5 3.1.6 0 1.3-.1 1.8-.2l-.1-1c-.5.1-1 .2-1.5.2-1.4 0-1.5-.6-1.5-2.1v-5h3V8.3h-3v-3l-1.2.2v2.7h-1.8v1.1H15v5.1zM6 18h17v1H6z"/>
        </svg>
        <h1 class="text-white pt-8 text-3xl">Join us</h1>
        <h2 class="text-blue-300">Enter you information below</h2>

        <form method="POST" action="{{ route('register') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label for="name" class="uppercase absolute text-blue-500 text-xs pl-3 pt-2 font-bold">Full Name</label>

                <div>
                    <input id="name"
                           type="text"
                           class="pt-8 p-3 w-full bg-blue-800 outline-none text-gray-100 rounded pt-6 focus:bg-blue-700"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus placeholder="Your Name">

                    @error('name')
                    <span class="text-red-600 pt-1 text-sm" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="absolute uppercase text-blue-500 text-xs pl-3 pt-2 font-bold">E-mail</label>

                <div>
                    <input id="email"
                           type="email"
                           class="pt-8 p-3 rounded w-full bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                           name="email" value="{{ old('email') }}"
                           autocomplete="email"
                           placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 pt-1 text-sm" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="absolute uppercase text-xs pl-3 pt-2 text-blue-500 font-bold">Password</label>

                <div>
                    <input id="password"
                           type="password"
                           class="w-full pt-8 p-3 bg-blue-800 text-gray-100 outline-none rounded focus:bg-blue-700"
                           name="password"
                           autocomplete="new-password"
                           placeholder="Password"
                    >

                    @error('password')
                    <span class="text-red-600 pt-1 text-sm" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm" class="uppercase text-xs text-blue-500 font-bold absolute pl-3 pt-2">Re-enter password</label>

                <div>
                    <input id="password-confirm"
                           type="password"
                           class="w-full rounded bg-blue-800 pt-8 p-3 outline-none focus:bg-blue-700 text-gray-100"
                           name="password_confirmation"
                           autocomplete="new-password"
                           placeholder="Confirm">
                </div>
            </div>

            <button type="submit" class="w-full mt-8 py-2 px-3 bg-gray-400 rounded text-left font-bold text-blue-500 uppercase">
                Register
            </button>

            <div class="flex justify-between text-white font-bold pt-8 text-sm">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                <a class="btn btn-link" href="{{ route('register') }}">
                    Register
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
