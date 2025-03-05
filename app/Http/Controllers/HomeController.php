<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    private function mergeSortArray($a,$b){
		$countA = count($a);
        $countB = count($b);
        $d = 0;
        $e = [];
        $f = 0;
        if($countA>$countB){
            $c = $countA;
        }else{
            
            $c = $countB;
        }
        for ($x=0; $x < $c; $x++){
            if(isset($a[$x])&&isset($b[$x])){
                if($a[$x]>$b[$x]){
                    if($b[$x]<$f){
                        $e[$d-1]=$b[$x];
                        $d++;
                    }else{
                        $e[$d] = $b[$x];
                        $d++;
                    }
                    $e[$d] = $a[$x];
                    $f = $a[$x];
                    $d++;
                    
                 }else{
                    if($a[$x]<$f){
                        $e[$d-1]=$a[$x];
                        $d++;
                    }else{
                        $e[$d] = $a[$x];
                        $d++;
                        
                    }
                    $e[$d] = $b[$x];
                    $d++;  
                    $f = $b[$x];
                 }
            }
			 
		}
        return $e;
	}
	private function getMissingData($a,$b){
		$countA = count($a);
        $countB = count($b);
        $d = 0;
        $e = [];
        $f = 0;
        $h = [];
        $g = 0;
       
        if($countA>$countB){
            $c = $countA;
        }else{
            
            $c = $countB;
        }
        for ($x=0; $x < $c; $x++){
            if(isset($a[$x])&&isset($b[$x])){
                if($a[$x]>$b[$x]){
                    if($b[$x]<$f){
                        $h[$g] =  $e[$d-1];
                        $e[$d-1]=$b[$x];
                        $d++;
                        $g++;
                    }else{
                        $e[$d] = $b[$x];
                        $d++;
                    }
                    $e[$d] = $a[$x];
                    $f = $a[$x];
                    $d++;
                    
                 }else{
                    if($a[$x]<$f){
                        $h[$g] =  $e[$d-1];
                        $e[$d-1]=$a[$x];
                        $d++;
                        $g++;
                    }else{
                        $e[$d] = $a[$x];
                        $d++;
                        
                    }
                    $e[$d] = $b[$x];
                    $d++;  
                    $f = $b[$x];
                 }
            }else{
                if(isset($a[$x])){
                    if(isset($h[$g-1])){
                        if($h[$g-1]>$a[$x]){
                            $h[$g] = $h[$g-1];
                            $h[$g-1] = $a[$x];
                        }else{
                            $h[$g] = $a[$x];
                        } 
                    }else{
                        $h[$g] = $a[$x];
                    }
                   
                }else{
                     if(isset($h[$g-1])){
                        if($h[$g-1]>$b[$x]){
                            $h[$g] = $h[$g-1];
                            $h[$g-1] = $b[$x];
                        }else{
                            $h[$g] = $b[$x];
                        } 
                     }else{
                          $h[$g] = $b[$x];
                     }
                   
                }
                $g++;
            }
			 
        }
        return $h;
	}
	private function insertMissingData($c,$i){
        $d = array();
        $j = 0;
            foreach ($i as $key => $value) {
                $y = 0;
                foreach ($c as $keys => $values) {
                        if($y == 0){
                            if($value>$values){
                                $d[$j]= $values;
                                $j++;
                            }else{
                                $d[$j]= $value;
                                $j++;
                                $d[$j]= $values;
                                $j++;
                                $y = 1;
                            }
                        }else{
                            $d[$j]= $values;
                        }

                }
                $c = $d;
                $j = 0;
            }
        return $d;
	}
    public function index(Request $request)
    {
        $post = $request->except('_token');
        if($post){
            $a = array();
            $ai = 0;
            $b = array();
            $bi = 0;
            foreach ($post['array'] as $value) {
                if(isset($value['a'])){
                    $a[$ai] = $value['a'];
                    $ai++;
                }
                if(isset($value['b'])){
                    $b[$bi] = $value['b'];
                    $bi++;
                }
            }
            $c = $this->mergeSortArray($a, $b);
            $i = $this->getMissingData($a, $b);
            $d = $this->insertMissingData($c, $i);
            $data['data'] = array(
                'a'=>implode(',', $a),
                'b'=>implode(',', $b),
                'sortArray'=>implode(',', $c),
                'missingData'=>implode(',', $i),
                'insertMissingData'=>implode(',', $d)
            );
              return view('home',$data);
        }
        return view('home');
    }
   
}
