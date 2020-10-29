<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
class HistoryController extends Controller
{
    public function get_history(){
        $data['histories'] = History::all();

        return view('history.index', $data);
    }
}
