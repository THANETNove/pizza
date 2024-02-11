<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('pizza-index');

    }
    public function dashboard()
    {

        $orders = DB::table('orders')->get();
        $totalSum = DB::table('orders')->sum('total_sum');


        // สร้างตัวแปรเพื่อเก็บจำนวนของ name_pi และรวม totalPrice ของแต่ละ name_pi
        $namePiCount = [];
        $totalPricePerNamePi = [];

        // วนลูปผ่านข้อมูลใน $orders เพื่อนับจำนวนของ name_pi และรวม totalPrice ของแต่ละ name_pi
        foreach ($orders as $order) {
            $pizzas = json_decode($order->pizzas, true);

            foreach ($pizzas as $pizza) {
                $namePi = $pizza['name_pi'];
                $totalPrice = floatval($pizza['totalPrice']);

                if (!isset($namePiCount[$namePi])) {
                    $namePiCount[$namePi] = 0;
                    $totalPricePerNamePi[$namePi] = 0;
                }

                $namePiCount[$namePi]++;
                $totalPricePerNamePi[$namePi] += $totalPrice;
            }
        }


        return view('dashboard', ['namePiCount' => $namePiCount, 'totalPricePerNamePi' => $totalPricePerNamePi, 'totalSum' => $totalSum]);


    }
}
