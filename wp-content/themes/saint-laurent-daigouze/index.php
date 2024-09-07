<?php get_template_part('parts/header', 'header') ?>

<main id="main">
    <section class="hero">
        <h2 class="hero__title">
            <?= get_the_title() ?>
            <span class="hero__provencal"><?= get_field('provencal_name') ?></span>
        </h2>
    </section>
    <section class="panels">
        <h2 class="panels__title">Panneaux</h2>
        <?php
        $images = get_field('images');
        if ($images): ?>
            <ul class="panels__list">
                <?php foreach ($images as $image): ?>
                    <li class="panels__item">
                        <?= wp_get_attachment_image($image, 'medium', false, [
                            'class' => 'panels__img'
                        ]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
    <section class="history">
        <h2 class="history__title">Histoire</h2>
        <div class="history__text" data-tag="wysiwyg">
            <?php the_content() ?>
        </div>
        <?php if (have_rows('links')) : ?>
            <div class="history__container">
                <?php while (have_rows('links')) : the_row(); ?>
                    <a href="<?= get_sub_field('url') ?>" target="_blank"><?= get_sub_field('label') ?></a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_template_part('parts/footer', 'footer') ?>
