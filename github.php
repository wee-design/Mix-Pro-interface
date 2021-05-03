<?$githubUser = 'wibus-wee';?>
<script>
  let httpRequest = new XMLHttpRequest();
  httpRequest.open('GET',"https://api.github.com/users/<?php echo $githubUser; ?>/repos", true);
  httpRequest.send();
  let json = JSON.parse(httpRequest.responseText);
</script>
<?php
                // $githubUser = $this->fields->github;
                // if ($githubUser == "" || $githubUser == null){
                    $githubUser = 'wibus-wee';
                // }
// $api = 'https://api.github.com/users/'.$githubUser; 
// $file = file_get_contents($api);
$json = json_decode($file);
$login = $json->login;
$avatar = $json->avatar;
$name = $json->name;
if ($name = 'null') {
  $name = $githubUser;
}
$bio = $json->bio;

// $api = 'https://api.github.com/users/'.$githubUser.'repos'; 
// $file = file_get_contents($api);
$file = 
echo $file;
$json = json_decode($file);
foreach ($json as $item) {
  $url = $item->url;
  $language = $item->language;
  echo $url."\n";
  echo $language."\n";
}
