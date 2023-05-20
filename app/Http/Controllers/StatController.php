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

  public static function dashboard()
  {
    $shortens = Shorten::where('user_id', auth()->user()->id)->get();
    $most_visited = Shorten::orderBy('visits', 'desc')->first();
    $domain = env('APP_URL') . ":" . env('APP_PORT') . "/";

    //get total visits of all shortens
    $total_visits = 0;
    foreach ($shortens as $shorten)
      $total_visits += $shorten->visits;

    return view('dashboard', [
      'shortens' => $shortens,
      'total_visits' => $total_visits,
      'most_visited' => $most_visited,
      'domain' => $domain
    ]);
  }
}
