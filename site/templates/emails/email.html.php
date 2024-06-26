<div style='font-family:sans-serif'>
  <div>
    <b>Nachricht:</b>
    <p>
      "<?= $text ?>"
    </p>
  </div>
  <hr>
  <div>
    <b>Absender:</b>
    <p><?= $fname ?> <?= $lname ?><br>
      <?= $email ?> <br>
      <?= $address ?><br>
      <?= $city ?> <br>
      <?= $phone ?></p>
    <?php if (!empty($become_member)) : ?>
      <p style='color:#EB6446'>Interessiert sich für eine Mitgliedschaft</p>
    <?php endif ?>
  </div>
  <hr>

  <p>
    <b>Liebe Grüsse vom Teehüsli Formular.</b>
  </p>
  <img width='80' src="https://teehuesli.ch/assets/images/teehuesli_logo.png" alt="teehüsli logo">
</div>