<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

use Carbon\Carbon;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $topics = Topic::all();
        $topics = Topic::whereNull("deleted_at")->get();
        return view('index', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);
        // $topic = new Topic();
        // $topic->title = $request->input('title');
        // $topic->user_id = Auth::id();
        // $topic->save();

        return redirect()->route('topics.index');         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        
        // validation
        //dd($request);
        $topic = Topic::find($id);
        $topic->name = $request->input('name-selected');
        $topic->toc = $request->input('toc-selected');
        $topic->memo = $request->input('memo-selected');
        $topic->save();

        return redirect()->route('topics.index')
            ->with('flash_message', '投稿を削除しました。');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, string $id)
    {
        //dd($id);
        $topic = Topic::find($id);
        $topic->deleted_at = new Carbon();
        $topic->save();

        return redirect()->route('topics.index')
            ->with('flash_message', '投稿を削除しました。');
                
    }
}
