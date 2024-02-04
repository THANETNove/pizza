<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Promotion;



class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('promotions')
        ->leftJoin('pizzas', 'promotions.name', '=', 'pizzas.id')
        ->leftJoin('toppings', 'promotions.toppings', '=', 'toppings.id')
        ->select('promotions.*','pizzas.name as pizzaName','pizzas.image','toppings.name as toppingName')
        ->get();
        return view('promotion.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')->get();
        $toppings = DB::table('toppings')->get();
        return view('promotion.create',['pizzas' => $pizzas, 'toppings' => $toppings]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required'],
            'toppings' => ['required'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);
        $member = new Promotion;
        $member->name = $request['name'];
        $member->toppings = $request['toppings'];
        $member->price = $request['price'];
        $member->start_date = $request['start_date'];
        $member->end_date = $request['end_date'];
        $member->save();
        return redirect('promotion-index')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pizzas = DB::table('pizzas')->get();
        $toppings = DB::table('toppings')->get();
        $data =  Promotion::find($id);
        return view('promotion.edit',['pizzas' => $pizzas, 'toppings' => $toppings,'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'name' => ['required'],
            'toppings' => ['required'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);
        $member =  Promotion::find($id);
        $member->name = $request['name'];
        $member->toppings = $request['toppings'];
        $member->price = $request['price'];
        $member->start_date = $request['start_date'];
        $member->end_date = $request['end_date'];
        $member->save();
        return redirect('promotion-index')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member =  Promotion::find($id);
        $member->delete();

        return redirect('promotion-index')->with('message', "ลบสำเร็จ" );
    }
}
