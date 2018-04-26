<?php

require './vendor/autoload.php';

//获取该目录下所有的文件数并生成链接
header("Content-Type: text/html; charset=utf-8");
echo '<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">';
echo '<link rel="stylesheet" href="' . './css/markdown.css' . '">';
echo '<title>目录</title>';

$key = $_GET['name'] ? $_GET['name'] : 'admin';
$param = new Parsedown();
$html = $param->text(file_get_contents('./markdown/' . $key . '.md'));
echo $html;

// $param = new \HyperDown\Parser();
// $html = $param->makeHtml(file_get_contents('./markdown/admin.md'));
// echo ($html);
