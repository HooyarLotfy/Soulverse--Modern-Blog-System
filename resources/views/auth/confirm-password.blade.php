@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-16 glass-card p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Confirm Password</h1>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <button type="submit" class="btn-card w-full">
                {{ __('Confirm') }}
            </button>
        </form>
        <div class="mt-6 text-center text-gray-400">
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Back to Login</a>
        </div>
    </div>
@endsection


