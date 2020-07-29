<html>

<head>
  <title>SteamGames</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style>
  body {
    background-image: url("http://cdn.akamai.steamstatic.com/steam/apps/220/page_bg_generated_v6b.jpg?t=1515390717");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .card {
    width: 350px;
  }
</style>

<body>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Log ind</h5>
      <form action="./savecookie.php" method="post">
        <div class="form-group">
          <label for="steamid">SteamID</label>
          <input type="number" class="form-control" id="steamid" name="steamid">
          <small id="emailHelp" class="form-text text-muted">Du kan finde dit SteamID <a target="_black" href="https://steamidfinder.com/">her</a>.</small>
        </div>
        <button class="btn btn-outline-primary" type="submit">Go!</button>
      </form>
    </div>
  </div>
</body>

</html>