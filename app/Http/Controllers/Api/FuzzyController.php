<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;

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
        $dk_sedangC = 0.0;
        $dk_tinggiC = 0.0;

        if ($cCons<=8){
            $dk_rendahC = 1.0;
            $dk_sedangC = 0.0;
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

        $kumpulan_nilai = [];
        $arr_zAtas = [];
        $arr_zMin = [];
        $arr_output = [];
        $array_sumDef = [];
        
        $array_nilai = [];

        $array_min = [];

        $array_selisih = [];
        $rekom = 0;

        $neuro = 0;
        $open = 0;
        $cons = 0;
        $extra = 0;
        $agree = 0;


        $size = sizeof($hasilInferensi);
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
                    $extra = $dk_sedangE;
                }
                else if($value->extra == "tinggi"){
                    $extra = $dk_tinggiE;
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
                        $agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_tinggiN;
                                
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
                                
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $cons = $dk_sedangC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $agree = $dk_sedangA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                    $extra = $dk_rendahE;
                }
                else if($value->extra == "tinggi"){
                    $extra = $dk_tinggiE;
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
                        $agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $cons = $dk_sedangC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $agree = $dk_sedangA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                    $extra = $dk_sedangE;
                }
                else if($value->extra == "rendah"){
                    $extra = $dk_rendahE;
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
                        $agree = $dk_sedangA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_sedangN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "tinggi"){
                                $neuro = $dk_tinggiN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "sedang"){
                            $cons = $dk_sedangC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "sedang"){
                                    $open = $dk_sedangO;
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
                                    $open = $dk_tinggiO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "tinggi"){
                        $agree = $dk_tinggiA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                        $agree = $dk_rendahA;
                    }
                    else if($value->agree == "sedang"){
                        $agree = $dk_sedangA;
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
                            $cons = $dk_sedangC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                                //$neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
                                //$neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_tinggiN;
                                //$neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "rendah"){
                                $neuro = $dk_rendahN;
                                //$neuro = $dk_rendahN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                $neuro = $dk_rendahN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                            $cons = $dk_rendahC;
                            //$cons = $dk_rendahC;
                        }
                        else if($value->cons == "tinggi"){
                            $cons = $dk_tinggiC;
                            //$cons = $dk_tinggiC;
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
                                $neuro = $dk_tinggiN;
                                //$neuro = $dk_tinggiN;
                            }
                            else if($value->neuro == "sedang"){
                                $neuro = $dk_sedangN;
                                //$neuro = $dk_sedangN;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_rendahO;
                                }
                                else if($value->open == "tinggi"){
                                    $open = $dk_tinggiO;
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
                                    $open = $dk_sedangO;
                                }
                                else if($value->open == "rendah"){
                                    $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                    //$neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
                                    //$neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                $cons = $dk_rendahC;
                            }
                            else if($value->cons == "sedang"){
                                $cons = $dk_sedangC;
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
                                    $neuro = $dk_tinggiN;
                                    //$neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
                                    //$neuro = $dk_sedangN;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "sedang"){
                                        $open = $dk_sedangO;
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
                                        $open = $dk_tinggiO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_tinggiN;
                                }
                                else if($value->neuro == "rendah"){
                                    $neuro = $dk_rendahN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
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
                                    $neuro = $dk_rendahN;
                                }
                                else if($value->neuro == "sedang"){
                                    $neuro = $dk_sedangN;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_rendahO;
                                    }
                                    else if($value->open == "tinggi"){
                                        $open = $dk_tinggiO;
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
                                        $open = $dk_sedangO;
                                    }
                                    else if($value->open == "rendah"){
                                        $open = $dk_rendahO;
                                    }
                                }
                            }
                        }
                }
            }

            //cek if 1 extra
            if($dk_tinggiE == 1){
                if ($value->extra == "tinggi")
                $extra = 1;
            }
            else if($dk_sedangE == 1){
                if ($value->extra == "sedang")
                $extra = 1;
            }
            else if($dk_rendahE == 1){
                if ($value->extra == "rendah")
                $extra = 1;
            }

            //cek if 1 agree
            if($dk_tinggiA == 1){
                if ($value->agree == "tinggi")
                $agree = 1;
            }
            else if($dk_sedangA == 1){
                if ($value->agree == "sedang")
                $agree = 1;
            }
            else if($dk_rendahA == 1){
                if ($value->agree == "rendah")
                $agree = 1;
            }

            //cek if cons
            if($dk_tinggiC == 1){
                if ($value->cons == "tinggi")
                $cons = 1;
            }
            else if($dk_sedangC == 1){
                if ($value->cons == "sedang")
                $cons = 1;
            }
            else if($dk_rendahC == 1){
                if ($value->cons == "rendah")
                $cons = 1;
            }

            //cek if neuro
            if($dk_tinggiN == 1){
                if ($value->neuro == "tinggi")
                $neuro = 1;
            }
            else if($dk_sedangN == 1){
                if ($value->neuro == "sedang")
                $neuro = 1;
            }
            else if($dk_rendahN == 1){
                if ($value->neuro == "rendah")
                $neuro = 1;
            }

            //cek if open
            if($dk_tinggiO == 1){
                if ($value->open == "tinggi")
                $open = 1;
            }
            else if($dk_sedangO == 1){
                if ($value->open == "sedang")
                $open = 1;
            }
            else if($dk_rendahO == 1){
                if ($value->open == "rendah")
                $open = 1;
            }
        }

        foreach($hasilInferensi as $key => $value)
        {
            

            $_extra = $value->extra;
            $_agree = $value->agree;
            $_cons = $value->cons;
            $_neuro = $value->neuro;
            $_open = $value->open;

            if($_extra == "rendah"){
                $ex = $dk_rendahE;
            }
            else if($_extra == "sedang"){
                $ex = $dk_sedangE;
            }
            else if($_extra == "tinggi"){
                $ex = $dk_tinggiE;
            }

            if($_agree == "rendah"){
                $ag = $dk_rendahA;
            }
            else if($_agree == "sedang"){
                $ag = $dk_sedangA;
            }
            else if($_agree == "tinggi"){
                $ag = $dk_tinggiA;
            }

            if($_cons == "rendah"){
                $co = $dk_rendahC;
            }
            else if($_cons == "sedang"){
                $co = $dk_sedangC;
            }
            else if($_cons == "tinggi"){
                $co = $dk_tinggiC;
            }

            if($_neuro == "rendah"){
                $ne = $dk_rendahN;
            }
            else if($_neuro == "sedang"){
                $ne = $dk_sedangN;
            }
            else if($_neuro == "tinggi"){
                $ne = $dk_tinggiN;
            }

            if($_open == "rendah"){
                $op = $dk_rendahO;
            }
            else if($_open == "sedang"){
                $op = $dk_sedangO;
            }
            else if($_open == "tinggi"){
                $op = $dk_tinggiO;
            }

            //masukkan hasil sistem inferensi ke dalam array
            $array_nilai["id"]= $value->idaturanB5;
            $array_nilai["extra"]= $ex;
            $array_nilai["agree"]= $ag;
            $array_nilai["cons"]= $co;
            $array_nilai["neuro"]= $ne;
            $array_nilai["open"] = $op;
            $array_nilai["rekomendasi"] = $value->rekomendasi_idkado;

            //ambil nilai minimum dari setiap aturan inferensi dan masukkan ke dalam array

            if( $array_nilai["extra"] < $array_nilai["agree"]){
                if($array_nilai["extra"] < $array_nilai["cons"]){
                    if($array_nilai["extra"] < $array_nilai["neuro"]){
                        if($array_nilai["extra"]  < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["extra"];
                            array_push($array_min, $array_nilai["extra"]);
                        }
                        else if ($array_nilai["extra"] > $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                    else if($array_nilai["extra"] > $array_nilai["neuro"]){
                        if($array_nilai["neuro"] < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["neuro"];
                            array_push($array_min, $array_nilai["neuro"]);
                        }
                        if($array_nilai["neuro"] > $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                }
                else if($array_nilai["extra"] > $array_nilai["cons"]){
                    if($array_nilai["cons"] < $array_nilai["neuro"]){
                        if ($array_nilai["cons"] < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["cons"];
                            array_push($array_min, $array_nilai["cons"]);
                        }
                        else if ($array_nilai["cons"] > $array_nilai["open"])
                        {
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                    else if($array_nilai["cons"] > $array_nilai["neuro"]){
                        if ($array_nilai["neuro"] < $array_nilai["neuro"]){
                            $array_nilai["min"] = $array_nilai["neuro"];
                            array_push($array_min, $array_nilai["neuro"]);
                        }
                        else if ($array_nilai["neuro"] > $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                }
            }
            else if($array_nilai["extra"] > $array_nilai["agree"]){
                if($array_nilai["agree"] < $array_nilai["cons"]){
                    if($array_nilai["agree"] < $array_nilai["neuro"]){
                        if($array_nilai["agree"] < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["agree"];
                            array_push($array_min, $array_nilai["agree"]);
                        }
                        else if($array_nilai["agree"]> $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                    else if ($array_nilai["agree"] > $array_nilai["neuro"]){
                        if($array_nilai["neuro"] < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["neuro"];
                            array_push($array_min, $array_nilai["neuro"]);
                        }
                        else {
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                }
                else if($array_nilai["agree"] > $array_nilai["cons"]){
                    if($array_nilai["cons"] < $array_nilai["neuro"] ){
                        if($array_nilai["cons"] < $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["cons"];
                            array_push($array_min, $array_nilai["cons"]);
                        }
                        else if($array_nilai["cons"] > $array_nilai["open"]){
                            $array_nilai["min"] = $array_nilai["open"];
                            array_push($array_min, $array_nilai["open"]);
                        }
                    }
                }
            }

            
            // //tampung keseluruhan array data
            array_push($kumpulan_nilai, $array_nilai);

            $cZ =0;

            //Defuzzifikasi Pertama (Dicocokkan dengan fungsi keanggotaan output)
            $cZ = (($array_nilai["extra"] * $cExtra) + ($array_nilai["agree"] * $cAgree) 
                    + ($array_nilai["open"] * $cOpen) + ($array_nilai["neuro"] * $cNeuro) + ($array_nilai["cons"] * $cCons))/
                    ($array_nilai["extra"] + $array_nilai["agree"] + $array_nilai["open"] +$array_nilai["neuro"] + $array_nilai["cons"]);
            if ($cZ >= 0 & $cZ <= 30){
                $output = "rendah";
                $z = 30-($array_nilai["min"]*(30-0));

                //tampung z setiap aturan inferensi
                $array_nilai["z"] = $z;
            }
            else if ($cZ >= 30 & $cZ <= 70){
                $output = "sedang";
                $z = 70-($array_nilai["min"]*(70-30));

                //tampung z setiap aturan inferensi
                $array_nilai["z"] = $z;
            }
            else if ($cZ >= 70 & $cZ <= 100){
                $output = "tinggi";
                $z = 100-($array_nilai["min"]*(100-70));

                //tampung z setiap aturan inferensi
                $array_nilai["z"] = $z;
            }
            
            array_push($arr_output, $z);
            

            //DEFUZZIFIKASI
            //tampung nilai z bagian pembilang dari setiap rules
            $zPembilang = $z * $array_nilai["min"];

            //menjumlahkan seluruh nilai min (penyebut)
            $total_min = array_sum($array_min);

            //masukkan pembilang ke dalam array
            array_push($array_sumDef, $zPembilang);

            //jumlahkan seluruh data array
            $sumZ = array_sum($array_sumDef);

            $def = 0;

            //Implementasi rumus defuzzifikasi 
            if($total_min != 0){
                $def = $sumZ/$total_min;
            }

            //Cocokkan hasil defuzzifikasi dengan z masing2 rules (dengan cara mencari selisih)
            $selisih = 0;
            if($array_nilai["z"] < $def){
                $selisih = $def - $array_nilai["z"];
            }
            else if ($array_nilai["z"] > $def){
                $selisih = $array_nilai["z"] - $def;
            }
            $array_nilai["selisih"] = $selisih;
            array_push($array_selisih, $selisih);
            $min_selisih = min($array_selisih);

            if($array_nilai["selisih"] == $min_selisih){
                $rekom = $array_nilai["rekomendasi"];
                $idaturan = $array_nilai["id"];
            }
        }
        $nama_kat = DB::table('kategori_kado')
                        ->select('nama')
                        ->where('idkategori', $rekom)
                        ->get();
        

        return response()->json($nama_kat);

        //return response()->json([$dk_rendahN, $dk_sedangN, $dk_tinggiN]);
    }
}