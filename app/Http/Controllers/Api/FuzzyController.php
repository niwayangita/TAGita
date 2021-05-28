<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function index(Request $request){
        $cExtra = $request->crispExtra;
        $cAgree = $request->crispAgree;
        $cCons = $request->crispCons;
        $cNeuro = $request->crispNeuro;
        $cOpen = $request->crispOpen;

        $dk_rendahE = 0.0;
        $dk_sedangE = 0.0;
        $dk_tinggiE = 0.0;

        //fuzzifikasi extraversion
        if ($cExtra<=8){
            $dk_rendahE = 1.0;
            $dk_sedangE = 0.0;
            $dk_tinggiE = 0.0;
        }
        else if($cExtra> 8 && $cExtra<20)
        {
            $dk_rendahE = (20.0-$cExtra)/(20-8);
            $dk_sedangE = ($cExtra-8.0)/(20-8);
            $dk_tinggiE = 0.0;
        }
        else if($cExtra == 20){
            $dk_rendahE = 0.0;
            $dk_sedangE = 1.0;
            $dk_tinggiE = 0.0;
        }
        else if($cExtra > 20.0 && $cExtra <32.0){
            $dk_rendahE = 0.0;
            $dk_sedangE = (32.0-$cExtra)/(32-20);
            $dk_tinggiE = ($cExtra-20.0)/(32-20);
        }
        else if($cExtra >= 32){
            $dk_rendahE = 0.0;
            $dk_sedangE = 0.0;
            $dk_tinggiE = 1.0;
        }

        //fuzzifikasi agreeableness
        $dk_rendahA = 0.0;
        $dk_sedangA = 0.0;
        $dk_tinggiA = 0.0;

        if ($cAgree<=8){
            $dk_rendahA = 1.0;
            $dk_sedangA = 0.0;
            $dk_tinggiA = 0.0;
        }
        else if($cAgree> 8 && $cAgree<20)
        {
            $dk_rendahA = (20.0-$cAgree)/(20-8);
            $dk_sedangA = ($cAgree-8.0)/(20-8);
            $dk_tinggiA = 0.0;
        }
        else if($cAgree == 20){
            $dk_rendahA = 0.0;
            $dk_sedangA = 1.0;
            $dk_tinggiA = 0.0;
        }
        else if($cAgree > 20 && $cAgree <32){
            $dk_rendahA = 0.0;
            $dk_sedangA = (32.0-$cAgree)/(32-20);
            $dk_tinggiA = ($cAgree-20.0)/(32-20);
        }
        else if($cAgree >= 32){
            $dk_rendahA = 0.0;
            $dk_sedangA = 0.0;
            $dk_tinggiA = 1.0;
        }

        //fuzzifikasi conscientiousness
        $dk_rendahC = 0.0;
        // $dk_sedangC = 0.0;
        $dk_tinggiC = 0.0;

        if ($cCons<=8){
            $dk_rendahC = 1.0;
            //$dk_sedangC = 0.0;
            $dk_tinggiC = 0.0;
        }
        else if($cCons> 8 && $cCons<20)
        {
            $dk_rendahC = (20.0-$cCons)/(20-8);
            $dk_sedangC = ($cCons-8.0)/(20-8);
            $dk_tinggiC = 0.0;
        }
        else if($cCons == 20){
            $dk_rendahC = 0.0;
            $dk_sedangC = 1.0;
            $dk_tinggiC = 0.0;
        }
        else if($cCons > 20 && $cCons <32){
            $dk_rendahC = 0.0;
            $dk_sedangC = (32.0-$cCons)/(32-20);
            $dk_tinggiC = ($cCons-20.0)/(32-20);
        }
        else if($cCons >= 32){
            $dk_rendahC = 0.0;
            $dk_sedangC = 0.0;
            $dk_tinggiC = 1.0;
        }

        //fuzzifikasi neuroticism
        $dk_rendahN = 0.0;
        $dk_sedangN = 0.0;
        $dk_tinggiN = 0.0;

        if ($cNeuro<=8){
            $dk_rendahN = 1.0;
            $dk_sedangN = 0.0;
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro> 8 && $cNeuro<20)
        {
            $dk_rendahN = (20.0-$cNeuro)/(20-8);
            $dk_sedangN = ($cNeuro-8.0)/(20-8);
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro == 20){
            $dk_rendahN = 0.0;
            $dk_sedangN = 1.0;
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro > 20 && $cNeuro <32){
            $dk_rendahN = 0.0;
            $dk_sedangN = (32.0-$cNeuro)/(32-20);
            $dk_tinggiN = ($cNeuro-20.0)/(32-20);
        }
        else if($cNeuro >= 32){
            $dk_rendahN = 0.0;
            $dk_sedangN = 0.0;
            $dk_tinggiN = 1.0;
        }

                //fuzzifikasi neuroticism
        $dk_rendahN = 0.0;
        $dk_sedangN = 0.0;
        $dk_tinggiN = 0.0;

        if ($cNeuro<=8){
            $dk_rendahN = 1.0;
            $dk_sedangN = 0.0;
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro> 8 && $cNeuro<20)
        {
            $dk_rendahN = (20.0-$cNeuro)/(20-8);
            $dk_sedangN = ($cNeuro-8.0)/(20-8);
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro == 20){
            $dk_rendahN = 0.0;
            $dk_sedangN = 1.0;
            $dk_tinggiN = 0.0;
        }
        else if($cNeuro > 20 && $cNeuro <32){
            $dk_rendahN = 0.0;
            $dk_sedangN = (32.0-$cNeuro)/(32-20);
            $dk_tinggiN = ($cNeuro-20.0)/(32-20);
        }
        else if($cNeuro >= 32){
            $dk_rendahN = 0.0;
            $dk_sedangN = 0.0;
            $dk_tinggiN = 1.0;
        }

        //fuzzifikasi openness
        $dk_rendahO = 0.0;
        $dk_sedangO = 0.0;
        $dk_tinggiO = 0.0;

        if ($cOpen<=8){
            $dk_rendahO = 1.0;
            $dk_sedangO = 0.0;
            $dk_tinggiO = 0.0;
        }
        else if($cOpen> 8 && $cOpen<20)
        {
            $dk_rendahO = (20.0-$cOpen)/(20-8);
            $dk_sedangO = ($cOpen-8.0)/(20-8);
            $dk_tinggiO = 0.0;
        }
        else if($cOpen == 20){
            $dk_rendahO = 0.0;
            $dk_sedangO = 1.0;
            $dk_tinggiO = 0.0;
        }
        else if($cOpen > 20 && $cOpen <32){
            $dk_rendahO = 0.0;
            $dk_sedangO = (32.0-$cOpen)/(32-20);
            $dk_tinggiO = ($cOpen-20.0)/(32-20);
        }
        else if($cOpen >= 32){
            $dk_rendahO = 0.0;
            $dk_sedangO = 0.0;
            $dk_tinggiO = 1.0;
        }

        //sistem inferensi
        if ()

        $aturan = DB::table('aturanB5')
                ->select('*')
                ->get();

        return response()->json([$dk_rendahO, $dk_sedangO, $dk_tinggiO]);
    }
}