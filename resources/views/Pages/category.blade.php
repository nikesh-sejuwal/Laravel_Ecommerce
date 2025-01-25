@props(['categories'])
@extends('template')

@section('abc')
@foreach($categories as $category)
<h1>{{$category->name }}</h1>
@endforeach
@endsection