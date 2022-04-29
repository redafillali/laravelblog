@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : __('All Users'))
@section('content')
<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-mobile-md card-table">
                <thead>
                    <tr>
                        <th class="w-1">
                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                aria-label="Select all users">
                        </th>
                        <th>{{__('Username')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Role')}}</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select user">
                        </td>
                        <td data-label="{{__('Username')}}">
                            <div class="d-flex py-1 align-items-center">
                                <span class="avatar me-2"
                                    style="background-image: url('{{Storage::url($user->picture)}}')"></span>
                                <div class="flex-fill">
                                    <div class="font-weight-medium">{{ $user->username }}</div>
                                </div>
                            </div>
                        </td>
                        <td data-label="{{__('Name')}}">
                            <div class="font-weight-medium">{{ $user->name }}</div>
                        </td>
                        <td data-label="{{__('Email')}}">
                            <div>{{ $user->email }}</div>
                        </td>
                        <td class="text-muted" data-label="{{__('Role')}}">
                            {{$user->type->name}}
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <desc>Download more icon variants from https://tabler-icons.io/i/pencil</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                    {{__('Edit')}}
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
