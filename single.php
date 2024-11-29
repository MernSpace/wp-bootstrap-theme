<?php get_header(); ?>
<body <?php get_body_class();?>>

<?php get_template_part('hero'); ?>


<div class="container text-center mt-5">
    <div class="row">
        <h2><?php bloginfo("description");?></h2>
        <div class="col-md-12">
            <h2><a href="<?php get_site_url('/');?>"><?php bloginfo();?></a> </h2>
        </div>
    </div>
</div>


<div class="container-fluid mt-5">
    <div class="row items-justified-center">

        <?php

        while (have_posts()):
            the_post();
            ?>
            <div class="col-md-8 mb-3" <?php post_class();?>>
                <div class="">
                    <?php
                    if(has_post_thumbnail()){
                        $Image = get_the_post_thumbnail_url(null,"large");
                        printf('<a href="%s" data-featherlight="image">',$Image);
                        the_post_thumbnail("large", array("class" => "blog-img"));
                        echo "</a>";
                    }
                    ?>
                    <div class="card-body mt-5">
                        <h5 class="card-title"><?php the_title();?> </h5>
                        <p class="card-text"><?php the_content();?></p>
                        <p>
                            <?php the_date()?> //
                            <?php the_author()?>
                        </p>
                    </div>
                </div>
            </div>
        <div class="col-md-2">
            <?php
            if(is_active_sidebar("sidebar")){
                dynamic_sidebar("sidebar");
            }
            ?>
        </div>
        <?php

        endwhile;
        ?>
    </div>

</div>

<?php if(comments_open()):?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <?php comments_template();?>
</div>
</div>
</div>
<?php endif;?>



<?php wp_footer(); ?>
<?php get_template_part('footer'); ?>
