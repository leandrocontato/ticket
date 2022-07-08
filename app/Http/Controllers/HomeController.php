<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Comment;
use App\Models\Category;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Ticket::orderBy('id', 'DESC')->paginate(8);
        $comments = Comment::orderBy('id', 'DESC')->paginate(8);

        return view('dashboard')->with('tickets', $tickets)->with('comments', $comments);
    }
}
