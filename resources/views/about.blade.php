@extends('layout')
@section('tiltle','about')

@section('content')
<h2>เกี่ยวกับเรา</h2>
<hr>
<p>ผู้พัฒนาระบบ : {{$name}}</p>
<p>วันเริ่ม : {{$date}}</p>
@endsection