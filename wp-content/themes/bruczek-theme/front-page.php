<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

 ?>
<?php get_header(); ?>
<div class="content-wrapper">

    <?php
    if (is_home() || is_front_page()) {
        echo do_shortcode("[metaslider id=37]"); // replace 123 with your slideshow ID
    }
    ?>
    <?php $category_id = get_cat_ID('front-page'); ?>
    <?php query_posts($category_id . '&showposts=3'); ?>
    <ul class=”front-posts”>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li>
                <div class=”row”>
                    <div class=”col-md-6 „>
                        <?php the_title( '<h1>', '</h1>' ); ?>
                        <div class=”col-md-5 col-md-offset-1”>
                            <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-thumbnail')); ?>
                        </div>
                        <p><?php the_excerpt(); ?></p>
                        <a href=”<?php the_permalink(); ?>”>zobacz więcej…</a>
                    </div>
                </div>
            </li>
        <?php endwhile; else : ?>
            <p><?php _e( 'Przepraszamy, brak wpisów.' ); ?></p>
        <?php endif; ?>
    </ul>
    <div class="jumbotron">
        <h3>lorem ipsum dollor sit amet</h3>
        <p>Lorem Ipsum bullla calculata</p>
        <button type=”button” class=”btn btn-default btn-lg”>Napisz do nas</button>
        <button type=”button” class=”btn btn-default btn-lg”>Przejrzyj nasze projekty</button>
    </div>
    <?php get_footer(); ?>
</div>
