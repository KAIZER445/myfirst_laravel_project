<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $pagePath = 'pages.backend.';

    public function index()
    {
        $category = Category::all();
        return view($this->pagePath. 'category.index', compact('category'));

        // $news = News::all();
        // foreach($news as $n){
        //     echo $n->title;
        //     echo "<br>";
        //     echo $n->category->name;
        //     echo "<br>";
        //     echo $n->user->username;
        //     echo "<br>";
        // }
    }


    public function create()
    {
        return view($this->pagePath. 'category.create');
    }


    public function store(Request $request)
    {
        $category = $request->validate([
            'name'=> 'required|unique:categories,name',
        ]);
        try{
            Category::create($category);
            return redirect()->back()->with('success','category created sucessfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','something went wrong');
        }
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
        $findNews = News::where('category_id',$id)->count();
        if ($findNews>0){
            return redirect()->back()->with('error','As this categpry has news it cannot be deleted');
        } else {
            Category::find($id)->delete();
            return redirect()->back()->with('success','category successfully deleted');
        }
    }
}
