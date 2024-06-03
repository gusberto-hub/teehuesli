<?php snippet('header') ?>
<div class="flex flex-col items-center justify-around h-full">
    <a href="/">
        <img id='logo' class='animate-spin-slow w-24' src="/assets/images/teehuesli_logo.png" alt="teehuesli logo">
    </a>
    <div class="flex flex-col">
        <img id='logo' class='mx-auto max-w-full mt-16' src="/assets/images/merci.png" alt="dankeschön">
        <div class='text-center mt-4'>
            <?= $page->text()->kirbytextinline() ?>
        </div>
    </div>
</div>