<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
use DB;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('toppings')->get();
        return view('topping.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $member = new Topping;
        $member->name = $request['name'];
        $member->price = $request['price'];
        $member->save();
        return redirect('topping-index')->with('message', "บันทึกสำเร็จ" );
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
        $data =  Topping::find($id);
        return view('topping.edit',['data' =>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member =  Topping::find($id);
        $member->name = $request['name'];
        $member->price = $request['price'];
        $member->save();
        return redirect('topping-index')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Topping::find($id);
        $member->delete();
        return redirect('topping-index')->with('message', "ลบสำเร็จ" );
    }
}
