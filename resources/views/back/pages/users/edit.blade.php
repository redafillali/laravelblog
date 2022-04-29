@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : __('Edit'))
@section('content')
@livewire('back.edit-user', ['user' => $user, 'types' => $types])
@endsection
