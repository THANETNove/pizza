<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use DB;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $data = DB::table('pizzas')->get();
        return view('pizza.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $dateNow = now()->format('YmdHis');
            $newFileName = $dateNow . '.' . $image->getClientOriginalExtension();
            $data = $image->move(public_path() . '/assets/img/pizza', $newFileName);
            $dateImg = $newFileName;
        }
        $member = new Pizza;
        $member->name = $request['name'];
        $member->price = $request['price'];
        $member->image = $dateImg;
        $member->description = $request['description'];
        $member->save();
        return redirect('pizza-index')->with('message', "บันทึกสำเร็จ" );

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
        $data =  Pizza::find($id);
        return view('pizza.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);



        $member = Pizza::find($id);


        if ($request->hasFile('image')) {

            if ($member->image) {
                $image_path = public_path().'/assets/img/pizza/'.$member->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

            }
            $image = $request->file('image');
            $dateNow = now()->format('YmdHis');
            $newFileName = $dateNow . '.' . $image->getClientOriginalExtension();
            $data = $image->move(public_path() . '/assets/img/pizza', $newFileName);
            $dateImg = $newFileName;
        }

        $member->name = $request['name'];
        $member->price = $request['price'];
        $member->image = $dateImg;
        $member->description = $request['description'];
        $member->save();
        return redirect('pizza-index')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
