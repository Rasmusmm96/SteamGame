<html>
<?php
$appid = $_GET['appid'];
$url = 'https://store.steampowered.com/api/appdetails?appids=' . $appid . '&l=danish';
$obj = json_decode(file_get_contents($url), true);

if ($obj[$appid]['success'] == false) {
  http_response_code(404);
  include('404.php');
  die();
}

$game = $obj[$appid]['data'];
$genres = array();

foreach ($game["genres"] as $genre) {
  $genres[] = $genre['description'];
}

$genres = implode(", ", $genres);
?>

<head>
  <title><?= $game['name'] ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<style>
  body {
    background-image: url(<?php echo $game['background'] ?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  .navbar {
    background-color: #1d2a3a !important;
  }

  .parent {
    padding: 8px;
    display: flex;
    justify-content: center;
  }

  .right {
    max-width: 430px;
    margin: 0 8px 0 8px;
  }

  .left {
    max-width: 720px;
    margin: 0 8px 0 8px;
  }

  .gamecard {
    margin: 8px 0 8px 0;
  }

  .card-body {
    border-radius: 0 0 .25rem .25rem;
    background-color: white;
  }

  video {
    width: 100%;
    margin: 8px 0 8px 0;
  }

  img {
    background-color: #1d2a3a;
    max-width: 100%;
    height: auto;
  }

  .col:first-child {
    max-width: 460px;
  }

  .carousel {
    margin: 8px 0 8px 0;
  }

  .card {
    margin: 16px 0 8px 0;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./">SteamGames</a>
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
  <div class="parent">

      <div class="right">

        <div class="gamecard">
          <img class="card-img-top" src="<?= $game['header_image']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $game['name']; ?>
            </h5>
            <p class="card-text">
              Genre: <?= $genres ?><br>
              Metascore: <?= $game['metacritic']['score'] ?>/100<br>
              Udgivelsesdato: <?= $game['release_date']['date'] ?>
            </p>
            <a href="steam://run/<?php echo $appid; ?>" class="btn btn-primary">Start spil</a>
          </div>
        </div>

        <?php foreach ($game['movies'] as $movie): ?>
        <video controls poster="<?= $movie['thumbnail']; ?>">
          <source src="<?= $movie['webm']['max']; ?>" type="video/webm">
        </video>
        <?php endforeach; ?>

      </div>

      <div class="left">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php foreach ($game['screenshots'] as $key => $photo) : ?>
              <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                <img class="d-block w-100" src="<?= $photo['path_full'] ?>">
              </div>
            <?php endforeach; ?>
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

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              Beskrivelse
            </h5>
            <p class="card-text">
              <?= $game['detailed_description'] ?>
            </p>
          </div>
        </div>

      </div>

  </div>
</body>

</html>