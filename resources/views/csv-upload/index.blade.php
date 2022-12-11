@extends('welcome')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @include('_includes.csv-upload-form')
    </div>
@endsection
