<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Article;
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
        $content = Category::paginate(10);

        $headers = [
            [
                'code' => 'id',
                'title' => 'Id',
            ],
            [
                'code' => 'name',
                'title' => 'Name',
            ],
            [
                'code' => 'title',
                'title' => 'Title',
            ],
            [
                'code' => 'description',
                'title' => 'Description',
            ],
            [
                'code' => '_lft',
                'title' => '_lft',
            ],
            [
                'code' => '_rgt',
                'title' => '_rgt',
            ],
            [
                'code' => 'parent_id',
                'title' => 'parent_id',
            ],
        ];

        return view('admin.category.index', [
            'headers' => $headers,
            'content' => $content,
            'actions' => [
                [
                    'title' => 'Edit',
                    'route' => [
                        'name' => 'article.edit',
                        'var' => 'article',
                        'val' => 'id',
                    ]
                ]
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.category')->with('success', 'Category has been create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
