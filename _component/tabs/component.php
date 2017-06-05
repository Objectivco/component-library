<?php
$nav_count = 0;
$tab_count = 0;
?>
<?php if ( have_rows( 'tabs' ) ): ?>
    
    <div class="Tabs">
    
        <?php while( have_rows( 'tabs' ) ): the_row(); ?>
            <nav class="Tabs-nav">
                <a href="#" class="Tabs-link <?php echo ( $nav_count == 0 ? 'is-active': '' ); ?>"><?php the_sub_field( 'tab_title' ); ?></a>
            </nav><!-- //.Tabs-nav -->
            <?php $nav_count++; ?>
        <?php endwhile; ?>
        
        <?php while( have_rows( 'tabs' ) ): the_row(); ?>
            <div class="Tab <?php echo ( $tab_count == 0 ? 'is-active': '' ); ?>">
                <?php the_sub_field( 'tab_content' ); ?>
            </div><!-- //.Tab -->
            <?php $tab_count++; ?>
        <?php endwhile; ?>
            
    </div><!-- //.Tabs -->

<?php endif; ?>