<?php
require __DIR__ . '/vendor/autoload.php';
$email = $_POST['email'];
$transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
  ->setUsername('nikita-filatov51@yandex.ru')
  ->setPassword('987412365ru')
  ;

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Приглашение на ужин!'))
  ->setFrom(['nikita-filatov51@yandex.ru' => 'Nikita Filatov'])
  ->setTo(['nikita-filatov51@yandex.ru', $email])
  ->setBody('Любимая, Привет - это твое приглашение на ужин! Ужин будет по адресу Сергея Вострецова 11 кв.115. При себе иметь обязательно либо скрин, либо распечатку этого письма! Более подробная информация по телефону 89174448517! Я люблю тебя!')
  ;

$result = $mailer->send($message);
echo "Ваша приглашение отправлено на почту: $email";