<?php

namespace App\Http\Controllers;

use App\Models\Shorten;

class StatController extends Controller
{

  public static function stats($short)
  {
    $shorten = Shorten::where('short', $short)->first();

    return view('stats', [
      'short' => $shorten->short,
      'visits' => $shorten->visits,
    ]);
  }
}
