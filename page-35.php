<?php include( TEMPLATEPATH . '/buzz/ComicParser.php' ); ?>

<?php get_header(); ?>

<?php
  $args = array(
    'post_type'     => "comics",
    'meta_key'      => 'ComicStatus',
    "meta_value"    => "true",
    "meta_compare"  => "LIKE"
  );

  $randArgs = array(
    'post_type'       => "comics",
    "orderby"         => "rand",
    "posts_per_page"  => "4"
  );

  // a random set of classic comics
  $classicArgs = array_merge($randArgs, array(
    "tax_query" => array(
      array(
        "taxonomy"  => "comics-tag",
        "field"     => "slug",
        "terms"     => "classic",
        "operator"  => "in"
      )
    )
  ));
  $classicComics = get_posts($classicArgs);

  // a random set of non-classic comics
  $nonClassicArgs = array_merge($randArgs, array(
    "tax_query" => array(
      array(
        "taxonomy"  => "comics-tag",
        "field"     => "slug",
        "terms"     => "classic",
        "operator"  => "not in"
      )
    )
  ));
  $nonClassicComics = get_posts($nonClassicArgs);

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

        <?php if ( sizeof($classicComics) ) : ?>
              <h4>Random Classics</h4>
              <?php $cnt=0; foreach ( $classicComics as $classic ): ?>
              <?php if($cnt % 2 == 0) : ?>
                <div class="row">
              <?php endif; ?>
              <?php $cp = new ComicParser($classic); $tags = $cp->getTags(); ?>

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

              <?php if ($cnt % 2 == 0 || $cnt == sizeof($classicComics)) : ?>
                </div> <!-- .row -->
              <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ( sizeof($nonClassicComics) ) : ?>
              <h4>Random Contemporary</h4>
              <?php $cnt=0; foreach ( $nonClassicComics as $nonClassic ): ?>
              <?php if($cnt % 2 == 0) : ?>
                <div class="row">
              <?php endif; ?>
              <?php $cp = new ComicParser($nonClassic); $tags = $cp->getTags(); ?>

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

              <?php if ($cnt % 2 == 0 || $cnt == sizeof($nonClassicComics)) : ?>
                </div> <!-- .row -->
              <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
      </div> <!-- .container -->
    </main>
 
<?php get_footer(); ?>
