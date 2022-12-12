<?php

  $filter = $_GET['filter'];

  $projects = new WP_Query(
    [
      'posts_per_page'   => 3,
      'post_type'        => 'project',
      'post_status'      => 'publish',
      'paged' => get_query_var('paged'),
      'meta_query'       => $filter ? array(
        'status_query' => array(
            'key' => 'status',
            'value' => $filter,
        ),
      ) : '',
    ]
  );
?>

<section id="all-projects">
  <h2>PROJETOS</h2>
    <div class="filters">
      <a class="<?= !$filter ? "active" : "" ?>" href="<?= get_site_url() .  "/projetos" ?>">Todos</a>
      <a class="<?= $filter == "Template" ? "active" : "" ?>" href="<?= get_site_url() .  "/projetos/?filter=Template" ?>">Template</a>
      <a class="<?= $filter == "Em Andamento" ? "active" : "" ?>" href="<?= get_site_url() .  "/projetos/?filter=Em Andamento" ?>">Em Andamento</a>
      <a class="<?= $filter == "Pronto" ? "active" : "" ?>" href="<?= get_site_url() .  "/projetos/?filter=Pronto" ?>">Pronto</a>
      <a class="<?= $filter == "Pausado" ? "active" : "" ?>" href="<?= get_site_url() .  "/projetos/?filter=Pausado" ?>">Pausado</a>
    </div>
  <div class="wrapper">
  <?php if($projects->have_posts()): ?>
    <?php while($projects->have_posts('project ')): $projects->the_post(); ?> 

      <a class="project" href="<?= the_permalink() ?>" >
        <img src="<?= get_field("banner") ?>" alt="Random">
        <div class="info">
          <h3><?= get_field("nome") ?></h3>
          <p><?= get_field("descricao") ?></p>
        </div>
      </a>
      <?php endwhile; wp_reset_postdata();?>
      
    </div>
    <?php else: ?>
      <p class="not-found">Nenhum Projeto Adicionado Ainda</p>
    <?php endif; ?>
  </div>
  <div class="pagination">
    <?php  my_pagination($projects); ?>
  </div>
</section>