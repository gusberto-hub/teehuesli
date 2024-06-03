<section id="intro">
    <div class=''>
        <?php $img_intro = $site->intro_image()->toFile() ?>
        <img class='object-contain w-60' src="<?= $img_intro->thumb([])->url() ?>" alt="<?= $img_intro->alt() ?>">
        <img class='-mt-6 w-64 ml-auto' src="../../assets/images/hoi_zaeme.svg" alt="">
    </div>
    <?= $site->intro_text()->kt() ?>
</section>

<section id="opening_hours">
    <img class='h-8 mb-4' src="../../assets/images/oeffnungszeiten.svg" alt="">
    <?= $site->opening_hours()->kt() ?>
</section>

<section id="angebot">
    <?php $img_angebot_1 = $site->angebot_image_1()->toFile() ?>

    <img class='w-60 ml-auto' src="<?= $img_angebot_1->thumb([])->url() ?>" alt="<?= $img_angebot_1->alt() ?>">

    <img class='h-24 -mt-16' src="../../assets/images/angebot.svg" alt="">

    <p><?= $site->angebot_text()->kt() ?></p>

    <?php $img_angebot_2 = $site->angebot_image_2()->toFile() ?>
    <img src="<?= $img_angebot_2->thumb([])->url() ?>" alt="<?= $img_angebot_2->alt() ?>">
</section>

<section id="kontakt">
    <div class='flex mb-12'>
        <img class='mr-10 w-5' src="../../assets/images/kontakt.svg" alt="">
        <div>
            <div class='font-simplon_medium'>
                <?= $site->kontakt_text()->kt() ?>
            </div>
            <?= $site->email()->kt() ?>
        </div>
    </div>
    <div>
        <img class='w-32 mb-4' src="../../assets/images/wo_isches.svg" alt="">
        <a href="<?= $site->googlemaps() ?>">Google Maps</a>
        <img src="<?= $site->map_mobile()->toFile()->thumb()->url() ?>" alt="">
    </div>

</section>