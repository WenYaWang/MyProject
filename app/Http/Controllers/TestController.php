<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class TestController extends Controller
{
    public function getData(){
        for($index = 0; $index < 12; $index++){            
            $url = 'http://astro.click108.com.tw/daily_'.$index.'.php?iAstro='.$index;
            $html = file_get_contents( $url );
            preg_match("'<div class=\"TODAY_CONTENT\">(.*?)</div>'si", $html, $data);
            preg_match("'<h3>(.*?)</h3>'si", $data[0], $name);
            preg_match_all("'<p(.*?)</p>'si", $data[0], $list);
            
            break;
        }        
    }
}
