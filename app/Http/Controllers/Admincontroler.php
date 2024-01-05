<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Blog;

class Admincontroler extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $blogs = DB::table('blogs')->paginate(5);
        $blogs = Blog::paginate(5);
        $name = "suraphet";
        $date = "19/12/66";
        return view('blog', compact('name', 'date', 'blogs'));
    }

    function about()
    {
        $name = "suraphet";
        $date = "19/12/66";
        return view('about', compact('name', 'date'));
    }

    function create()
    {

        return view('form');
    }



    // ตรวจสอบข้อมูล
    function insert(Request $request)
    { // Request $request รับค่ามาประมวณผล 
        $request->validate(
            [   //ตัวตรวจสอบว่าใส่ข้อมูลที่เราต้องการถูกมั้ย
                'title' => 'required|max:50', // 'required' คือหากไม่ใส่อะไร จะแจ้งเตือน | max:50 คือห้ามระบุตัวอักษร มากกว่า 50
                'content' => 'required'
            ], //arry ตัวแรกตรวจสอบและกำหนดรูปแบบที่จะตรวจสอบ
            [
                'title.required' => 'กรุณาป้อนชื่อให้ครบ',
                'title.max' => 'ห้ามใส่ชื่อเกิน 50ตัว',
                'content.required' => 'โปรดระบุเนื้อหา'
            ]  //arry ตัวที่สองจะแจ้งเตือนรูปแบบใด

        );

        // เพิ่ม ข้อมูล
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        Blog::insert($data);
        // DB::table('blogs')->insert($data);
        return redirect('/author/blog');
    }


    //ลบข้อมูล
    function delete($id)
    {
        Blog::find($id)->delete();
        DB::table('blogs')->where('id', $id)->delete(); //นำค่าจาก $id ที่ต้องการค้นหาและใส่ คำสั่งนี้เพื่อตามหา id ที่ตรงกับ $id
        return redirect()->back();
    }

    function edit($id)
    {
        $blog = Blog::find($id);

        return view('edit', compact('blog'));
    }


    function change($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $data = [
            'status' => !$blog->status
        ];
        DB::table('blogs')->where('id', $id)->update($data);
        return redirect('/author/blog');
    }


    function update(Request $request, $id)
    { // Request $request รับค่ามาประมวณผล 
        $request->validate(
            [   //ตัวตรวจสอบว่าใส่ข้อมูลที่เราต้องการถูกมั้ย
                'title' => 'required|max:50', // 'required' คือหากไม่ใส่อะไร จะแจ้งเตือน | max:50 คือห้ามระบุตัวอักษร มากกว่า 50
                'content' => 'required'
            ], //arry ตัวแรกตรวจสอบและกำหนดรูปแบบที่จะตรวจสอบ
            [
                'title.required' => 'กรุณาป้อนชื่อให้ครบ',
                'title.max' => 'ห้ามใส่ชื่อเกิน 50ตัว',
                'content.required' => 'โปรดระบุเนื้อหา'
            ]  //arry ตัวที่สองจะแจ้งเตือนรูปแบบใด

        );

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        Blog::find($id)->update($data);
        DB::table('blogs')->where('id', $id)->update($data);
        return redirect('/author/blog');
    }
}
