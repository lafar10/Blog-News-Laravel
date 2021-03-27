<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\NewsViews;
use App\Events\EventViews;
use App\Events\PostViewer;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.admin_post', compact('posts'));
    }

    public function create()
    {
        return view('admin.admin_post_add');
    }

    public function store(Request $request)
    {
        $posts = new Post();

        $posts->author_name_en = $request->input('author_name');
        $posts->post_title_en = $request->input('post_title');
        $posts->post_subtitle_en = $request->input('post_subtitle');
        $posts->big_title_en = $request->input('big_title');
        $posts->content_intro_en = $request->input('content_intro');
        $posts->content_show_en = $request->input('content_show');
        $posts->content_conclusion_en = $request->input('content_conclusion');
        $posts->category_id = $request->input('category_id');
        $posts->action_map_en = $request->input('action_place');
        $posts->source_of_post_en = $request->input('source_of_post');
        $posts->author_name_ar = $request->input('author_name_ar');
        $posts->post_title_ar = $request->input('post_title_ar');
        $posts->post_subtitle_ar = $request->input('post_subtitle_ar');
        $posts->big_title_ar = $request->input('big_title_ar');
        $posts->content_intro_ar = $request->input('content_intro_ar');
        $posts->content_show_ar = $request->input('content_show_ar');
        $posts->content_conclusion_ar = $request->input('content_conclusion_ar');
        $posts->action_map_ar = $request->input('action_map_ar');
        $posts->source_of_post_ar = $request->input('source_of_post_ar');

        if ($request->hasFile('big_picture')) {
            $file = $request->file('big_picture');
            $extension = $file->getClientOriginalExtension();
            $file_name  = time() . '.' . $extension;
            $file->move('public/images/', $file_name);
            $posts->big_picture =  $file_name;
        }

        if ($request->hasFile('big_video')) {
            $file = $request->file('big_video');
            $extension = $file->getClientOriginalName();
            $file_name_a  = time() . '.' . $extension;
            $file->move('public/videos/', $file_name_a);
            $posts->big_video =  $file_name_a;
        }

        if ($request->hasFile('content_show_picture')) {
            $file = $request->file('content_show_picture');
            $extension = $file->getClientOriginalExtension();
            $file_name_b  = time() . '.' . $extension;
            $file->move('public/images/', $file_name_b);
            $posts->content_show_picture =  $file_name_b;
        }

        if ($request->hasFile('content_show_video')) {
            $file = $request->file('content_show_video');
            $extension = $file->getClientOriginalName();
            $file_name_c  = time() . '.' . $extension;
            $file->move('public/videos/', $file_name_c);
            $posts->content_show_video =  $file_name_c;
        }

        if ($request->hasFile('content_conclusion_picture')) {
            $file = $request->file('content_conclusion_picture');
            $extension = $file->getClientOriginalExtension();
            $file_name_d  = time() . '.' . $extension;
            $file->move('public/images/', $file_name_d);
            $posts->content_conclusion_picture =  $file_name_d;
        }

        if ($request->hasFile('content_conclusion_video')) {
            $file = $request->file('content_conclusion_video');
            $extension = $file->getClientOriginalName();
            $file_name_e  = time() . '.' . $extension;
            $file->move('public/videos/', $file_name_e);
            $posts->content_conclusion_video =  $file_name_e;
        }
        $posts->save();

        return view('admin.admin_post', compact('posts'));
    }

    public function get_details($id)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $posts = Post::select(
            'id',
            'post_title_' . $lang . ' as title',
            'post_title_' . $lang . ' as subtitle',
            'big_picture',
            'big_video',
            'content_show_video',
            'content_show_picture',
            'content_conclusion_video',
            'content_conclusion_picture',
            'category_name_' . $lang . ' as category',
            'big_title_' . $lang . ' as big_title',
            'created_at',
            'author_name_' . $lang . ' as author',
            'content_intro_' . $lang . ' as intro',
            'content_show_' . $lang . ' as show',
            'content_conclusion_' . $lang . ' as conclusion',
            'action_map_' . $lang . ' as map',
            'source_of_post_' . $lang . ' as source',
            'views'
        )->find($id);

        Event(new NewsViews($posts));
        // Event(new PostViewer($posts));

        return view('news_details', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search_news');
        $lang = LaravelLocalization::getCurrentLocale();

        $news = Post::select('id', 'post_title_' . $lang . ' as title', 'post_subtitle_' . $lang . ' as subtitle', 'big_picture', 'created_at')
            ->where('id', 'like', "%$search%")
            ->orWhere('post_title_ar', 'like', "%$search%")
            ->orWhere('post_title_en', 'like', "%$search%")
            ->orWhere('post_subtitle_ar', 'like', "%$search%")
            ->orWhere('post_subtitle_en', 'like', "%$search%")
            ->orWhere('category_name_ar', 'like', "%$search%")
            ->orWhere('category_name_en', 'like', "%$search%")
            ->orWhere('author_name_ar', 'like', "%$search%")
            ->orWhere('author_name_en', 'like', "%$search%")
            ->get();
        return view('display_search_news')->with('news', $news);
    }
}
