<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;

class ShoopingController extends Controller
{
    public function index()
    {
        $data['shoppings'] = Shopping::all();
        
        return inertia('Shopping', $data);
    }

    public function store(Request $request)
    {
        $data = $request->post();
        Shopping::create($data);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->input();
        
        $shopping = Shopping::find($data['id']);

        $shopping->complete = $data['complete'];

        $shopping->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $data = $request->input();
        Shopping::destroy($data['id']);
    }

    public function edit(Request $request)
    {
        $data = $request->input();
        
        $shopping = Shopping::find($data['id']);

        $shopping->title = $data['title'];

        $shopping->save();

        return redirect()->back();
    }
}
