<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emails = Email::where('users_id', auth()->user()->id)->paginate(5);
        return view('emails/index', compact('emails'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $emails = Email::where('users_id', auth()->user()->id)->where('title', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->orWhere('note', 'LIKE', "%$search%")->paginate(5);
        return view('emails/index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = new Email;
        $email->users_id = $request->users_id;
        $email->title = $request->title;
        $email->email = $request->email;
        $email->password = $request->password;
        $email->note = $request->note;

        $email->save();

        return redirect('emails');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return view('emails/detail', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return view('emails/edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        Email::where('id', $email->id)
                ->update([
                    'title' => $request->title,
                    'email' => $request->email_level,
                    'password' => $request->password,
                    'note' => $request->note,
                ]);
        return redirect('/emails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        // pertama kita cari dulu datanya berdasarkan id masakan
        $data = Email::findorfail($email->id);

        // kita hapus data email berdasarkan id
        Email::destroy($email->id);

        return redirect('/emails');
    }
}
