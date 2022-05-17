@extends('master')


@section('meta')

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="HTML, CSS, JS, Laravel">
    <title>Home</title>
@endsection


@section('content')
    <h1>Hello, {{$name}}</h1> <!--ใช้ในการเรียกชื่อตัวในคอนโทนเลอมาใช่งาน  -->
    <p> This is </p>

@endsection