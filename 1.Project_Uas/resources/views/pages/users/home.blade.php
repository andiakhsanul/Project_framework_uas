@extends('Layout.app')

@section('title', 'halodek')

@section('konten')

    @foreach ($data as $item)
        <h1>{{ $item->id }}</h1>
        <h1>{{ $item->NAMA }}</h1>
        <h1>{{ $item->NIM }}</h1>
        <h1>{{ $item->ALAMAT }}</h1>
        <h1>{{ $item->EMAIL }}</h1>
        <h1>{{ $item->PASSWORD }}</h1>
    @endforeach
@endsection
