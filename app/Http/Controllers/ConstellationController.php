<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constellation;
use DB;

class ConstellationController extends Controller
{
    public function daily_importData(){
        DB::table('constellations')->truncate();
        for($index = 0; $index < 12; $index++){            
            $url = 'http://astro.click108.com.tw/daily_'.$index.'.php?iAstro='.$index;
            $html = file_get_contents( $url );
            preg_match("'<div class=\"TODAY_CONTENT\">(.*?)</div>'si", $html, $data);
            preg_match("'<h3>(.*?)</h3>'si", $data[0], $name);
            preg_match_all("'<p(.*?)</p>'si", $data[0], $list);
            $insert = Constellation::create(['datadate'     => date('Y-m-d'),
                                            'name'          => str_replace('解析', '', str_replace('今日', '', $name[1])),
                                            'overall_score' => substr_count($list[0][0], '★', 0),
                                            'overall_desc'  => str_replace('>', '', $list[1][1]),
                                            'love_score'    => substr_count($list[0][2], '★', 0),
                                            'love_desc'     => str_replace('>', '', $list[1][3]),
                                            'cause_score'   => substr_count($list[0][4], '★', 0),
                                            'cause_desc'    => str_replace('>', '', $list[1][5]),
                                            'forune_score'  => substr_count($list[0][6], '★', 0),
                                            'forune_desc'   => str_replace('>', '', $list[1][7])]);
        }
    }
}
