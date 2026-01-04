<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Added
use App\Models\Category; // Added
use App\Models\Comment; // Added

class HomeController extends Controller
{
    public function index()
    {
        // Get all categories that have at least one published news
        $categories = Category::all();
        $newsPerCategory = [];

        foreach ($categories as $category) {
            $news = News::where('category', $category->name)
                ->where('status', 'published')
                ->latest()
                ->first();

            if ($news) {
                $newsPerCategory[] = [
                    'category' => $category,
                    'news' => $news
                ];
            }
        }

        // Also get just the absolute latest news for a "Headline" if needed, 
        // or just pass the categorized list. Let's pass both.
        $latestNews = News::where('status', 'published')->latest()->take(5)->get();

        return view('welcome', compact('newsPerCategory', 'latestNews'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = News::where('category', $category->name)
            ->where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('news.category', compact('category', 'news'));
    }

    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->where('status', 'published')->with('comments')->firstOrFail();
        // $categories = Category::all(); // Removed to use filtered list in layout or just rely on query
        $recentNews = News::where('status', 'published')->where('id', '!=', $newsItem->id)->latest()->take(5)->get();
        return view('news.show', compact('newsItem', 'recentNews'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        Comment::create([
            'news_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
