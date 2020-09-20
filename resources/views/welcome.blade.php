@extends('layouts.app')

@section('content')
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-content-center text-center">
        <h1 class="text-white">Laravel VueJS TODO</h1>
        <div class="w-25 mx-auto ">
            <todo-component></todo-component>
        </div>
    </div>
@endsection
