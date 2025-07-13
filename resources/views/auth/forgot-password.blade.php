@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-16 glass-card p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Forgot Password</h1>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <button type="submit" class="btn-card w-full">{{ __('Email Password Reset Link') }}</button>
        </form>
        <div class="mt-6 text-center text-gray-400">
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Back to Login</a>
        </div>
    </div>
@endsection


