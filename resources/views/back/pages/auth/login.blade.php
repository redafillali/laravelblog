@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.svg" height="36"
                    alt=""></a>
        </div>
        @livewire('admin-login-form')
        <div class="text-center text-muted mt-3">
            {{__('Don\'t have account yet?')}} <a href="./sign-up.html" tabindex="-1">{{__('Sign up')}}</a>
        </div>
    </div>
</div>
@endsection
