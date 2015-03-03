<h1><?php echo $renderOptions['message']; ?></h1>

<table>
  <tbody>
    <?php foreach ($renderOptions['list'] as $game) { ?>
      <tr>
        <td>
          <span>Game n°<?php echo $game->id ?></span>
        </td>
        <td>
          <?php if (!$game->closed) { ?>
            <form method="post" action="index.php?action=ReplayGame">
              <input type="hidden" value="<?php echo $game->id; ?>" name="game_id" />
              <input type="submit" value="Rejouer" />
            </form>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>

  </tbody>
</table>
