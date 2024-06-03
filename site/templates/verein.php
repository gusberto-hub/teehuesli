<?php snippet('header') ?>

<section class=''>
    <div
        class="mb-8 grid grid-areas-verein_intro_sm md:grid-areas-verein_intro_md lg:grid-areas-verein_intro_lg grid-cols-1 md:grid-cols-2 gap-4 lg:gap-12 relative">

        <img class="grid-in-img1 md:w-full lg:w-4/6 sm:mr-[20%] ml-auto js-show-on-scroll"
            data-animate-type="animate-fadeInRight" src="<?= $page->intro_image_1()->toFile()->thumb()->url() ?>"
            alt="">

        <img class='grid-in-img2 md:mt-28 lg:mt-0 js-show-on-scroll' data-animate-type="animate-fadeInLeft"
            src="<?= $page->intro_image_2()->toFile()->thumb()->url() ?>" alt="">

        <img class="grid-in-title -mt-8 md:mt-0 mx-auto md:mx-0 md:-ml-[33vw] lg:ml-0 md:absolute md:bottom-12 lg:bottom-12 md:right-0 w-[80vw] md:w-[48vw] lg:w-[42vw] max-w-xl lg:left-1/3"
            src="../../assets/images/verein.svg" alt="Verein titel">

        <div class='grid-in-text lg:w-4/5 mt-6'>
            <?= $page->verein_text()->kt() ?>
        </div>
    </div>


</section>
<section class='grid md:grid-cols-3 grid-cols-1'>
    <div class='relative mb-8'>
        <img class='w-full md:w-[36rem] md:rotate-90 md:max-w-none md:origin-top md:-translate-x-1/2 md:left-1/2 md:absolute md:top-1/2 mb-4'
            src="../../assets/images/vorstand.svg" alt="">
    </div>
    <div class='grid  gap-8 md:gap-12 md:grid-cols-2 col-span-2'>
        <?php foreach ($page->vorstand_members()->toStructure() as $member) : ?>
        <div class='gap-4 grid grid-cols-3 lg:grid-rows-2 md:grid-cols-1 items-center md:items-start'>
            <img class='md:w-40 w-32 justify-self-center md:justify-self-start js-show-on-scroll'
                data-animate-type="animate-fadeIn" src="<?= $member->image()->toFile()->thumb()->url() ?>"
                alt="<?= $member->name() ?>">
            <div class='col-span-2'>
                <span class='uppercase block pb-2'> <?= $member->function()->kt() ?></span>
                <div class='p-0'>
                    <p>
                        <span class='font-simplon_medium block'> <?= $member->name() ?> </span>
                        <span><?= Html::email($member->mail(), $member->mail()) ?></span>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>
<section id="become_member">
    <img class='mb-8 sm:pt-20 md:mb-12 mx-auto' src="../../assets/images/mitglied_werden.svg" alt="">
    <div
        class='grid gap-5 grid-areas-form_verein_sm md:grid-areas-form_verein_md grid-cols-1 md:grid-cols-2 lg:grid-cols-12 lg:grid-areas-form_verein_lg'>
        <div class="grid-in-text_form mb-4 md:pl-4 lg:pl-0">
            <?= $page->become_member_text()->kt() ?>
        </div>
        <div class='grid-in-form'>
            <p class="mb-4"><?= $page->form_title() ?></p>
            <?php if ($success) : ?>
            <div class="alert success">
                <p><?= $success ?></p>
            </div>
            <?php else : ?>
            <?php if (isset($alert['error'])) : ?>
            <div class="text-orange"><?= $alert['error'] ?></div>
            <?php endif ?>
            <form method="post" action="<?= $page->url() . '#form' ?>" id='form'>
                <div class="honeypot">
                    <label for="website">Website <abbr title="required">*</abbr></label>
                    <input type="url" id="website" name="website" tabindex="-1">
                </div>

                <div class="field">
                    <input type="text" id="fname" name="fname" value="<?= esc($data['fname'] ?? '', 'attr') ?>"
                        placeholder="Vorname" required>
                    <?= isset($alert['fname']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['fname']) . '</span>' : '' ?>
                </div>

                <div class="field">
                    <input type="text" id="lname" name="lname" value="<?= esc($data['lname'] ?? '', 'attr') ?>"
                        placeholder="Nachname" required>
                    <?= isset($alert['lname']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['lname']) . '</span>' : '' ?>
                </div>

                <div class="field">
                    <input type="text" id="address" name="address" value="<?= esc($data['address'] ?? '', 'attr') ?>"
                        placeholder="Strasse/Nr.">
                    <?= isset($alert['address']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['address']) . '</span>' : '' ?>
                </div>

                <div class="field">
                    <input type="text" id="city" name="city" value="<?= esc($data['city'] ?? '', 'attr') ?>"
                        placeholder="PLZ/Ort">
                    <?= isset($alert['city']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['city']) . '</span>' : '' ?>
                </div>

                <div class="field">
                    <input type="text" id="phone" name="phone" value="<?= esc($data['phone'] ?? '', 'attr') ?>"
                        placeholder="Telefon">
                    <?= isset($alert['phone']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['phone']) . '</span>' : '' ?>
                </div>

                <div class="field">
                    <input type="email" id="email" name="email" value="<?= esc($data['email'] ?? '', 'attr') ?>"
                        placeholder="E-Mail" required>
                    <?= isset($alert['email']) ? '<span class="alert error font-bold text-secondary">' . esc($alert['email']) . '</span>' : '' ?>
                </div>

                <div class='mb-4 flex'>
                    <input
                        class="appearance-none border-2 border-primary w-4 h-4 checked:bg-secondary transition-all mr-2 cursor-pointer m-0 mt-0.5"
                        type="checkbox" id="become_member_checkbox" name="become_member"
                        value="<?= esc($data['become_member'] ?? 'become_member', 'attr') ?>">
                    <label class="cursor-pointer" for="become_member_checkbox">Ich interessiere mich für eine
                        Mitgliedschaft.</label>
                </div>

                <!-- <div class='mb-0 flex'>
                    <input
                        class="appearance-none border-2 border-primary w-[1.2em] h-[1em] checked:bg-secondary transition-all mr-2"
                        type="checkbox" id="support">
                    <label for="support">Ich möchte mit einer Spende
                        unterstützen.</label>
                </div> -->

                <div class="field">
                    <textarea id="text" name="text" rows="4" placeholder="Schreib uns etwas"
                        required><?= esc($data['text'] ?? '') ?></textarea>
                    <?= isset($alert['text']) ? '<span class="alert error">' . esc($alert['text']) . '</span>' : '' ?>

                </div>

                <input class='bg-primary text-neutral uppercase w-fit font-simplon_regular px-6' type="submit"
                    name="submit" value="Abschicken">
            </form>
            <?php endif ?>
            <?php if ($show_pop_up) : ?>
            <div class="flex flex-col items-center justify-around fixed h-screen w-screen top-0 left-0 z-40 after:content-[''] after:absolute after:w-full after:h-full after:bg-[#555] after:opacity-40"
                id="success-popup">
                <div class="flex flex-col bg-neutral p-16 shadow-xl z-50">
                    <img id='logo' class='mx-auto max-w-full' src="/assets/images/merci.png" alt="dankeschön">
                    <div class='text-center mt-4'>
                        <?= page('success')->text()->kirbytextinline() ?>
                        <div>
                            <button id="close-pop-up"
                                class="bg-primary hover:bg-secondary text-neutral uppercase w-fit font-simplon_regular px-6 py-2 mt-8">pop-up
                                schliessen</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-x-4 gap-y-4">
                <?= $page->support_text()->kt() ?>
                <div class="">
                    <?= $page->support_account()->kt() ?>
                </div>
            </div>
        </div>

        <div class="grid-in-img js-show-on-scroll" data-animate-type="animate-fadeInRight">
            <img src="<?= $page->form_image()->toFile()->thumb()->url() ?>" alt="">
        </div>

    </div>
</section>
<script>
popUpWindow = document.querySelector('#success-popup')
closePopUp = document.querySelector('#close-pop-up')
closePopUp.addEventListener('click', () => {
    popUpWindow.style.display = 'None';
})
</script>
<?php snippet('footer') ?>