<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
   
    public function test(Request $request)
    {
        $post = $request->except('_token');
        if($post){
            $cek = array();
            $s = 0;
            $data['data'] = array(
                'a'=>$post['a'],
                'b'=>$post['b'],
            );
            
            $post['a'] = strtoupper($post['a']);
            $post['b'] = strtoupper($post['b']);
            $a = str_split(str_replace(' ', '', $post['a']), 1);
            $b = str_split(str_replace(' ', '', $post['b']), 1);
            $count = count($a);
            $unikA = array_unique($a);
            $unikb = array_unique($b);
            $jml = 0;
            foreach ($unikb as $value) {
                foreach ($unikA as $va) {
                    if($value == $va){
                        $cek[$s] = $value;
                        $s++;
                    }
                }
            }
            
            foreach ($cek as $value) {
                foreach ($a as $va) {
                    if($value == $va){
                        $jml++;
                    }
                }
            }
            $bot = 0;
            $bobot = array();
            foreach ($unikA as $value) {
                $j = 0;
                foreach ($a as $va) {
                    if($value == $va){
                        $j++;
                    }
                }
                $bobot[$bot]=array(
                    'abjad'=>$value,
                    'jml'=>$j
                );
                $bot++;
            } 
          
            $data['data']['persen'] = ($jml/$count*100).'%';
            $data['data']['bobot'] = $bobot;
            return view('test',$data);
        }
        return view('test');
    }
}
