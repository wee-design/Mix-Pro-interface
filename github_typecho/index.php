<?php

	/**
	* GitHub页面
	*
	* @package custom
	*/

$githubUser = $this->fields->github; //add fields in typecho edit pages.
if ($githubUser == "" || $githubUser == null){
  $githubUser = 'wibus-wee';
}
  $opts = ['http' => ['method' => 'GET','header' => ['User-Agent: PHP']]];
  $context = stream_context_create($opts);
  $file = file_get_contents("https://api.github.com/users/$githubUser", false, $context);
  // echo $file;
  $json = json_decode($file);
  $login = $json->login;
  $avatar = $json->avatar;
  $name = $json->name;
  if ($name == 'null') {
    $name = $githubUser;
  }
  $bio = $json->bio;
  $avatar_url = $json->avatar_url;
  $file = file_get_contents("https://api.github.com/users/$githubUser/repos", false, $context);
  $json = json_decode($file);
  ?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $this->options->title(); ?></title>
        <link rel="stylesheet" href="./index.css">
    </head>
    <body>
        <div class="page">
            <div class="wrapper-inner">
                <div class="primary">
                    <div class="view">
                        <img class="item" src="<?echo $avatar_url;?>">
                    </div>
                    <span class="name"><?echo $name;?></span><span class="login"><?echo $login;?></span><span class="bio-api"><?echo $bio;?></span>
                </div>
                <div class="sub-i0">
                    <?

  foreach ($json as $item) {
    $body = '<div class="view-i0" style="background-color: rgb('.mt_rand(50, 255).', '.mt_rand(50, 255).', '.mt_rand(50, 255).')" >';
    $url = $item->html_url;
    $name = $item->name;
    $description = $item->description;
    // $language = $item->language;
    $body .= '<span class="repo-name-2">'.$name.'</span><span class="description">'.$description.'</span><div class="mask"></div><a target="_blank" class="tag" href="'.$url.'">访问</a>';
    // echo $url."\n";
    // echo $language."\n";
    $body .= '</div>';
    echo $body;
}

?>
                </div>
            </div>

        </body>
    </html>