@extends('layout')
@section('title','แก้ไขบทความ')
@section('content')
<h2 class="text-center py-2" >แก้บทความใหม่</h2>
<form method="POST" action="{{route('update',$blog->id)}}">
    @csrf
    <div class="form-group">
        <label for="" name="title">ชื่อบทความ</label>
<input type="text" name="title" class="form-control" value="{{$blog->title}}">
    </div>
    @error('title')
    <div class="my-2">
        <span class="text text-danger">{{$message}}</span>
    </div>
    ควยเขียนผิด
    @enderror

    <div class="form-group">
        <label for="content" >เนื่้อหาบทความ</label>
    <textarea name="content"  cols="30" rows="5" class="form-control " id="content" >{{$blog->content}}</textarea>
    </div>
    @error('content')
    <div class="my-2">
        <span class="text text-danger">{{$message}}</span>
    </div>
    @enderror

    <input type="submit" value="แก้ไข" class="btn btn-warning my-3"> 
    <a href="/author/blog" class="btn btn-success">บทความทั้งหมด</a>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection