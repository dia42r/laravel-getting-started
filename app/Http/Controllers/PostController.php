<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('blog/index', ['posts' => Post::OrderBy('title', 'asc')->paginate(1)]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function adminIndex()
    {
        return view('admin/index', ['posts' => Post::OrderBy('created_at', 'asc')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.create', ['tags' => Tag::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $user = Auth::user();

/*
        if (!$user) {
            return redirect()->back();
        }*/

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        $user->posts()->save($post);

        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')->with('info',' Post create successfully ! ');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::where('id',$id)->with('likes')->first();
        return view('blog/post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {

        return view('admin/edit', [
            'post' => Post::where('id', $id)->first(),
            'tags' => Tag::all()
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return void
     */
    public function update(Request $request)
    {
        $post = Post::find($request->input('id'));

        if (Gate::denies('manipulate-post', $post)) {
            return redirect()->back()->with('alert', 'Not Authorized !');
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();

        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')->with('info', 'Post Updated successfully ');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Gate::denies('manipulate-post', $post)) {
            return redirect()->back()->with('alert', 'Not Authorized !');
        }

        $post->likes()->delete();
        $post->delete();
        $post->tags()->detach();

        return redirect()->route('admin.index')->with('info', 'Post deleted successfully ');
    }

    public function like($id)
    {
        $like = new Like();
        Post::find($id)->likes()->save($like);

        return redirect()->back();
    }
}
