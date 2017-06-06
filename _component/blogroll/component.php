<?php if( have_posts() ): ?>
    <div itemscope itemtype="https://schema.org/Blog">
        <?php while( have_posts() ): the_post(); ?>        
            <article id="post-<?php the_ID(); ?>" class="Post" itemscope itemtype="http://schema.org/BlogPosting">
                <?php
                if ( has_post_thumbnailI() ) {
                    the_post_thumbnail();
                }
                ?>
                <header class="PostHeader">
                    <?php 
                    the_title( '<h2 class="PostTitle" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" itemprop="url" rel="bookmark">', '</a></h2>' ); ?>
                    <p>
                        <strong><?php esc_html_e( 'Publish Date', 'objectiv' ); ?></strong>:
                        <span itemprop="datePublished">
                            <time datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>" pubdate><?php the_date(); ?></time>
                        </span>
                    </p>
                    <p>
                        <strong><?php esc_html_e( 'Author', 'objectiv' ); ?></strong>:
                        <span itemprop="author"><?php the_author_link(); ?></span>
                    </p>
                </header>
                <div itemprop="description">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
<?php endif; ?>