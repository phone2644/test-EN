@extends('layout')
@section('title','dashbord')


@section('content')
<h2>ENService</h2>
            <nav>
                <h2>หน้าแรก</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias voluptatibus obcaecati placeat veritatis perspiciatis, corrupti, quos eum commodi optio, vitae sed eveniet excepturi? Rem eligendi aliquam architecto. Nemo, non quidem.</p>
                <a class="nav-item" href="{{route('dashbord')}}">เกี่ยวกับเรา</a>
                <a class="nav-item" href="{{route('blog')}}">บทความ</a>
            </nav>
@endsection