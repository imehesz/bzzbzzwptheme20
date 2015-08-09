<?php include( TEMPLATEPATH . '/buzz/ComicParser.php' ); ?>

<?php get_header(); ?>

<?php
  $args = array(
    'post_type'   => "comics",
    'meta_key'    => 'ComicStatus',
    "meta_value"  => "true",
    "meta_compare"     => "LIKE"
  );

  $randArgs = array(
    'post_type'  => "comics",
    "orderby" => "rand",
    "posts_per_page" => "4"
  );
?>

     <main>
      <div class="container home">
        <h4>Featured</h4>

        <?php $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : ?>
              <?php $cnt=0; while ( $the_query->have_posts() ): ?>
              <?php if($cnt % 2 == 0) : ?>
                  <div class="row">
              <?php endif; ?>
              <?php $the_query->the_post(); $cp = new ComicParser($post); $tags = $cp->getTags(); ?>

              <div class="col s6 m6">
                <div class="card">
                  <div class="card-image col s12 m6">
                    <a href="<?php echo get_permalink($cp->getId()); ?>"><img src="<?php echo $cp->getThumbnail(); ?>" alt="<?php echo $cp->getTitle();?>"></a>
                    <p class="hide-on-med-and-up">
                      <strong><a href="<?php echo get_permalink($cp->getId()); ?>"><?php echo $cp->getTitle(); ?></a></strong>
                    </p>
                  </div>
                  <div class="card-content hide-on-small-only">
                    <p><h5><?php echo $cp->getTitle(); ?></h5></p>
                    <p>
                        <!-- TODO FIXME TAG TAGS -->
                        <?php if ($tags): ?>
                          <?php foreach($tags as $tag) : ?>
                            <span class="badge blue-grey white-text"><?php echo $tag->name; ?></span>
                          <?php endforeach; ?>
                        <?php endif; ?>
                    </p>
                    <p class="short-description"><?php echo $cp->getExcerpt(); ?></p>
                    <hr>
                    <p>
                      <a href="<?php echo get_permalink($cp->getId()); ?>" class="waves-effect waves-light btn blue-grey">Read it</a>
                    </p>
                  </div>
                </div>
              </div>
    
              <?php $cnt++; ?>

              <?php if ($cnt % 2 == 0 || $cnt == $the_query->found_posts) : ?>
                  </div> <!-- .row -->
              <?php endif; ?>

            <?php endwhile; ?>
    
        <?php endif; wp_reset_postdata(); ?>




        <div class="row">
          <div class="col s6 m6">
            <div class="card">
              <div class="card-image col s12 m6">
                <a href="single.html"><img src="images/potauk10.jpg"></a>
                <p class="hide-on-med-and-up">
                  <strong><a href="single.html">Planet Of The Apes #10</a></strong>
                </p>
              </div>
              <div class="card-content hide-on-small-only">
                <p><h5>Planet Of The Apes #10</h5></p>
                <p>
                  <a href="#"><span class="badge blue-grey white-text">classic</span></a>
                  <a href="#"><span class="badge blue-grey white-text">bw</span></a>
                </p>
                <p class="short-description">I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                <hr>
                <p>
                  <a href="single.html" class="waves-effect waves-light btn blue-grey">Read it</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col s6 m6">
            <div class="card">
              <div class="card-image col s12 m6">
                <img src="images/grdp.jpg">

                <p class="hide-on-med-and-up">
                  <strong><a href="#">Ghost Rider - Something Something Here</a></strong>
                </p>
              </div>
              <div class="card-content hide-on-small-only">
                <p><h5>Ghost Rider - Something Something Here</h5></p>
                <p>
                  <a href="#"><span class="badge blue-grey white-text">classic</span></a>
                  <a href="#"><span class="badge blue-grey white-text">adventure</span></a>
                </p>

                <p class="short-description">When I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                <hr>
                <p>
                  <a href="#" class="waves-effect waves-light btn blue-grey">Read it</a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- .row -->

        <div class="row">
          <div class="col s6 m6">
            <div class="card">
              <div class="card-image col s12 m6">
                <img src="images/rs11.jpg">
                <p class="hide-on-med-and-up">
                  <strong><a href="single.html">Red Storm - Chapter #11</a></strong>
                </p>
              </div>
              <div class="card-content hide-on-small-only">
                <p><h5>Red Storm - Chapter #11</h5></p>
                <p>
                  <a href="#"><span class="badge blue-grey white-text">manga</span></a>
                  <a href="#"><span class="badge blue-grey white-text">scifi</span></a>
                </p>
                <p class="short-description"></p>
                <hr>
                <p>
                  <a href="#" class="waves-effect waves-light btn blue-grey">Read it</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col s6 m6">
            <div class="card">
              <div class="card-image col s12 m6">
                <img src="images/lggog.jpg">

                <p class="hide-on-med-and-up">
                  <strong><a href="#">Little Green God Of Agony</a></strong>
                </p>
              </div>
              <div class="card-content hide-on-small-only">
                <p><h5>Little Green God Of Agony</h5></p>
                <p>
                  <a href="#"><span class="badge blue-grey white-text">classic</span></a>
                  <a href="#"><span class="badge blue-grey white-text">adventure</span></a>
                </p>

                <p class="short-description">When I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                <hr>
                <p>
                  <a href="#" class="waves-effect waves-light btn blue-grey">Read it</a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- .row -->

      </div> <!-- .container -->
    </main>
 

<?php get_footer(); ?>

<?php return ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<?php
  $args = array(
    'post_type'   => "comics",
    'meta_key'    => 'ComicStatus',
    "meta_value"  => "true",
    "meta_compare"     => "LIKE"
  );

  $randArgs = array(
    'post_type'  => "comics",
    "orderby" => "rand",
    "posts_per_page" => "4"
  );
?>

<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">
      <p></p>
      <div id="buzzCarousel" class="carousel slide" data-ride="carousel">

        <?php $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : ?>
                <div class="carousel-inner">
              <?php $cnt=0; while ( $the_query->have_posts() ): ?>
              <?php if($cnt == 0 || $cnt % 3 == 0) : ?>
                  <div class="item <?php echo $cnt == 0 ? "active" : "" ?>">
              <?php endif; ?>
              <?php $the_query->the_post(); $cp = new ComicParser($post); ?>
                <div class="featured-wrapper">
                  <a class="featured-link" href="<?php echo get_permalink($cp->getId()); ?>"><img class="img-responsive" src="<?php echo $cp->getCover(); ?>" alt="<?php echo $cp->getTitle(); ?>"></a>
                  <div class="featured-info-wrapper">
                    <h1><a class="featured-link" href="<?php echo get_permalink($cp->getId()); ?>"><?php echo $cp->getTitle(); ?></a></h1>
                  </div>
                </div>
              <?php $cnt++; ?>

              <?php if ($cnt ==0 || $cnt % 3 == 0 || $cnt == $the_query->found_posts) : ?>
                  </div>
              <?php endif; ?>

            <?php endwhile; ?>
                </div>
    
            <a class="left carousel-control" onclick="return false;" href="#buzzCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" onclick="return false;" href="#buzzCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
   
        <?php endif; wp_reset_postdata(); ?>
      </div>
      <p></p>
      <p></p>
      <?php $the_query3 = new WP_Query( $randArgs ); if ( $the_query3->have_posts() ) : ?>
        <div class="row text-center random-four">
        <?php $cnt=0; while ( $the_query3->have_posts() ): ?>
          <?php $the_query3->the_post(); $cp = new ComicParser($post); ?>
            <div class="col-lg-6 col-md-6 portfolio-item">
              <div class="random-four-img-wrapper">
                <a href="<?php echo get_permalink($cp->getId()); ?>">
                  <img class="img-responsive" src="<?php echo $cp->getThumbnail(); ?>">
                </a>
              </div>
              <h3><a href="<?php echo get_permalink($cp->getId()); ?>"><?php echo $cp->getTitle(); ?></a></h3>
              <p><?php echo $cp->getExcerpt(); ?></p>
            </div>
        <?php endwhile; ?>
        </div>
      <?php endif; wp_reset_postdata(); ?>
    </div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
