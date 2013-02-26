<h3>Grupp <?= $this->data['group']->id ?> &mdash; <?= $this->data['group']->name ?></h3>

<table class="table table-striped">
  <tr>
    <th>Namn</th>
    <th>Handikapp</th>
    <th colspan="2">Poäng</th>
  </tr>
  <?php foreach ($group_players as $player): ?>
  <tr>
    <td><?= $player->fullname ?></td>
    <td><?= rand(0, 12); ?></td>
    <td><?= rand(20, 150); ?></td>
    <td>
      <div class="btn-group">
        <button class="btn btn-mini" title="Ta bort från grupp"><i class="icon-minus"></i></button>
      </div>
    </td>
  </tr>
  <?php endforeach ?>

</table>

<h3>Lägg till medlemmar</h3>

<?= form_open('group/add_players', array('class' => ''), array('group_id' => 5)) ?>

<?php foreach ($group_nonplayers as $player): ?>
<label class="checkbox"><input type="checkbox" value="<?= $player->id ?>"><?= $player->username ?></label><br>
<?php endforeach ?>

<button class="btn" type="submit"><i class="icon-plus"></i> Lägg till</button>

<?= form_close(); ?>

