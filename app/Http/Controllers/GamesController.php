<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Auth;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::where('users_id', auth()->user()->id)->paginate(5);
        return view('games/index', compact('games'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $games = Game::where('users_id', auth()->user()->id)->where('title', 'LIKE', "%$search%")->orWhere('game_level', 'LIKE', "%$search%")->orWhere('username', 'LIKE', "%$search%")->paginate(5);
        return view('games/index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambarFile = $request->gambar;
        // $namaFile = time().rand(100,999).".".$gambarFile->getClientOriginalExtension();
        $namaFile = uniqid().".".$gambarFile->getClientOriginalExtension();

        $game = new Game;
        $game->users_id = $request->users_id;
        $game->title = $request->title;
        $game->game_level = $request->game_level;
        $game->username = $request->username;
        $game->password = $request->password;
        $game->note = $request->note;
        $game->gambar = $namaFile;

        // kita pindahkan file gambar ke folder public/img dengan diganti namanya $namaFile
        $gambarFile->move(public_path().'/img', $namaFile);
        $game->save();

        return redirect('games');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return view('games/detail', compact('game'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        return view('games/edit', compact('game'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $dataAwal = Game::findorfail($request->id);
        $namaAwalGambar = $dataAwal->gambar;

        if(!empty($request->gambar)) {
            $request->gambar->move(public_path().'/img', $namaAwalGambar);
        }
        Game::where('id', $game->id)
                ->update([
                    'title' => $request->title,
                    'game_level' => $request->game_level,
                    'username' => $request->username,
                    'password' => $request->password,
                    'note' => $request->note,
                    'gambar' => $namaAwalGambar,
                ]);
        return redirect('/games');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        // pertama kita cari dulu datanya berdasarkan id masakan
        $data = Game::findorfail($game->id);
        // lalu kia cari nama gambar yang sudah ada di variable $data -> didalam folder public/img
        $file = public_path('/img/').$data->gambar;

        // cek jika gambar ada
        if(file_exists($file)) {
            // maka hapus filenya yang ada di folder public/img
            @unlink($file);
        }

        // kita hapus data game berdasarkan id
        Game::destroy($game->id);

        return redirect('/games');
    }
}
