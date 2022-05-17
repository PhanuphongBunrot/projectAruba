<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function __invoke(){// invoke การเรียกใช้จะไ่ม่ต้องใส่ชื่อ ต่อจาก calees
        return view('index',['name' => 'phanuphong']);//
    }


  
}
