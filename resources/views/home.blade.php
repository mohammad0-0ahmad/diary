@extends('layouts.app')

@section('content')
    <div class="container-md bg-white">
        <diary-generator></diary-generator>
        <diary-card
            :data="{
                date: '2022-09-12',
                privacy: 'private',
                content: 'test content'
            }">
        </diary-card>
    </div>
@endsection
