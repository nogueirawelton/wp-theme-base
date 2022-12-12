<?php
  $projects = new WP_Query(
    [
      'posts_per_page'   => 3,
      'post_type'        => 'project',
      'post_status'      => 'publish',
    ]
  );
?>

<section id="main-projects">
  <h2>
    Principais Projetos
  </h2>
  <div class="wrapper">
    <?php if($projects->have_posts()): ?>
    <?php while($projects->have_posts('project ')): $projects->the_post(); ?> 

      <div class="project">
        <div class="overlay">
          <span><?= get_field("status") ?></span>
          <a href="<?= the_permalink() ?>">Saiba Mais</a>
        </div>
        <img src="<?= get_field("banner") ?>" alt="Random">
        <div class="info">
          <h3><?= get_field("nome") ?></h3>
          <p><?= get_field("descricao") ?></p>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata();?>
    </div>
      <a href="<?= get_site_url() . "/projetos" ?>">Saiba Mais</a>
    <?php else: ?>
      <p>Nenhum Projeto Adicionado Ainda</p>
    <?php endif; ?>
</section>