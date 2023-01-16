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
        $i = 0;
        foreach($array['data'] as $data){
            $i++;
            $scoreCount= $scoreCount + $data['score'];
            if($data['score']<=4){
                $message[$i] = "I do not recommend it";
                $title[$i] = $data['title'];
                $jpg = $data['images'];
                $jpg2 = $jpg['jpg'];
                $img_url[$i] = $jpg2['image_url'];
            }elseif($data['score']>=5 && $data['score']<=7){
                $title[$i] = $data['title'];
                $message[$i] = "You may have fun";
                $jpg = $data['images'];
                $jpg2 = $jpg['jpg'];
                $img_url[$i] = $jpg2['image_url'];
            }else{
                $title[$i] = $data['title'];
                $message[$i] = "Great, this is one of the best anime";
                $jpg = $data['images'];
                $jpg2 = $jpg['jpg'];
                $img_url[$i] = $jpg2['image_url'];
            }
        }
        $lenght = count($array['data']);
        $result = $scoreCount/$lenght;
        return response()->json(["data"=>$data,"message"=>$message,"title"=>$title,"img_url"=>$img_url,"count"=>$lenght,"averange"=>$result]);
    }

}
