<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::with(['stock', 'user'])->get();
        return view('history.index', compact('history'));
    }
}

