<?php

require './vendor/autoload.php';

//获取该目录下所有的文件数并生成链接
header("Content-Type: text/html; charset=utf-8");
echo '<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">';
//echo '<link href="./css/markdown.css" rel="stylesheet">';
echo '<link href="https://cdn.bootcss.com/github-markdown-css/2.8.0/github-markdown.min.css" rel="stylesheet">';
echo '<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/github-gist.min.css" rel="stylesheet">';
echo '<link href="http://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">';


echo '<title>目录</title>';

echo '<div class="container-fluid">
<div class="row">
  <div class="col-md-2">';

$directory = "/var/www/superCool/account/markdown";
tree($directory);

echo '</div>
  <div class="col-md-10">';

$key = $_GET['name'] ? $_GET['name'] : 'admin';
$param = new Parsedown();
$html = $param->text(file_get_contents('./markdown/' . $key . '.md'));
echo "<div class='markdown-body'>" . $html . '</div>';
// $param = new \HyperDown\Parser();
// $html = $param->makeHtml(file_get_contents('./markdown/admin.md'));
// echo ($html);

echo '</div>
</div>
</div>';

//如果目录结构里面有中文，那么加上以下这一句即可
function tree($directory) {
    $mydir = dir($directory);
    echo "<ul>";
    while ($file = $mydir->read()) {
        if ((is_dir("$directory/$file")) AND ($file[0] != '.')) {
            echo "<li>$file</li>";
            tree("$directory/$file");
        } else {
            if ($file[0] != '.') {
                $filename = basename("$directory/$file", '.md');
                echo "<li><a href='?name={$filename}'>$filename</a ></li>";
            }
        }
    }
    echo "</ul>";
    $mydir->close();
}
