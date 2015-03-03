<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Devinette</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <?php if(isset($_SESSION['user'])) { ?>
          <li><?php echo $_SESSION['user']->name; ?></li>
          <li><a href="index.php?action=NewGame">New Game</a></li>
        <?php } else { ?>
          <li>
            <form action="index.php?action=Login" method='post'>
              <input type="hidden" value="demo" name="name"/>
              <input type="hidden" value="demo" name="password"/>
              <input type="hidden" value="NewGame" name="lastPage"/>
              <input type="submit" value="New Game (demo)" />
            </form>
          </li>
        <?php } ?>
        <?php if(isset($_SESSION['user']) and (isset($_SESSION['demo']) and !$_SESSION['demo'])) { ?>
          <li><a href="index.php?action=GameList">Game List</a></li>
        <?php } ?>
        <?php if(isset($_SESSION['user']) and (isset($_SESSION['demo']) and !$_SESSION['demo'])) { ?>
          <li class="nav-right"><a href="index.php?action=Logout">Logout</a></li>
        <?php } ?>
        <?php if(isset($_SESSION['user']) and $_SESSION['demo']) { ?>
          <li><a href="index.php?action=Login">Login</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <div class='content'>
    <?php include_once $CONTENT_VIEW; ?>
  </div>
</body>
