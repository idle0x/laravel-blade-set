<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use MeiliSearch\Client;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // $query = Article::search($request['search'])->where('user_id', $request['user_id']);
        $query = Article::query();


        if ($userId = $request->get('user_id')) {
            $query->where('user_id', '=', $userId);
        }

        if ($search = $request->get('search')) {
            $query = $query->where(function ($query) use ($search) {
                return $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('content', 'like', '%'.$search.'%');
            });
        }

        if ($createdAtFrom = $request['created_at_from']) {
            $query = $query->where(function ($query) use ($createdAtFrom) {
                return $query->where('created_at', '>', $createdAtFrom);
            });
        }


        // dump($query->toSql());

        $content = $query->get();

        return view('admin.search', compact('content'));
    }
}
