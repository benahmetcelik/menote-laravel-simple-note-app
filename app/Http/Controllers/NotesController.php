<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    private $note;


    public function __construct()
    {
        $this->note = new Note();
    }


    public function home(){
      return view('note.pages.home');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(){

        return view('note.pages.create');

    }

    public function store(Request $request){
        if (strlen($request->post('note'))<1){
            return redirect()->back()->with('error','Please Some Word Entry');
        }
        $url = $this->quickRandom();
        $note_model = $this->note;
        $note_model->note = $request->post('note');
        $note_model->url = $url;
        if ($note_model->save()){
            return redirect()->route('show',$url);
        }
        return redirect()->route('home');

    }


    /**
     * @param $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($url){

        $note_query = Note::where('url','=',$url)->first();
        if ($note_query){

            return view('note.pages.show',compact('note_query'));
        }
        return redirect()->route('home');


    }

    /**
     * @return false|string
     * Respect
     * https://stackoverflow.com/questions/23015874/laravel-str-random-or-custom-function
     */
    private function quickRandom()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
    }

}
