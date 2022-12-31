<?php
//error_reporting(0);
$api='{
}';

$hero=json_decode('[105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,123,124,126,127,128,129,130,131,132,133,134,135,136,137,139,140,141,142,144,146,148,149,150,152,153,154,156,157,162,163,166,167,168,169,170,171,173,174,175,177,180,184,186,187,189,190,191,192,193,194,195,196,199,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,518,519,520,521,522,523,524,525,526,527,528,529,530,531,532,533,534,535,536,537,538,539,540,542,543,545,546]',true);


function getLink($skinId){
	global $api;
	return json_decode(str_replace('##IDICON##','30'.$skinId,$api),true);
}

if(!is_dir('./AOVMINIART_NOXAOV/')) mkdir('./AOVMINIART_NOXAOV',0777,true);
foreach($hero as $i){
	 if(!is_dir('./AOVMINIART_NOXAOV/'.$i.'/')) mkdir('./AOVMINIART_NOXAOV/'.$i.'/',0777,true);
	 ">>>>NOX_TOOL | Scanning HERO ".$i."\n";
	  for($j=1;$j<=20;$j++)
	      {
		
             $skin=$j;
		     if(file_exists('./AOVMINIART_NOXAOV/'.$i.'/'.$i.$skin.'.jpg')) continue;
		     echo ">> Đang tải mart skin ".$i.$skin."\n";
		     foreach(getLink($i.$skin) as $sv){
			        $a=@file_get_contents($sv);
			        if($a!=''){
				        file_put_contents("./AOVMINIART_NOXAOV/".$i."/".$i.$skin.".jpg",$a);
				        echo "Đã lưu! \n";
				        break;
				    }else{
					  echo "--Méo có art--\n";
					}
			  }
	  }
	}
