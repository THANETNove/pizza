<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("order.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')->get();
        $topping = DB::table('toppings')->get();
        $promotion = DB::table('promotions')->get();

        return view("order.create",['pizzas'=> $pizzas,'topping'=> $topping,'promotion'=> $promotion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request['data']; // Assuming $request is your request object

        // Convert the data to JSON format
        $jsonData = json_encode($data);

        $member = new Order;
        $member->user_id = Auth::user()->id;
        $member->pizzas = $jsonData;
        $member->status = "0";
        $member->save();
        return response()->json("succeed");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
