<?php get_header(); ?>

<main>
  <section id="project-page">
    <img src="<?= get_field("banner") ?>" alt="">
    <h1><?= get_field("nome") ?></h1>
    <p><?= get_field("descricao") ?></p>
  </section>
</main>

<?php get_footer(); ?>