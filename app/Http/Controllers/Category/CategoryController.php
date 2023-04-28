<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Category::all();
        return view('admin.Category.index', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Category::whereNull('parent_id')->get();
        return view('admin.Category.create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::Create($request->all());
        return redirect()->route('Category.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if ($category->status == "A") {
            $status = "I";
        } else {
            $status = "A";
        }
        $data = array(
            'status' => $status,
        );
        $category->update($data);
        return redirect()->route('Category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //category/edit{id}
        $category = Category::find($id);
        $response = Category::whereNull('parent_id')->get();
        return view('admin.category.edit', compact('category', 'response'));
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
        $data = array(
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'isParent' => $request->isParent,
            'status' => $request->status,
            'description' => $request->description,
        );
        $newCategory = Category::find($id);
        $newCategory->update($data);
        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function DeleteCategory(Request $request)
    {
        $category = Category::find($request->get('id'));
        DB::table('products')->where('category_id', $request->get('id'))->delete();
        if ($category->isParent == 1) {
            DB::table('categories')->where('parent_id', $request->get('id'))->delete();
        }
        $category->delete();
        return redirect()->route('Category.index');
    }
}
