<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\movies;

class MoviesController extends Controller
{

    // nur authentifizierte benutzer können ihnalt diese klasse zugreifen über alle view(.movies)
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies= movies::all();
        return view('movies.index', ['movies'=> $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required|min:2|max:50',
            'genre' => 'alpha|min:2|max:50',
            'darsteller' => 'alpha|min:2|max:80',
            'erscheinungsjahr' => 'numeric',
            'medium' => 'min:2|max:50'
        ]);

        $movie= movies::create([
            'titel'=>$request->input('titel'),
            'genre'=>$request->input('genre'),
            'darsteller'=>$request->input('darsteller'),
            'erscheinungsjahr'=>$request->input('erscheinungsjahr'),
            'medium'=>$request->input('medium')
        ]);
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = movies::find($id);
        return view('movies.edit', ['movie'=>$movie]);
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
        $movie= movies::where('id', $id) ->update([
            'titel'=>$request->input('titel'),
            'genre'=>$request->input('genre'),
            'darsteller'=>$request->input('darsteller'),
            'erscheinungsjahr'=>$request->input('erscheinungsjahr'),
            'medium'=>$request->input('medium'),
        ]);
        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        movies::where('id', $id)->delete();
        return redirect('/movies');
    }
}
