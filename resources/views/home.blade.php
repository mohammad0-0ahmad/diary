@extends('layouts.app')

@section('content')
    <diaries-provider
        :data="[
            { date: '2020-09-12', content: 'test', privacy: 'public' },
            {
                date: '2020-09-13',
                content: 'test',
                privacy: 'public'
            }
        ]">
        <content-container>
            <diary-generator></diary-generator>
            <diaries></diaries>
        </content-container>
    </diaries-provider>
@endsection
