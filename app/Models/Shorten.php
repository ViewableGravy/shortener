<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Shortener;


class Shorten extends Model
{
    protected $table = "shorten";
    protected $primaryKey = "id";

    protected $fillable = [
        'short',
        'long',
        'visits',
        'user_id'
    ];

    public static function getLongFromShort(string $short)
    {
        $shorten = Shorten::where('short', $short)->first();

        if ($shorten) {
            $shorten->visits++;
            $shorten->save();
            return $shorten->long;
        }

        return '/';
    }

    /*
        * Create a new short link entry
        * @param string $url
        * @return [error|id]
    */
    public static function shortCreate(string $url, ?User $user = null): array {
        // ddd($user->id);

        while (true) {
            $id = Shorten::create_id();

            try {
              Shorten::create([
                  'long' => $url,
                  'short' => $id,
                  'user_id' => $user ? $user->id : null
              ]);
              break;
            } catch (\Exception $e) {
              if ($e->getCode() == 23000) { //if duplicate entry try again
                  continue;
              }

              return ['error' => $e];
            }
        }

        return ['id' => $id];
    }

    private static function create_id()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

}
