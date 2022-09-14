@extends('layouts.app')

@section('content')
    <diaries-provider
        :data='@json($diaries)'>
        <content-container>
            <diary-generator></diary-generator>
            <diaries></diaries>
        </content-container>
    </diaries-provider>
@endsection
