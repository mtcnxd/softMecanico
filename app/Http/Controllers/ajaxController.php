<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class ajaxController extends Controller
{
    public function insertCalendar(Request $request)
    {
        $date    = $request->get('date');
        $title   = $request->get('title');
        $comment = $request->get('comment');

        Calendar::insert([
            'title' => $title,
            'comment' => $comment,
            'date'  => $date,
        ]);
    }
}
