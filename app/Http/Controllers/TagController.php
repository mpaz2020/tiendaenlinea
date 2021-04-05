<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\Tag\UpdateRequest;
use App\Http\Requests\Tag\StoreRequest;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:tags.create')->only(['create', 'store']);
        // $this->middleware('can:tags.index')->only(['index']);
        // $this->middleware('can:tags.edit')->only(['edit', 'update']);
        // $this->middleware('can:tags.show')->only(['show']);
        // $this->middleware('can:tags.destroy')->only(['destroy']);
    }

    public function index()
    {
        $tags = Tag::get();
        return view('admin.tag.index', compact('tags'));
    }


    public function create()
    {
        return view('admin.tag.create');
    }


    public function store(StoreRequest $request, Tag $tag)
    {
        $tag->my_store($request);

        return redirect()->route('tags.index');
    }


    public function show(Tag $tag)
    {
        return back();
    }


    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->my_update($request);

        return redirect()->route('tags.index');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
