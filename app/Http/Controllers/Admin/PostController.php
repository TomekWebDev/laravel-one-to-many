<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //creo una variabile per recuperare il record dell'utente loggato


        $user = Auth::user();
        // $posts = Post::with('category')->paginate(10);

        // $posts = Post::with('category');

        $data = [
            'posts' => Post::with('category', 'tags')->get()
            // 'categories' => Category::All()
        ];




        // posso creare la solita array multidimensionale $data per portarmi dentro entrambe le variabili che ho salvato

        return view('admin.post.index', $data, compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::All();
        $tags = Tag::All();
        $userId = Auth::user();



        return view('admin.post.create', compact('categories', 'tags', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:50'
            ],
            [
                'title.required' => 'Attenzione il campo title è obbligatorio',
                'title.max' => 'Attenzione il campo non deve superare i 50 caratteri'
            ]
        );



        $new_post = new Post();
        $new_post->fill($data);
        $new_post->user_id = Auth::user()->id;

        $new_post->save();

        //controllo dopo aver fatto l'array prodotta dalla checkbox nella create

        if (array_key_exists('tags', $data)) {
            $new_post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.post.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Post::findOrFail($id);

        return view('admin.post.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_to_edit = Post::findOrFail($id);

        $categories = Category::All();

        $tags = Tag::All();

        return view('admin.post.edit', compact('post_to_edit', 'categories', 'tags'));
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
        $data = $request->all();
        $post_to_edit = Post::findOrFail($id);
        $request->validate(
            [
                'title' => 'required|max:50'
            ],
            [
                'title.required' => 'Attenzione, il campo title è obbligatorio',
                'title.max' => 'Attenzione, campo massimo 50 caratteri'
            ]
        );
        $post_to_edit->update($data);

        if (array_key_exists('tags', $data)) {
            $post_to_edit->tags()->sync($data['tags']);
        } else {
            $post_to_edit->tags()->sync([]);
        }

        return redirect()->route('admin.post.show', $post_to_edit->id)->with('success', "Hai modificato con successo il post: $post_to_edit->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_to_delete = Post::findOrFail($id);
        $post_to_delete->delete();
        return redirect()->route('admin.post.index')->with('success', "Hai cancellato il post con titolo: $post_to_delete->title");
    }
}
