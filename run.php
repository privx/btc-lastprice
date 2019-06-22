<?php
error_reporting(0);
function seperate($str) 
    {
        return join(".", str_split($str, 3));
    }

echo PHP_EOL;

echo "$ BTC's Last Price Checker\r\n";
echo "$ Input your BTC amount : (0.00351374)\r\n$ ";
$total = trim(fgets(STDIN));

echo PHP_EOL;

$o=-1;
while(true){
	$info = json_decode(file_get_contents("https://indodax.com/api/btc_idr/webdata"),True)['_24h'];
	$arr = array(
	"$ Last Price: Rp ".seperate($info['last_price'])."                          ",
	"$ Your total balance (BTC): Rp ".seperate(substr($total*$info['last_price'], 0, 6))."                ",
	"$ Volume (BTC/IDR): ".seperate($info['vol_btc'])." / Rp ".seperate($info['vol_rp'])	);
	$o+=1;
	if($o>2	) $o=0;
	echo "{$arr[$o]}\r";
	sleep(3);
}
