<?php

namespace App\Http\Controllers;

use App\Icon;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'post_subtitle_' . LaravelLocalization::getCurrentLocale() . ' as subtitle',
            'big_picture',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'created_at'
        )
            ->orderBy('created_at', 'desc')->paginate(6);


        $posts_a = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'post_subtitle_' . LaravelLocalization::getCurrentLocale() . ' as subtitle',
            'big_picture',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'created_at'
        )
            ->where('category_id', '2')->limit(5)->get();

        $post_d = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'created_at'
        )
            ->where('emergency', 'on')->orderBy('created_at', 'desc');

        $posts_s = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'post_subtitle_' . LaravelLocalization::getCurrentLocale() . ' as subtitle',
            'big_picture',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'created_at'
        )->inRandomOrder()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $posts_e = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'post_subtitle_' . LaravelLocalization::getCurrentLocale() . ' as subtitle',
            'big_picture',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'created_at'
        )->inRandomOrder()
            ->orderBy('created_at', 'desc')
            ->get();

        $offs = Post::select(
            'id',
            'post_title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'post_subtitle_' . LaravelLocalization::getCurrentLocale() . ' as subtitle',
            'big_picture',
        )->where('big_post_etat', '1')->get();

        return view('LR9News', compact('posts', 'offs', 'posts_a', 'posts_e', 'posts_s'))->with(['post_d' => $post_d]);
    }

    public function icons(Request $request)
    {
        $icons = new Icon();

        $icons->name_icon = $request->input('name_icon');

        if ($request->hasFile('icons')) {
            $file = $request->file('icons');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $file->move('poc/', $file_name);
            $icons->icons = $file_name;
        }
        $icons->save();
    }

    public function get_icon()
    {
        $icons = Icon::all();
        return view('admin.admin_icons', compact('icons'));
    }


    public function get_posts_categories($name)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $posts = Post::where('category_name_' . LaravelLocalization::getCurrentLocale(), '=', $name)->select(
            'id',
            'post_title_' . $lang . ' as title',
            'post_title_' . $lang . ' as subtitle',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'big_picture',
            'created_at',
            'category_id'
        )->paginate(5);

        //// Sports

        $sports_a = Post::where('category_name_' . LaravelLocalization::getCurrentLocale(), '=', $name)->select(
            'id',
            'post_title_' . $lang . ' as title',
            'post_title_' . $lang . ' as subtitle',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'big_picture',
            'created_at',
            'category_id'
        )->orderBy('created_at', 'desc')->limit(1)->get();

        $sports_b = Post::where('category_name_' . LaravelLocalization::getCurrentLocale(), '=', $name)->select(
            'id',
            'post_title_' . $lang . ' as title',
            'post_title_' . $lang . ' as subtitle',
            'category_name_' . LaravelLocalization::getCurrentLocale() . ' as category',
            'big_picture',
            'created_at',
            'category_id'
        )->orderBy('created_at', 'desc')->limit(6)->get();

        return view('categories_news', compact('posts', 'sports_a', 'sports_b'));
    }


    ######################## Sports ##########################

}
