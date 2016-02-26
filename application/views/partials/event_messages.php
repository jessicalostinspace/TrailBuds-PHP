<?php foreach ($messages as $message) { ?>
  <div class="single-message" style="padding: 15px 15px 25px 15px; margin-top: 0px;">
    <hr>
    <img src="<?= $message['picture_url'] ?>" alt="">
    <span><strong><?= $message['first_name'] . ' ' . $message['last_name'] ?></strong></span>
    <p style="margin-top: 15px; word-wrap: break-word;"><?= $message['content'] ?></p>
    <p class="right" style="font-size: .9em">At: <span class="forest"><?= $message['created_at'] ?></p></span>
  </div>
<?php } ?>