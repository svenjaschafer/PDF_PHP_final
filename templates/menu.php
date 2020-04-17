<!-- einfaches Bootstrap-Menü -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  <div class="container">
<!-- "Minor WebTech" wird auf index.php verlinkt, wenn der User eingeloggt ist -->
    <?php if($logged_in){ ?>
    <a class="navbar-brand" href="/index.php">Minor WebTech</a>
    <?php } ?>
<!-- "Minor WebTech" wird auf login.php verlinkt, wenn der User NICHT eingeloggt ist -->
    <?php if(!$logged_in){ ?>
    <a class="navbar-brand" href="/login.php">Minor WebTech</a>
    <?php } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
<!-- Der folgende Menüunkt wird nur angezeigt, wenn User eingeloggt ist -->
        <?php if($logged_in){ ?>
        <a class="nav-link" href="<?php echo $base_url ?>login.php">Abmelden</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
