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

        //sistem inferensi ambil data
        $hasilInferensi = DB::table('aturanB5')
            ->select('*')
            ->get();

        foreach($hasilInferensi as $key => $value)
        {
            //pengecekan terhadap extra rendah
            if($dk_rendahE == 0){
                if($value->extra == "rendah"){
                    $hasilInferensi->forget($key);
                }
                //pengecekan jika extra sedang juga 0
                else if($dk_sedangE == 0){
                    if($value->extra=="sedang"){
                        $hasilInferensi->forget($key);
                    }
                }
                //pengecekan jika extra tinggi juga 0
                else if($dk_tinggiE == 0){
                    if($value->extra=="tinggi"){
                        $hasilInferensi->forget($key);
                    }
                }
                else if($value->extra == "sedang"){
                    $value->extra = $dk_sedangE;
                }
                else if($value->extra == "tinggi"){
                    $value->extra = $dk_tinggiE;
                }

                //pengecekan terhadap agree rendah
                if($dk_rendahA == 0){
                    if($value->agree == "rendah"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }

                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro rendah juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro tinggi juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_rendahN ==0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0 ){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                    }

                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO ==0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                        }
                    }
                    //pengecekan terhadap cons tinggi
                    else if($dk_tinggiC == 0){
                        if($value->cons == "tinggi"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_rendahC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika sedang cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi cons juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                 //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                }
                //pengecekan terhadap agree sedang
                else if($dk_sedangA == 0){
                    if($value->agree == "sedang"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                    
                }
                //pengecekan terhadap agree tinggi
                else if($dk_tinggiA == 0){
                    if($value->agree == "tinggi"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                }
            }

//BATAS HUHIHODSFSDKJFL

            //pengecekan terhadap extra sedang
            if($dk_sedangE == 0){
                if($value->extra == "sedang"){
                    $hasilInferensi->forget($key);
                }
                //pengecekan jika extra rendah juga 0
                else if($dk_rendahE == 0){
                    if($value->extra=="rendah"){
                        $hasilInferensi->forget($key);
                    }
                }
                //pengecekan jika extra tinggi juga 0
                else if($dk_tinggiE == 0){
                    if($value->extra=="tinggi"){
                        $hasilInferensi->forget($key);
                    }
                }
                else if($value->extra == "rendah"){
                    $value->extra = $dk_rendahE;
                }
                else if($value->extra == "tinggi"){
                    $value->extra = $dk_tinggiE;
                }

                //pengecekan terhadap agree rendah
                if($dk_rendahA == 0){
                    if($value->agree == "rendah"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }

                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro rendah juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro tinggi juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_rendahN ==0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0 ){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                    }

                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO ==0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                        }
                    }
                    //pengecekan terhadap cons tinggi
                    else if($dk_tinggiC == 0){
                        if($value->cons == "tinggi"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_rendahC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika sedang cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi cons juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                 //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                }
                //pengecekan terhadap agree sedang
                else if($dk_sedangA == 0){
                    if($value->agree == "sedang"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                    
                }
                //pengecekan terhadap agree tinggi
                else if($dk_tinggiA == 0){
                    if($value->agree == "tinggi"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                }
            }

//--------------------BATAS TINGGI EXTRA------------
            //pengecekan terhadap extra tinggi
            if($dk_tinggiE == 0){
                if($value->extra == "tinggi"){
                    $hasilInferensi->forget($key);
                }
                //pengecekan jika extra sedang juga 0
                else if($dk_sedangE == 0){
                    if($value->extra=="sedang"){
                        $hasilInferensi->forget($key);
                    }
                }
                //pengecekan jika rendah tinggi juga 0
                else if($dk_rendahE == 0){
                    if($value->extra=="rendah"){
                        $hasilInferensi->forget($key);
                    }
                }
                else if($value->extra == "sedang"){
                    $value->extra = $dk_sedangE;
                }
                else if($value->extra == "rendah"){
                    $value->extra = $dk_rendahE;
                }

                //pengecekan terhadap agree rendah
                if($dk_rendahA == 0){
                    if($value->agree == "rendah"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }

                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika neuro rendah juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika neuro tinggi juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_rendahN ==0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0 ){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                else if($dk_sedangO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO ==0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                    }

                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO ==0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO ==0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN ==0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi sedang juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->neuro = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->neuro = $dk_sedangO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                        }
                    }
                    //pengecekan terhadap cons tinggi
                    else if($dk_tinggiC == 0){
                        if($value->cons == "tinggi"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_rendahC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika sedang cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi cons juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                 //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                }
                //pengecekan terhadap agree sedang
                else if($dk_sedangA == 0){
                    if($value->agree == "sedang"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree tinggi juga 0
                    else if($dk_tinggiA == 0){
                        if ($value->agree =="tinggi"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $value->agree = $dk_tinggiA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                    
                }
                //pengecekan terhadap agree tinggi
                else if($dk_tinggiA == 0){
                    if($value->agree == "tinggi"){
                        $hasilInferensi->forget($key);
                    }
                    //cek kalau agree rendah juga 0
                    else if($dk_rendahA == 0){
                        if ($value->agree =="rendah"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    //cek kalau agree sedang juga 0
                    else if($dk_sedangA == 0){
                        if ($value->agree =="sedang"){
                            $hasilInferensi->forget($key);
                        }
                    }
                    else if($value->agree == "rendah"){
                        $value->agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $value->agree = $dk_sedangA;
                    }
                    //pengecekan terhadap cons rendah
                    if($dk_rendahC == 0){
                        if($value->cons == "rendah"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika cons rendah 0 dan sedang 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="sedang"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika cons tinggi juga 0
                        else if($dk_tinggiC ==0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "sedang"){
                            $value->cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                        else if($dk_sedangN == 0){
                            if($value->neuro == "sedang"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $value->neuro = $dk_rendahN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro tinggi
                        else if($dk_tinggiN == 0){
                            if($value->neuro == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah neuro juga 0
                            else if($dk_rendahN == 0){
                                if($value->neuro=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "rendah"){
                                $value->cons = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->cons = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                    }
                    
                    //pengecekan terhadap cons sedang
                    else if($dk_sedangC == 0){
                        if($value->cons == "sedang"){
                            $hasilInferensi->forget($key);
                        }
                        //pengecekan jika rendah cons juga 0
                        else if($dk_sedangC == 0){
                            if($value->cons=="rendah"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        //pengecekan jika tinggi open juga 0
                        else if($dk_tinggiC == 0){
                            if($value->cons=="tinggi"){
                                $hasilInferensi->forget($key);
                            }
                        }
                        else if($value->cons == "rendah"){
                            $value->cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $value->cons = $dk_tinggiC;
                        }
                        //pengecekan terhadap neuro rendah
                        if($dk_rendahN == 0){
                            if($value->neuro == "rendah"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika tinggi neuro juga 0
                            else if($dk_tinggiN == 0){
                                if($value->neuro=="tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang neuro juga 0
                            else if($dk_sedangN == 0){
                                if($value->neuro=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->neuro == "tinggi"){
                                $value->neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $value->neuro = $dk_sedangN;
                            }
                            //pengecekan terhadap open rendah
                            if($dk_rendahO == 0){
                                if($value->open == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open sedang
                            else if($dk_sedangO == 0){
                                if($value->open == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika tinggi open juga 0
                                else if($dk_tinggiO == 0){
                                    if($value->open=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $value->open = $dk_tinggiO;
                                }
                            }
                            //pengecekan terhadap open tinggi
                            else if($dk_tinggiO == 0){
                                if($value->open == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika sedang open juga 0
                                else if($dk_sedangO == 0){
                                    if($value->open=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah open juga 0
                                else if($dk_rendahO == 0){
                                    if($value->open=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->open == "sedang"){
                                    $value->open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $value->open = $dk_rendahO;
                                }
                            }
                        }
                        //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                        //pengecekan terhadap cons tinggi
                        else if($dk_tinggiC == 0){
                            if($value->cons == "tinggi"){
                                $hasilInferensi->forget($key);
                            }
                            //pengecekan jika rendah cons juga 0
                            else if($dk_rendahC == 0){
                                if($value->cons=="rendah"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            //pengecekan jika sedang cons juga 0
                            else if($dk_sedangC == 0){
                                if($value->cons=="sedang"){
                                    $hasilInferensi->forget($key);
                                }
                            }
                            else if($value->cons == "rendah"){
                                $value->cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $value->cons = $dk_sedangC;
                            }
                            //pengecekan terhadap neuro rendah
                            if($dk_rendahN == 0){
                                if($value->neuro == "rendah"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->neuro = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi cons juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro sedang
                            else if($dk_sedangN == 0){
                                if($value->neuro == "sedang"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika tinggi neuro juga 0
                                else if($dk_tinggiN == 0){
                                    if($value->neuro=="tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "tinggi"){
                                    $value->neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $value->neuro = $dk_rendahN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                     //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                            //pengecekan terhadap neuro tinggi
                            else if($dk_tinggiN == 0){
                                if($value->neuro == "tinggi"){
                                    $hasilInferensi->forget($key);
                                }
                                //pengecekan jika rendah neuro juga 0
                                else if($dk_rendahN == 0){
                                    if($value->neuro=="rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                //pengecekan jika sedang neuro juga 0
                                else if($dk_sedangN == 0){
                                    if($value->neuro=="sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                }
                                else if($value->neuro == "rendah"){
                                    $value->cons = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $value->cons = $dk_sedangN;
                                }
                                //pengecekan terhadap open rendah
                                if($dk_rendahO == 0){
                                    if($value->open == "rendah"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open sedang
                                else if($dk_sedangO == 0){
                                    if($value->open == "sedang"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika tinggi open juga 0
                                    else if($dk_tinggiO == 0){
                                        if($value->open=="tinggi"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $value->open = $dk_tinggiO;
                                    }
                                }
                                //pengecekan terhadap open tinggi
                                else if($dk_tinggiO == 0){
                                    if($value->open == "tinggi"){
                                        $hasilInferensi->forget($key);
                                    }
                                    //pengecekan jika sedang open juga 0
                                    else if($dk_sedangO == 0){
                                        if($value->open=="sedang"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    //pengecekan jika rendah open juga 0
                                    else if($dk_rendahO == 0){
                                        if($value->open=="rendah"){
                                            $hasilInferensi->forget($key);
                                        }
                                    }
                                    else if($value->open == "sedang"){
                                        $value->open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $value->open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                }
            }

            //cek if 1 extra
            if($dk_tinggiE == 1){
                if ($value->extra == "tinggi")
                $value->extra = 1;
            }
            else if($dk_sedangE == 1){
                if ($value->extra == "sedang")
                $value->extra = 1;
            }
            else if($dk_rendahE == 1){
                if ($value->extra == "rendah")
                $value->extra = 1;
            }

            //cek if 1 agree
            if($dk_tinggiA == 1){
                if ($value->agree == "tinggi")
                $value->agree = 1;
            }
            else if($dk_sedangA == 1){
                if ($value->agree == "sedang")
                $value->agree = 1;
            }
            else if($dk_rendahA == 1){
                if ($value->agree == "rendah")
                $value->agree = 1;
            }

            //cek if cons
            if($dk_tinggiC == 1){
                if ($value->cons == "tinggi")
                $value->cons = 1;
            }
            else if($dk_sedangC == 1){
                if ($value->cons == "sedang")
                $value->cons = 1;
            }
            else if($dk_rendahC == 1){
                if ($value->cons == "rendah")
                $value->cons = 1;
            }

            //cek if neuro
            if($dk_tinggiN == 1){
                if ($value->neuro == "tinggi")
                $value->neuro = 1;
            }
            else if($dk_sedangN == 1){
                if ($value->neuro == "sedang")
                $value->neuro = 1;
            }
            else if($dk_rendahN == 1){
                if ($value->neuro == "rendah")
                $value->neuro = 1;
            }

            //cek if open
            if($dk_tinggiO == 1){
                if ($value->open == "tinggi")
                $value->open = 1;
            }
            else if($dk_sedangO == 1){
                if ($value->open == "sedang")
                $value->open = 1;
            }
            else if($dk_rendahO == 1){
                if ($value->open == "rendah")
                $value->open = 1;
            }

            $array = [];

            $value = $value->open;
            array_push($array, $value);

            //for($i = 0; $i<count($hasilInferensi); $i++){
                // foreach($hasilInferensi as $key => $value){   
                //     $min = array("extra"=>$value->extra, "agree"=>$value->agree, "cons"=>$value->cons,
                //     "neuro"=>$value->neuro, "open"=>$value->open, "rekom"=>$value->rekomendasi_idkado);
                
                //     arsort($min);
                //     foreach($min as $key => $value){
                //         $urut = $key . " " . $value;
                //     }
                // }   
            //}
            //$tes = $value->extra;
            
            foreach($hasilInferensi as $key => $value){
                $extra = $value->extra;
                $agree = $value->agree;
                $cons = $value->cons;
                $neuro = $value->neuro;
                $open = $value->open;

                if($extra < $agree){
                    if($extra < $cons){
                        if($extra < $neuro){
                            if($extra < $open){
                                $value->min = $extra;
                            }
                            else if ($extra > $open){
                                $value->min = $open;
                            }
                        }
                        else if($extra > $neuro){
                            if($neuro < $open){
                                $value->min = $neuro;
                            }
                            if($neuro > $open){
                                $value->min = $open;
                            }
                        }
                    }
                    else if($extra > $cons){
                        if($cons < $neuro){
                            if ($cons < $open){
                                $value->min = $cons;
                            }
                            else if ($cons > $open)
                            {
                                $value->min = $open;
                            }
                        }
                        else if($cons > $neuro){
                            if ($neuro < $open){
                                $value->min = $neuro;
                            }
                            else if ($neuro > $open){
                                $value->min = $open;
                            }
                        }
                    }
                }
                else if($extra > $agree){
                    if($agree < $cons){
                        if($agree < $neuro){
                            if($agree < $open){
                                $value->min = $agree;
                            }
                            else if($agree> $open){
                                $value->min = $open;
                            }
                        }
                        else if ($agree > $neuro){
                            if($neuro < $open){
                                $value->min = $neuro;
                            }
                            else {
                                $value->min = $open;
                            }
                        }
                    }
                    else if($agree > $cons){
                        if($cons < $neuro ){
                            if($cons < $open){
                                $value->min = $cons;
                            }
                            else if($cons > $open){
                                $value->min = $open;
                            }
                        }
                    }
                } 
            }

            //DEFUZZIFIKASI OUTPUT SETIAP ATURAN INFERENSI
            $crispOutputE = 0;
            $crispOutputA = 0;
            $crispOutputC = 0;
            $crispOutputN = 0;
            $crispOutputO = 0;

            foreach($hasilInferensi as $key => $values){

                $extra = is_numeric($value->extra);
                $agree = is_numeric($value->agree);
                $cons = is_numeric($value->cons);
                $neuro = is_numeric($value->neuro);
                $open = is_numeric($value->open);

                //ambil extra
                if($dk_rendahE == $value->extra){
                    $crispOutputE = ($extra) * $cExtra;
                }
                else if ($dk_sedangE == $value->agree){
                    $crispOutputE = ($extra) * $cExtra;
                }
                else if ($dk_tinggiE == $value->agree){
                    $crispOutputE = ($extra) * $cExtra;
                }

                //ambil agree
                if($dk_rendahA == $value->agree){
                    $crispOutputA = ($agree) * $cAgree;
                    $value->output = $crispOutputA;
                }
                else if ($dk_sedangA == $value->agree){
                    $crispOutputA = ($agree) * $cAgree;
                    $value->output = $crispOutputA;
                }
                else if ($dk_tinggiA == $value->agree){
                    $crispOutputA = ($agree) * $cAgree;
                    $value->output = $crispOutputA;
                }

                //ambil cons
                if($dk_rendahC == $value->agree){
                    $crispOutputC = ($cons) * $cCons;
                }
                else if ($dk_sedangC == $value->agree){
                    $crispOutputC = ($cons) * $cCons;
                }
                else if ($dk_tinggiC == $value->agree){
                    $crispOutputC = ($cons) * $cCons;
                }

                //ambil neuro
                if($dk_rendahN == $value->neuro){
                    $crispOutputN = ($neuro) * $cNeuro;
                }
                else if ($dk_sedangA == $value->agree){
                    $crispOutputN = ($neuro) * $cNeuro;
                }
                else if ($dk_tinggiA == $value->agree){
                    $crispOutputN = ($neuro) * $cNeuro;
                }

                //ambil open
                if($dk_rendahO == $value->open){
                    $crispOutputO = ($open) * $cOpen;
                }
                else if ($dk_sedangO == $value->open){
                    $crispOutputO = ($open) * $cOpen;
                }
                else if ($dk_tinggiO == $value->agree){
                    $crispOutputO = ($open) * $cOpen;
                }

                $crispOutputHit = ($crispOutputE + $crispOutputA + $crispOutputC + $crispOutputN + $crispOutputO) 
                                    / ($cExtra + $cAgree + $cCons + $cNeuro + $cAgree);
                
                // $value->output = $crispOutputHit;
            }

        }

        return response()->json($hasilInferensi);

        //return response()->json($crispOutputHit);


        //return response()->json([$dk_rendahO, $dk_sedangO, $dk_tinggiO]);
    }
}