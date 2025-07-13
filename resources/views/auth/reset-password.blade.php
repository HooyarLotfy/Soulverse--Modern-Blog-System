@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-16 glass-card p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Reset Password</h1>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <button type="submit" class="btn-card w-full">{{ __('Reset Password') }}</button>
        </form>
        <div class="mt-6 text-center text-gray-400">
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Back to Login</a>
        </div>
    </div>
@endsection


