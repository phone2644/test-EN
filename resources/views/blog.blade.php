@extends('layout')
@section('title','blog')
@section('content')
<p>ผู้พัฒนาระบบ : {{$name}}</p>
<p>วันเริ่ม : {{$date}}</p>
@if (count($blogs)>0)
<h2 class="text-center py-2" >blog</h2>
<table class="table table-bordered text-center">
    <thead>

        <tr>
            <th scope="col">ชื่อบทความ</th>
            <th scope="col">เนือหา</th>
            <th scope="col">สถานะ</th>
            <th scope="col">ลบบทความ</th>
            <th scope="col">แก้ไข</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($blogs as $item)
        <tr>
           
            <td>{{$item->title}}</td>
            <td>{{Str::limit($item->content,10)}}</td>
            <td>
                @if ($item->status==true)
                <a href="{{route('change',$item->id)}}" class="btn btn-success">เผยแพร่</a>
                @else
                <a href="{{route('change',$item->id)}}" class="btn btn-secondary">ฉบับร่าง</a>
                @endif
            </td>
            <td>
                <a href="{{route('edit',$item->id)}}" class="btn btn-warning">แกไข</a>
            </td>
            <td><a href="{{route('delete',$item->id)}}" class="btn btn-danger"
               onclick="return confirm('คุณต้องการลบบทความชื่อ {{$item->title}} หรือไม่ ?')" 
                >ลบ
            </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$blogs->links()}}


@else
<h2 class="text-center py-2" >ไม่มีบทความในตอนนี้....</h2>

@endif


<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, at magni assumenda eligendi modi facere neque aut molestias reprehenderit excepturi odio voluptas nobis nemo nam aperiam repudiandae quae porro repellat?</p>
@endsection