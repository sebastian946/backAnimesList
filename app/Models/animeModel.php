<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animeModel extends Model
{
    use HasFactory;

    static function getAnimeScore($nameAnime){
        $reponse = Http::acceptJson()->get("https://api.jikan.moe/v4/anime?q=$nameAnime");
        return $reponse;
    }
}
