<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;


class ActivityLogsController extends Controller
{
  public function viewLog($id){
    $prev_book = ActivityLog::where('id', $id)->first();
        return view('auth0.admin.logs.preview', [
            'info' => $prev_book
        ]);
  }
}
