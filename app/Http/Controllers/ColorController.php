<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message', 'Color Added Successfully');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, Color $color)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::findOrFail($color->id)->update($validatedData);
        return redirect('admin/colors')->with('message', 'Color Updated Successfully');
    }

    public function destroy(Color $color)
    {
        $color = Color::findOrFail($color->id);
        $color->delete();
        return redirect()->back()->with('message', 'Color deleted successfully');
    }
}
