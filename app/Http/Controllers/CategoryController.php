<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('name', 'ASC')->get();
        return view('kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|numeric|min:3|unique:categories',
                'name' => 'required|min:3|unique:categories',
            ],
            [
                'id.required' => 'Id Required.',
                'id.unique' => 'Id Already Registered.',
                'id.numeric' => 'Id Must Be Numeric.',
                'id.min' => 'Id Minimum 3 Digits.',
                'name.required' => 'Name Required.',
                'name.min' => 'Name Minimun 3 Characters.',
                'name.unique' => 'Name Already Registered.',
            ]
        );
        $data = [
            'id' => $request->id,
            'name' => $request->name,
        ];

        if (!Category::create($data)) {
            return to_route('kategori.index')->with('error', 'There is an error saving data');
        } else {
            return to_route('kategori.index')->with('success', 'Data saved successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        return view('kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id' => 'required|numeric|min:3|unique:categories',
                'name' => 'required|min:3',
            ],
            [
                'id.required' => 'Id required.',
                'id.unique' => 'Id already registered.',
                'id.numeric' => 'Id must be numeric.',
                'id.min' => 'Id minimum 3 digits.',
                'name.required' => 'Name required.',
                'name.min' => 'Name minimun 3 characters.',
            ]
        );
        $data = [
            'id' => $request->id,
            'name' => $request->name,
        ];

        if (!Category::where('id', $id)->update($data)) {
            return to_route('kategori.index')->with('error', 'There is an error saving data');
        } else {
            return to_route('kategori.index')->with('success', 'Data saved successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return to_route('kategori.index')->with('success', 'Data deleted successfully');
    }
}
