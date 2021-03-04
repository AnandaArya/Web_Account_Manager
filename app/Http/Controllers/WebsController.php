<?php

namespace App\Http\Controllers;

use App\Web;
use Illuminate\Http\Request;

class WebsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $webs = Web::where('users_id', auth()->user()->id)->paginate(5);
        return view('webs/index', compact('webs'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $webs = web::where('users_id', auth()->user()->id)->where('title', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->orWhere('url', 'LIKE', "%$search%")->paginate(5);
        return view('webs/index', compact('webs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $web = new Web;
        $web->users_id = $request->users_id;
        $web->title = $request->title;
        $web->url = $request->url;
        $web->email = $request->email;
        $web->password = $request->password;
        $web->note = $request->note;

        $web->save();

        return redirect('webs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show(Web $web)
    {
        return view('webs/detail', compact('web'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit(Web $web)
    {
        return view('webs/edit', compact('web'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Web $web)
    {
        Web::where('id', $web->id)
        ->update([
            'title' => $request->title,
            'url' => $request->url,
            'email' => $request->email,
            'password' => $request->password,
            'note' => $request->note,
        ]);
        return redirect('/webs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy(Web $web)
    {
        // pertama kita cari dulu datanya berdasarkan id web
        $data = Web::findorfail($web->id);

        // kita hapus data Web berdasarkan id
        Web::destroy($web->id);

        return redirect('/webs');
    }
}
