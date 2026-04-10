@extends('layouts.home')

@section('content')
<x-base.container>
    <h1>{{ $category->name }}</h1>
</x-base.container>
@endsection