<article class="Post" id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/BlogPosting">
    <section class="Post-content" itemprop="mainEntityOfPage">
        <header>
            <!-- thanks to 10up for this -->
            <?php if ( has_post_thumbnail() ) : ?>
                <?php
                    $meta	= wp_get_attachment_metadata( get_post_thumbnail_id( get_the_ID() ) );
                    $width	= $meta['width'];
                    $height	= $meta['height'];
                ?>
                <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <?php the_post_thumbnail(); ?>
                    <meta itemprop="url" content="<?php echo esc_url( the_post_thumbnail_url() ); ?>" />
                    <meta itemprop="width" content="<?php echo esc_attr( $width ); ?>" />
                    <meta itemprop="height" content="<?php echo esc_attr( $height ); ?>" />
                </div><!--/itemprop=image-->
            <?php endif; ?>
            <h1 class="Post-title" itemprop="headline"><?php the_title(); ?></h1>
            <div class="PostMeta">
                <p><strong>Author</strong>:
                    <span itemprop="author"><?php the_author_link(); ?></span>
                </p>
                <p><strong>Publish Date</strong>:
                    <time datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php the_date(); ?></time>
                </p>
            </div>
            <div itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
                <div itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="https://placekitten.com/g/100/100" />
                    <meta itemprop="width" content="100" />
                    <meta itemprop="height" content="100" />
                </div>
                <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>" />
            </div>
        </header>
        <div class="Post-body" itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    </section>
</article>