<html>
  <head>
    <title>Velkommen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://coinhive.com/lib/coinhive.min.js"></script>
    <script src="https://authedmine.com/lib/captcha.min.js" async></script>
  </head>
  <style>
    body {
      background-image: url("http://cdn.akamai.steamstatic.com/steam/apps/220/page_bg_generated_v6b.jpg?t=1515390717");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .card {
      width: 350px;
      display: flex;
      margin: 0 auto;
      position: relative;
      top: 50%;
      transform: translateY(-70%);
    }
  </style>
  <body>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          Velkommen
        </h5>
        <form action="./savecookie.php" method="post">
          <input class="form-control" type="number" name="steamid" placeholder="Indtast SteamID64">
          <!-- <div visable="false" style="display: flex; margin: 0 auto; margin-top: 15px;" class="coinhive-captcha" data-hashes="256" data-key="gvya9Nko0AzdICUtoi6L8raWG0KDAWmG">
     		     <em>Loading Captcha...<br>If it doesn't load, please disable Adblock!</em>
     	    </div> -->
          <button class="btn btn-outline-primary" type="submit" style="margin-top: 15px;">Go!</button>
          <p class="form-text">Du kan finde dit SteamID <a target="_black" href="https://steamidfinder.com/">her.</a></p>
        </form>
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
