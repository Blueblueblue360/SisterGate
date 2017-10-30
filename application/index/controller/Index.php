<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        $question = M('mbti')->select();
		$this->assign('question',$question);
		return $this->fetch();
    }
	public function deal()
	{
		$a = input('post.a/a');
		$b = input('post.b/a');
		$E =0;$I =0;$S =0;$N =0;$T =0;$F =0;$J =0;$P =0;	
		for($i=1;$i<49;$i= $i+4){
			$E = $E + $a[$i];
			$I = $I + $b[$i];
			
			$S = $S + $a[$i+1];
			$N = $N + $b[$i+1];
			
			$T = $T + $a[$i+2];
			$F = $F + $b[$i+2];
			
			$J = $J + $a[$i+3];
			$P = $P + $b[$i+3];
		}
		$result='';
		if($E > $I){
			$result .='E';
		}else{
			$result .='I';
		}
		if($S > $N){
			$result .='S';
		}else{
			$result .='N';
		}
		if($T > $F){
			$result .='T';
		}else{
			$result .='F';
		}
		if($J > $P){
			$result .='J';
		}else{
			$result .='P';
		}
		
		$explain = M('mydb.mbti_answer')->where('lx',$result)->find();
		return $explain['explain'];		
	}
}
