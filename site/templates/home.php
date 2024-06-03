<?php

snippet('header') ?>

<section id="intro" class='grid lg:grid-cols-12 gap-16 lg:gap-5 relative'>
    <?php $img_intro = $site->intro_image()->toFile() ?>
    <div class="relative mb-12 sm:mb-0 lg:col-span-6">
        <img class='w-3/4 lg:w-full js-show-on-scroll' data-animate-type="animate-fadeInLeft"
            src="<?= $img_intro->thumb([])->url() ?>" alt="<?= $img_intro->alt() ?>">
        <img class='-mt-6 sm:mt-auto sm:-bottom-4 lg:bottom-auto lg:top-12 w-60 sm:w-1/2 lg:w-[34vw] max-w-md absolute right-0 lg:-right-1/2 js-show-on-scroll'
            data-animate-type="animate-fadeInRight" src="../../assets/images/hoi_zaeme.svg" alt="">
    </div>
    <div class="sm:w-3/4 lg:w-full lg:pt-[clamp(16rem,22vw,18rem)] lg:col-span-5 lg:col-start-8">
        <?= $site->intro_text()->kt() ?>
    </div>
    <div id='next_event' class="js-show-on-scroll will-change-scroll" data-animate-type="animate-fadeInLeft">
        <div class='arrow'>
            <p class=''>
                <?php
                $fmt = new IntlDateFormatter(
                    'de_DE',
                    IntlDateFormatter::FULL,
                    IntlDateFormatter::FULL,
                    'Europe/Zurich',
                    IntlDateFormatter::GREGORIAN,
                    'E dd MMM'
                );
                $formatted_date = $fmt->format($site->next_date()->toDate());
                ?>

                <?= str_replace('.', '', $formatted_date) ?>

                <span>offe</span>
            </p>
            <img src="../../assets/images/Triangle.svg" alt="">
        </div>
    </div>
</section>

<section id="opening_hours">
    <img class='h-8 mb-4' src="../../assets/images/oeffnungszeiten.svg" alt="">
    <?= $site->opening_hours()->kt() ?>
</section>

<section id="angebot" class="lg:flex lg:flex-row-reverse items-end relative">
    <?php $img_angebot_1 = $site->angebot_image_1()->toFile() ?>
    <div class="mb-[16vw] md:mb-12 lg:mb-0 flex-1">
        <img class='w-5/6 md:w-1/2 lg:w-5/6 ml-auto js-show-on-scroll' data-animate-type="animate-fadeInRight"
            src=" <?= $img_angebot_1->thumb([])->url() ?>" alt="<?= $img_angebot_1->alt() ?>">
    </div>
    <img class='w-5/6 max-w-lg top-[75vw] md:top-12 lg:top-0 lg:left-1/2 lg:-translate-x-1/2 absolute'
        src="../../assets/images/angebot.svg" alt="">

    <div class="flex-1"><?= $site->angebot_text()->kt() ?></div>

    <?php $img_angebot_2 = $site->angebot_image_2()->toFile() ?>
</section>

<section id="kontakt"
    class="grid gap-4 grid-areas-contact_grid_sm md:grid-areas-contact_grid_md lg:grid-areas-contact_grid_lg grid-cols-1 md:grid-cols-2 lg:grid-cols-1_3">
    <img class='grid-in-img mx-auto md:mb-24 mb-4' src="<?= $img_angebot_2->thumb([])->url() ?>"
        alt="<?= $img_angebot_2->alt() ?>">
    <div class='grid-in-contact flex lg:flex-col mb-12 md:mb-24 md:items-end lg:items-start'>
        <img class='mr-4 mb-4 h-48' src="../../assets/images/kontakt.svg" alt="">
        <div>
            <div class='font-simplon_medium mb-4'>
                <?= $site->kontakt_text()->kt() ?>
            </div>
            <?= $site->email()->kt() ?>
            <a href=<?= $site->instagram() ?> target="_blank"> <img id='logo' class='mt-4 w-10'
                    src="/assets/images/instagram_icon.svg" alt="dankeschön"></a>
        </div>
    </div>
    <div class="grid-in-title">
        <img class='w-32 mb-4' src="../../assets/images/wo_isches.svg" alt="">
        <a href="<?= $site->googlemaps() ?>">Google Maps</a>
    </div>

    <img class='grid-in-map sm:hidden js-show-on-scroll' data-animate-type="animate-fadeInRight"
        src="<?= $site->map_mobile()->toFile()->thumb()->url() ?>" alt="">
    <img class='grid-in-map hidden sm:block js-show-on-scroll' data-animate-type="animate-fadeInLeft"
        src="<?= $site->map_desktop()->toFile()->thumb()->url() ?>" alt="">

</section>

<?php snippet('footer') ?>