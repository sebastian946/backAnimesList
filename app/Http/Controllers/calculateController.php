<?php

namespace App\Http\Controllers;

use App\Models\animeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class calculateController extends Controller
{

    public function evaluateScore($nameAnime){
        $i = 0;
        $score = HTTP::get('https://api.jikan.moe/v4/anime?q='.''.$nameAnime);
        $array = $score->json();
        $scoreCount = 0;
        foreach($array['data'] as $data){
            $i++;
            $scoreCount= $scoreCount + $data['score'];
            $title[$i] = $data['title'];
                $jpg = $data['images'];
                $jpg2 = $jpg['jpg'];
                $img_url[$i] = $jpg2['image_url'];
            if($data['score']<=4){
                $message[$i] = "I do not recommend it";
            }elseif($data['score']>=5 && $data['score']<=7){
                $message[$i] = "You may have fun";
            }else{
                $message[$i] = "Great, this is one of the best anime";
            }
        }
        $lenght = count($array['data']);
        $result = $scoreCount/$lenght;
        return response()->json(["data"=>$data,"message"=>$message,"title"=>$title,"img_url"=>$img_url,"count"=>$lenght,"averange"=>$result]);
    }

}
