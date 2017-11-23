<?php
namespace app\psytest\controller;
use think\Controller;
class Pf extends Controller
{
    public function index()
    {
		return $this->fetch();
    }
	public function question()
	{
		$question = M('pf')->select();
		$this->assign('question',$question);
		return $this->fetch();
	}
	public function deal()
	{
		$score = input('post.score/a');
		$sex = input('post.sex');//1是男，2是女
		$A =0;$B =0;$C =0;$E =0;$F =0;$G =0;$H =0;$I =0;$L =0;$M =0;$N =0;$O =0;$Q1 =0;$Q2 =0;$Q3 =0;$Q4 =0;		
		//A:3.26.27.51.52.76.101.126.151.176.   // 3,52,101,126,176
		//B:28.53.54.77.78.102.103.127.128.152.153.177.178.180.	
			//180
			   ///28,53,54,77,78,102,103,127,128,152,153,,177,178

		//C:4.5.29.30.55.79.80.104.105.129.130.154.179.	   
			//4,30,55,104,105,129,130,179
		//E:6.7.31.32.56.57.81.106.131.155.156.180.181.	
			//7,56,131,155,156,180,181
		//F:8.33.58.82.83.107.108.132.133.157.158.182.183	
			//33,58,107,108,132,133,157,158,182,183
		//G:9.34.59.84.109.134.159.160.184.185
			//59,109,134,160,184,185
		//H:10.35.36.60.61.85.86.110.111.135.136.161.186. 
			//10,36,110,111,136,186
		//I:11.12.37.62.87.112.137.138.162.163.
			//37,112,138,163
		//L:13.38.63.64.88.89.113.114.139.164 
			//13,38,88,113,114,164
		//M:14.15.39.40.65.90.91.115.116.140.141.165.166	
			//39,40,65,91,115,116,140
		//N:16.17.41.42.66.67.92.117.142.167
			//17,42,117,142,167
		//O:18.19.43.44.68.69.93.94.118.119.143.144.168. 
			//18,43,69,118,119,143,168
		//Q1:20.21.45.46.70.95.120.145.169.170 
			//20,21,46,70,145,169
		//Q2:22.47.71.72.96.97.121.122.146.171  
			//47,71,72,146,171
		//Q3:23.24.48.73.98.123.147.148.172.173  
			//48,73,98,147,148,173
		//Q4:25.49.50.74.75.99.100.124.125.149.150.174.175 
			//25,49,50,74,99,100,124,149,150,174,
		$process_arr = array(3,52,101,126,176,180,4,30,55,104,105,129,130,179,7,56,131,155,156,180,181,33,58,107,108,132,133,
							 157,158,182,183,59,109,134,160,184,185,10,36,110,111,136,186,37,112,138,163,13,38,88,113,114,164,
							 39,40,65,91,115,116,140,17,42,117,142,167,18,43,69,118,119,143,168,20,21,46,70,145,169,47,71,72,146,171,
							 48,73,98,147,148,173,25,49,50,74,99,100,124,149,150,174);
		foreach($score as $k=>$v){
			if(in_array($v,$process_arr)){
				$score[$k] = abs($v-2);
			}
		}
		$process_arr2 =array(28=>'1',53=>'1',54=>'1',77=>'2',78=>'1',102=>'2',103=>'1',127=>'2',128=>'1',152=>'1',153=>'2',177=>'0',178=>'0');
		foreach($process_arr2 as $k=>$v){
			$score[$k] = ($score[$k]== $v?1:0);
		}
	
		$A += $score[3] +$score[52] +$score[101] +$score[126] +$score[176] +$score[26] + $score[27] + $score[51] + $score[76] + $score[151];
		$B += $score[180] +$score[28] +$score[53] +$score[54] +$score[77] +$score[78] +$score[102] +$score[103] +$score[127] +$score[128] +$score[152] +$score[153] +$score[177] +$score[178];
		$C += $score[4] +$score[30] +$score[55] +$score[104] +$score[105] +$score[129] +$score[130] +$score[179] +$score[5] +$score[29] +$score[79] +$score[80] +$score[154];
		$E += $score[7] +$score[56] +$score[131] +$score[155] +$score[156] +$score[180] +$score[181] +$score[6] +$score[31] +$score[32] +$score[57] +$score[81] +$score[106];	
		$F += $score[8] +$score[82] +$score[83] +$score[33] +$score[58] +$score[107] +$score[108] +$score[132] +$score[133] +$score[157] +$score[158] +$score[182] +$score[183];
		$G += $score[9] +$score[34] +$score[84] +$score[159] +$score[59] +$score[109] +$score[134] +$score[160] +$score[184] +$score[185];
		$H += $score[35] +$score[60] +$score[61] +$score[85] +$score[86] +$score[135] +$score[161] +$score[10] +$score[36] +$score[110] +$score[111] +$score[136] +$score[186];
		$I += $score[11] +$score[12] +$score[62] +$score[87] +$score[137] +$score[162] +$score[37] +$score[112] +$score[138] +$score[163];
		$L += $score[63] +$score[64] +$score[89] +$score[139] +$score[13] +$score[38] +$score[88] +$score[113] +$score[114] +$score[164];
		$M += $score[14] +$score[15] +$score[90] +$score[141] +$score[165] +$score[166] +$score[39] +$score[40] +$score[65] +$score[91] +$score[115] +$score[116] +$score[140];
		$N += $score[16] +$score[41] +$score[66] +$score[67] +$score[92] +$score[17] +$score[42] +$score[117] +$score[142] +$score[167];
		$O += $score[19] +$score[44] +$score[68] +$score[93] +$score[94] +$score[144] +$score[18] +$score[43] +$score[69] +$score[118] +$score[119] +$score[143] +$score[168];
		$Q1+= $score[45] +$score[95] +$score[120] +$score[170] +$score[20] +$score[21] +$score[46] +$score[70] +$score[145] +$score[169];
		$Q2+= $score[22] +$score[96] +$score[97] +$score[121] +$score[122] +$score[47] +$score[71] +$score[72] +$score[146] +$score[171];
		$Q3+= $score[23] +$score[24] +$score[123] +$score[172] +$score[48] +$score[73] +$score[98] +$score[147] +$score[148] +$score[173];
		$Q4+= $score[75] +$score[125] +$score[175] +$score[25] +$score[49] +$score[50] +$score[74] +$score[99] +$score[100] +$score[124] +$score[149] +$score[150] +$score[174];

		if($sex == 1){
			$A = deal_man_A($A);
			$B = deal_B($B);
			$C = deal_man_C($C);
			$E = deal_man_E($E);
			$F = deal_man_F($F);
			$G = deal_man_G($G);
			$H = deal_man_H($H);
			$I = deal_man_I($I);
			$L = deal_man_L($L);
			$M = deal_man_M($M);
			$N = deal_man_N($N);
			$O = deal_man_O($O);
			$Q1 = deal_man_Q1($Q1);
			$Q2 = deal_man_Q2($Q2);
			$Q3 = deal_man_Q3($Q3);
			$Q4 = deal_man_Q4($Q4);
		}else if($sex == 2){
			$A = deal_woman_A($A);
			$B = deal_B($B);
			$C = deal_woman_C($C);
			$E = deal_woman_E($E);
			$F = deal_woman_F($F);
			$G = deal_woman_G($G);
			$H = deal_woman_H($H);
			$I = deal_woman_I($I);
			$L = deal_woman_L($L);
			$M = deal_woman_M($M);
			$N = deal_woman_N($N);
			$O = deal_woman_O($O);
			$Q1 = deal_woman_Q1($Q1);
			$Q2 = deal_woman_Q2($Q2);
			$Q3 = deal_woman_Q3($Q3);
			$Q4 = deal_woman_Q4($Q4);


			/*$arr = array($A,$B,$C,$E,$F,$G,$H,$I,$L,$M,$N,$O,$Q1,$Q3,$Q4);
			$deal = array();
			foreach($arr as $k=>$v){
				$arr[$k]=deal_woman_($v);
			}
			*/
		}else{
			return '未知';
		}

	}
	public function analyze()
	{	
		//$lx = input('get.lx');
		//$result = M('mydb.mbti_answer')->where('lx',$lx)->find();
		$this->assign('result',$result);
		return $this->fetch('result');
	}
	public function deal_man_A($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=2:
				echo 1;
				break;
			case $raw>=3 && $raw<=4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=12:
				echo 6;
				break;
			case $raw>=13 && $raw<=14:
				echo 7;
				break;
			case $raw==15:
				echo 8;
				break;	
			case $raw>=16 && $raw<=17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_B($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw==5:
				echo 2;
				break;
			case $raw==6:
				echo 3;
				break;
			case $raw==7:
				echo 4;
				break;
			case $raw==8:
				echo 5;	
				break;	
			case $raw==9:
				echo 6;
				break;
			case $raw==10:
				echo 7;
				break;
			case $raw==11:
				echo 8;
				break;	
			case $raw==12:
				echo 9;
				break;
			case $raw==13:
				echo 10;
				break;
		}
	}
	public function deal_man_C($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=6:
				echo 1;
				break;
			case $raw>=7 && $raw<=8:
				echo 2;
				break;
			case $raw>=9 && $raw<=10:
				echo 3;
				break;
			case $raw>=11 && $raw<=12:
				echo 4;
				break;
			case $raw>=13 && $raw<=14:
				echo 5;	
				break;	
			case $raw>=15 && $raw<=17:
				echo 6;
				break;
			case $raw>=18 && $raw<=19:
				echo 7;
				break;
			case $raw==20:
				echo 8;
				break;	
			case $raw>=21 && $raw<=22:
				echo 9;
				break;
			case $raw>=23 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_E($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw>=6 && $raw<=7:
				echo 2;
				break;
			case $raw>=8 && $raw<=9:
				echo 3;
				break;
			case $raw>=10 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=13:
				echo 5;	
				break;	
			case $raw>=14 && $raw<=16:
				echo 6;
				break;
			case $raw>=17 && $raw<=18:
				echo 7;
				break;
			case $raw>=19 && $raw<=20:
				echo 8;
				break;	
			case $raw>=21 && $raw<=22:
				echo 9;
				break;
			case $raw>=23 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_F($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=3:
				echo 1;
				break;
			case $raw>=4 && $raw<=6:
				echo 2;
				break;
			case $raw>=7 && $raw<=8:
				echo 3;
				break;
			case $raw>=9 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=13:
				echo 5;	
				break;	
			case $raw>=14 && $raw<=16:
				echo 6;
				break;
			case $raw>=17 && $raw<=19:
				echo 7;
				break;
			case $raw>=20 && $raw<=21:
				echo 8;
				break;	
			case $raw>=22 && $raw<=23:
				echo 9;
				break;
			case $raw>=24 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_G($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw>=5 && $raw<=6:
				echo 2;
				break;
			case $raw>=7 && $raw<=8:
				echo 3;
				break;
			case $raw>=9 && $raw<=10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw>=15 && $raw<=16:
				echo 7;
				break;
			case $raw==17:
				echo 8;
				break;	
			case $raw>=18 && $raw<=19:
				echo 9;
				break;
			case $raw==20:
				echo 10;
				break;
		}
	}
	public function deal_man_H($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=1:
				echo 1;
				break;
			case $raw>=2 && $raw<=3:
				echo 2;
				break;
			case $raw>=4 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=14:
				echo 6;
				break;
			case $raw>=15 && $raw<=17:
				echo 7;
				break;
			case $raw>=18 && $raw<=19:
				echo 8;
				break;	
			case $raw>=20 && $raw<=21:
				echo 9;
				break;
			case $raw>=22 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_I($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=3:
				echo 1;
				break;
			case $raw==4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=12:
				echo 6;
				break;
			case $raw>=13 && $raw<=14:
				echo 7;
				break;
			case $raw==15:
				echo 8;
				break;	
			case $raw>=16 && $raw<=17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_man_L($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=2:
				echo 1;
				break;
			case $raw==3:
				echo 2;
				break;
			case $raw>=4 && $raw<=5:
				echo 3;
				break;
			case $raw>=6 && $raw<=7:
				echo 4;
				break;
			case $raw>=8 && $raw<=9:
				echo 5;	
				break;	
			case $raw>=10 && $raw<=12:
				echo 6;
				break;
			case $raw==13:
				echo 7;
				break;
			case $raw>=14 && $raw<=15:
				echo 8;
				break;	
			case $raw>=16 && $raw<=17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_man_M($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw>=6 && $raw<=7:
				echo 2;
				break;
			case $raw==8:
				echo 3;
				break;
			case $raw>=9 && $raw<=10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw==15:
				echo 7;
				break;
			case $raw>=16 && $raw<=17:
				echo 8;
				break;	
			case $raw==18:
				echo 9;
				break;
			case $raw>=19 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_N($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=2:
				echo 1;
				break;
			case $raw>=3 && $raw<=4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=12:
				echo 6;
				break;
			case $raw>=13 && $raw<=14:
				echo 7;
				break;
			case $raw==15:
				echo 8;
				break;	
			case $raw>=16 && $raw<=17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_man_O($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=1:
				echo 1;
				break;
			case $raw==2:
				echo 2;
				break;
			case $raw==3:
				echo 3;
				break;
			case $raw>=4 && $raw<=5:
				echo 4;
				break;
			case $raw>=6 && $raw<=7:
				echo 5;	
				break;	
			case $raw>=8 && $raw<=10:
				echo 6;
				break;
			case $raw>=11 && $raw<=12:
				echo 7;
				break;
			case $raw>=13 && $raw>=14:
				echo 8;
				break;	
			case $raw>=15 && $raw<=16:
				echo 9;
				break;
			case $raw>=17 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_man_Q1($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw>=6 && $raw<=7:
				echo 2;
				break;
			case $raw>=8 && $raw<=9:
				echo 3;
				break;
			case $raw==10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw==15:
				echo 7;
				break;
			case $raw==16:
				echo 8;
				break;	
			case $raw>=17 && $raw<=18:
				echo 9;
				break;
			case $raw>=19 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_man_Q2($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw==6:
				echo 2;
				break;
			case $raw>=7 && $raw<=8:
				echo 3;
				break;
			case $raw>=9 && $raw<=10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=15:
				echo 6;
				break;
			case $raw>=16:
				echo 7;
				break;
			case $raw>=17 && $raw<=18:
				echo 8;
				break;	
			case $raw==19:
				echo 9;
				break;
			case $raw==20:
				echo 10;
				break;
		}
	}
	public function deal_man_Q3($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw==5:
				echo 2;
				break;
			case $raw>=6 && $raw<=7:
				echo 3;
				break;
			case $raw>=8 && $raw<=9:
				echo 4;
				break;
			case $raw>=10 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=13:
				echo 6;
				break;
			case $raw>=14 && $raw<=15:
				echo 7;
				break;
			case $raw>=16 && $raw<=17:
				echo 8;
				break;	
			case $raw==18:
				echo 9;
				break;
			case $raw>=19 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_man_Q4($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=2:
				echo 1;
				break;
			case $raw>=3 && $raw<=4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=13:
				echo 6;
				break;
			case $raw>=14 && $raw<=15:
				echo 7;
				break;
			case $raw>=16 && $raw<=17:
				echo 8;
				break;	
			case $raw>=18 && $raw<=19:
				echo 9;
				break;
			case $raw>=20 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_A($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=2:
				echo 1;
				break;
			case $raw>=3 && $raw<=4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=12:
				echo 6;
				break;
			case $raw>=13 && $raw<=14:
				echo 7;
				break;
			case $raw>=15 && $raw<=16:
				echo 8;
				break;	
			case $raw==17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_C($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw>=6 && $raw<=7:
				echo 2;
				break;
			case $raw>=8 && $raw<=9:
				echo 3;
				break;
			case $raw>=10 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=13:
				echo 5;	
				break;	
			case $raw>=14 && $raw<=16:
				echo 6;
				break;
			case $raw>=17 && $raw<=18:
				echo 7;
				break;
			case $raw>=19 && $raw<=18:
				echo 8;
				break;	
			case $raw>=16 && $raw<=17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_E($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=5:
				echo 1;
				break;
			case $raw>=6 && $raw<=7:
				echo 2;
				break;
			case $raw>=8 && $raw<=9:
				echo 3;
				break;
			case $raw>=10 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=13:
				echo 5;	
				break;	
			case $raw>=14 && $raw<=15:
				echo 6;
				break;
			case $raw>=16 && $raw<=17:
				echo 7;
				break;
			case $raw>=18 && $raw<=19:
				echo 8;
				break;	
			case $raw>=20 && $raw<=21:
				echo 9;
				break;
			case $raw>=22 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_F($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw>=5 && $raw<=6:
				echo 2;
				break;
			case $raw>=7 && $raw<=9:
				echo 3;
				break;
			case $raw>=10 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=14:
				echo 5;	
				break;	
			case $raw>=15 && $raw<=17:
				echo 6;
				break;
			case $raw>=18 && $raw<=19:
				echo 7;
				break;
			case $raw>=20 && $raw<=21:
				echo 8;
				break;	
			case $raw>=22 && $raw<=24:
				echo 9;
				break;
			case $raw>=25 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_G($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw==5:
				echo 2;
				break;
			case $raw>=6 && $raw<=7:
				echo 3;
				break;
			case $raw>=8 && $raw<=9:
				echo 4;
				break;
			case $raw>=10 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=13:
				echo 6;
				break;
			case $raw>=14 && $raw<=15:
				echo 7;
				break;
			case $raw==16:
				echo 8;
				break;	
			case $raw==17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_H($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=1:
				echo 1;
				break;
			case $raw>=2 && $raw<=3:
				echo 2;
				break;
			case $raw>=4 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=14:
				echo 6;
				break;
			case $raw>=15 && $raw<=16:
				echo 7;
				break;
			case $raw>=17 && $raw<=18:
				echo 8;
				break;	
			case $raw>=19 && $raw<=20:
				echo 9;
				break;
			case $raw>=21 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_I($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw==5:
				echo 2;
				break;
			case $raw>=6 && $raw<=7:
				echo 3;
				break;
			case $raw>=8 && $raw<=9:
				echo 4;
				break;
			case $raw>=10 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=13:
				echo 6;
				break;
			case $raw==14:
				echo 7;
				break;
			case $raw>=15 && $raw<=16:
				echo 8;
				break;	
			case $raw==17:
				echo 9;
				break;
			case $raw>=18 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_L($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=3:
				echo 1;
				break;
			case $raw==4:
				echo 2;
				break;
			case $raw>=5 && $raw<=6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw>=11 && $raw<=12:
				echo 6;
				break;
			case $raw==13:
				echo 7;
				break;
			case $raw>=14 && $raw<=15:
				echo 8;
				break;	
			case $raw==16:
				echo 9;
				break;
			case $raw>=17 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_M($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=6:
				echo 1;
				break;
			case $raw>=7 && $raw<=8:
				echo 2;
				break;
			case $raw==9:
				echo 3;
				break;
			case $raw>=10 && $raw<=11:
				echo 4;
				break;
			case $raw>=12 && $raw<=13:
				echo 5;	
				break;	
			case $raw>=14 && $raw<=15:
				echo 6;
				break;
			case $raw>=16 && $raw<=17:
				echo 7;
				break;
			case $raw==18:
				echo 8;
				break;	
			case $raw==19:
				echo 9;
				break;
			case $raw>=20 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_N($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=3:
				echo 1;
				break;
			case $raw>=4 && $raw<=5:
				echo 2;
				break;
			case $raw==6:
				echo 3;
				break;
			case $raw>=7 && $raw<=8:
				echo 4;
				break;
			case $raw>=9 && $raw<=10:
				echo 5;	
				break;	
			case $raw==11:
				echo 6;
				break;
			case $raw==12:
				echo 7;
				break;
			case $raw>=13 && $raw<=14:
				echo 8;
				break;	
			case $raw==15:
				echo 9;
				break;
			case $raw>=16 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_O($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=1:
				echo 1;
				break;
			case $raw==2:
				echo 2;
				break;
			case $raw>=3 && $raw<=4:
				echo 3;
				break;
			case $raw>=5 && $raw<=6:
				echo 4;
				break;
			case $raw>=7 && $raw<=9:
				echo 5;	
				break;	
			case $raw>=10 && $raw<=11:
				echo 6;
				break;
			case $raw>=12 && $raw<=14:
				echo 7;
				break;
			case $raw>=15 && $raw<=16:
				echo 8;
				break;	
			case $raw>=17 && $raw<=18:
				echo 9;
				break;
			case $raw>=19 && $raw<=26:
				echo 10;
				break;
		}
	}
	public function deal_woman_Q1($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=6:
				echo 1;
				break;
			case $raw==7:
				echo 2;
				break;
			case $raw>=8 && $raw<=9:
				echo 3;
				break;
			case $raw==10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw==15:
				echo 7;
				break;
			case $raw==16:
				echo 8;
				break;	
			case $raw>=17 && $raw<=18:
				echo 9;
				break;
			case $raw>=19 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_Q2($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw>=5 && $raw<=6:
				echo 2;
				break;
			case $raw>=7 && $raw<=8:
				echo 3;
				break;
			case $raw>=9 && $raw<=10:
				echo 4;
				break;
			case $raw>=11 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw>=15 && $raw<=16:
				echo 7;
				break;
			case $raw==17:
				echo 8;
				break;	
			case $raw>=18 && $raw<=19:
				echo 9;
				break;
			case $raw==20:
				echo 10;
				break;
		}
	}
	public function deal_woman_Q3($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=4:
				echo 1;
				break;
			case $raw>=5 && $raw<=6:
				echo 2;
				break;
			case $raw>=7 && $raw<=8:
				echo 3;
				break;
			case $raw==9:
				echo 4;
				break;
			case $raw>=10 && $raw<=12:
				echo 5;	
				break;	
			case $raw>=13 && $raw<=14:
				echo 6;
				break;
			case $raw==15:
				echo 7;
				break;
			case $raw>=16 && $raw<=17:
				echo 8;
				break;	
			case $raw==18:
				echo 9;
				break;
			case $raw>=19 && $raw<=20:
				echo 10;
				break;
		}
	}
	public function deal_woman_Q4($raw)
	{
		switch ($raw)
		{
			case $raw>=0 && $raw<=3:
				echo 1;
				break;
			case $raw>=4 && $raw<=5:
				echo 2;
				break;
			case $raw>=6 && $raw<=7:
				echo 3;
				break;
			case $raw>=8 && $raw<=9:
				echo 4;
				break;
			case $raw>=10 && $raw<=11:
				echo 5;	
				break;	
			case $raw>=12 && $raw<=14:
				echo 6;
				break;
			case $raw>=15 && $raw<=16:
				echo 7;
				break;
			case $raw>=17 && $raw<=18:
				echo 8;
				break;	
			case $raw>=19 && $raw<=20:
				echo 9;
				break;
			case $raw>=21 && $raw<=26:
				echo 10;
				break;
		}
	}
	//man_G和woman_Q2 是一样的

}
