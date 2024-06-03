<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <!-- <meta name="viewport" content="viewport-fit=cover" /> -->

    <?= css('assets/css/styles.css') ?>
    <title><?= $site->title() . ' • ' . $page->title() ?></title>
</head>

<body class="bg-neutral text-primary font-simplon_regular min-h-screen max-w-[1400px] mx-auto">

    <?php if ($page != 'error' and $page != 'success') : ?>
    <header>
        <a href="/">
            <img id='logo' class='object-contain animate-spin-slow w-24' src="/assets/images/teehuesli_logo.png"
                alt="teehuesli logo">
        </a>
        <div class='uppercase font-simplon_medium'>
            <?php foreach ($site->children()->listed() as $child) : ?>
            <a class='<?= e($child->isOpen(), 'underline') ?> ' href="<?= $child->url() ?>"><?= $child->title() ?></a>
            <?php endforeach ?>
        </div>

        <div
            class="stickers opacity-0 lg:opacity-100 transition-opacity fixed top-0 left-0 w-full h-screen z-20 pointer-events-none">
            <img id='logo' class='absolute top-8 left-1/2 -translate-x-1/2 h-4' src="/assets/images/plz.png"
                alt="teehuesli logo">
            <img id='logo' class='absolute w-3 top-1/2 right-12 -translate-y-1/2' src="/assets/images/seehoehe.png"
                alt="teehuesli logo">
            <img id='logo' class='absolute w-10 bottom-28 left-6' src="/assets/images/logo_year.png"
                alt="teehuesli logo">
        </div>

    </header>
    <?php endif ?>
    <main class='md:-mt-2 relative'>