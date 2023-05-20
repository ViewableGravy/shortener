<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shorten;

class ShortenController extends Controller
{
  public static function Shorten(Request $request)
  {
    $url = $request->input('url'); //get url from request body
    $result = Shorten::shortCreate($url, auth()->user());         //create and generate shortened url

    return $result['error'] ?? false
      ? view('server_error', ['error' => $result['error']->getMessage()])
      : view('shortened', [
          'id'     => $result['id'],
          'domain' => env('APP_URL') . ":" . env('APP_PORT') . '/'
        ]);
  }
}
