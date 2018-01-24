<?php

namespace todofy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use todofy\Models\Note;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renderMain()
    {
        $notes = Note::where("user_id", 0)->get();

        return view("partials/cards", ["notes" => $notes]);
    }

    public function renderAddNote()
    {
        return view("partials/edit");
    }

    public function addNote(Request $request)
    {
        $colors = [
            "#00bcd4", "#f44336", "#e91e63", "#9c27b0", "#673ab7", "#3f51b5", "#2196f3", "#03a9f4", "#00bcd4", "#009688",
            "#4caf50", "#8bc34a", "#cddc39", "#ffeb3b", "#ffc107", "#ff9800", "#ff5722", "#795548", "#9e9e9e", "#607d8b"
        ];

        $title = $request->input("title");
        $body = $request->input("content");

        $note = new Note();
        $note->title = $title;
        $note->body = $body;
        $note->user_id = 0;
        $note->color = $colors[random_int(0, count($colors) - 1)];
        $note->token = md5(time());

        $note->save();

        return redirect('/');
    }

    public function renderEditNote($noteId)
    {
        return view("partials/edit", ["note" => Note::where("token", $noteId)->first()]);
    }

    public function editNote(Request $request, $id)
    {
        $title = $request->input("title");
        $body = $request->input("content");

        $note = Note::where("token", $id)->first();
        $note->title = $title;
        $note->body = $body;

        $note->save();

        return redirect("/");
    }

    public function deleteNote($id)
    {
        return Note::where("token", $id)->delete();
    }
}
