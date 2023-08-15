<?php
  session_start();
  $captchaCode = $_SESSION['code'];

  $data = [
    "data" => [
      "captcha_code" => $captchaCode
    ]
  ];

  echo json_encode($data, JSON_PRETTY_PRINT);
?>