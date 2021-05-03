<?php
// $githubUser = $this->fields->github;
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
  if ($name = 'null') {
    $name = $githubUser;
  }
  $bio = $json->bio;

  $file = file_get_contents("https://api.github.com/users/$githubUser/repos", false, $context);
  $json = json_decode($file);
  foreach ($json as $item) {
      $url = $item->url;
      $language = $item->language;
      // echo $url."\n";
      // echo $language."\n";
  }
  // echo $bio;
  ?>