<h1>Game n°<?php echo $renderOptions['gameId']; ?></h1>

<!-- affichage du message si il y en a un. -->
<?php if (isset($renderOptions['message'])) { ?>
  <p class='msg'><?php echo $renderOptions['message']; ?></p>
<?php } ?>

<!-- affichage du message d'erreur si il y en a un. -->
<?php if (isset($renderOptions['error'])) { ?>
  <p class='msg error'><?php echo $renderOptions['error']; ?></p>
<?php } ?>

<form class="choice" method="POST" action="index.php?action=Game">
  <input type='text' name='nombre' placeholder="Enter a number" autofocus />
  <input type='submit' value='Send' />
</form>
