@extends('user.layout')
@section('content')

    @include('user.blocks.slider',['data' => $data->slider])

    @include('user.blocks.whatwedo')

    @include('user.blocks.fanfact')

    @include('user.blocks.project_area',['data' => $generalData['dataMenu']['category']])

    @include('user.blocks.team_area',['data' => $data->team])

    @include('user.blocks.feedback',['data' => $data->feedback])

    @include('user.blocks.pricing')

    @include('user.blocks.booknow')

    @include('user.blocks.question_and_anwser',['data' => $data->faq])

    @include('user.blocks.blog')

@endsection