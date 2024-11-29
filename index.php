<?php get_header(); ?>

<body <?php body_class(); ?>>



<?php get_template_part('hero'); ?>
<div class="container text-center mt-5">
    <div class="row">
        <h2><?php bloginfo("description");?></h2>
        <div class="col-md-12">
            <h2><?php bloginfo();?></h2>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-center">

        <?php

        while (have_posts()):
            the_post();
            ?>
        <div class="col mb-3" <?php post_class();?>>
            <div class="card" style="width: 18.80rem;">
                <?php
                if(has_post_thumbnail()){
                    $Image = get_the_post_thumbnail_url(null,"medium");
                    printf('<a href="%s" data-featherlight="image">',$Image);
                    the_post_thumbnail("medium", array("class" => "blog-img"));
                    echo "</a>";
                }
                ?>
                <div class="card-body">
                    <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title();?></a> </h5>
                    <p class="card-text">
                        <?php
                        if(!post_password_required()){
                            the_excerpt();
                        }
                        else{
                            echo get_the_password_form();
                        }
                        ?>
                    <p>
                        <?php the_date()?> //
                        <?php the_author()?>
                    </p>
                    <a href="<?php the_permalink();?>" class="btn btn-primary mt-3">Read More</a>
                </div>
            </div>
        </div>
        <?php

        endwhile;
        ?>
    </div>
</div>

<div class="container text-center mb-5">
    <div class="row">
        <div class="col-12">
            <div class="col-md-8">
                <?php
                the_posts_pagination(array(
                        "screen_reader" => "",
                    "prev_text" => "New Posts",
                    "next_text" => "Older Posts"
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
