<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        try {
            $category = Category::firstOrCreate($request->validated());
            session()->flash('success', 'Data Kategori di-Tambahkan !');
            return redirect(route('kategori.index'));
        } catch (\Throwable $th) {
            session()->flash('error', '');
            return redirect(route('kategori.create'));
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $kategori)
    {
        $edit = $kategori;
        return view('kategori.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $kategori)
    {
        try {
            $kategori->update($request->validated());

            session()->flash('info', 'Data Kategori di-Ubah !');
            return redirect(route('kategori.index'));
        } catch (\Throwable $th) {
            session()->flash('error');
            return redirect(route('kategori.edit', $kategori->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $kategori)
    {
        try {
            $kategori->delete();

            session()->flash('warning', 'Data Kategori di-Hapus !');
            return redirect(route('kategori.index'));
        } catch (\Throwable $th) {
            session()->flash('error');
            return redirect(route('kategori.index'));
        }
    }
}
