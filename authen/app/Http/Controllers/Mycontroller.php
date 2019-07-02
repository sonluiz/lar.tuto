<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    //
    public function xinchao(){
        echo "xin chào các ban mình là son";
    }
    public function thamso($ten){
        echo "xin chào bạn đã đến vơi :".$ten;
        return redirect()->route('myrouter');
        //khi mình chạy từ Router truyền trên url nó sẽ vào controller này và nó sẽ chạy vào myyroute trong cái rou khác
    }
    public function geturl(Request $request){
        return $request ->url();

    }
}
