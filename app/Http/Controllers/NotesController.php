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

    public function renderMain(Request $request)
    {
        $view = $request->input("view");

        $notes = [];

        if($view === null || $view === "a")
            $notes = Note::where("user_id", Auth::id())->orWhere("visibility", 1)->get();
        else
            $notes = Note::where("user_id", Auth::id())->get();

        return view("partials/cards", ["notes" => $notes, "viewing" => $view]);
    }

    public function renderAddNote()
    {
        $options = [
            "action_text" => "Crear",
            "form_action" => "/note"
        ];

        return view("partials/edit", ["options" => $options]);
    }

    public function addNote(Request $request)
    {
        $title = $request->input("title");
        $body = $request->input("content");
        $color = $request->input("color");

        $visibility = $request->input("visibility") === null ? 0 : 1;

        $note = new Note();
        $note->title = $title;
        $note->body = $body;
        $note->user_id = Auth::id();
        $note->color = $color;//$colors[random_int(0, count($colors) - 1)];
        $note->token = md5(time());
        $note->visibility = $visibility;

        $note->save();

        return redirect('/');
    }

    public function renderEditNote($noteId)
    {
        $editingNote = Note::where("token", $noteId)->first();
        $options = [
            "action_text" => "Editar",
            "form_action" => "/note/" . $editingNote->token
        ];

        return view("partials/edit", ["note" => $editingNote, "options" => $options]);
    }

    public function editNote(Request $request, $id)
    {
        $title = $request->input("title");
        $body = $request->input("content");
        $color = $request->input("color");
        $visibility = $request->input("visibility") === null ? 0 : 1;

        $note = Note::where("token", $id)->first();
        $note->title = $title;
        $note->body = $body;
        $note->color = $color;
        $note->visibility = $visibility;

        $note->save();

        return redirect("/");
    }

    public function deleteNote($id)
    {
        return Note::where("token", $id)->delete();
    }
}
