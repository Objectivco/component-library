<?php if( have_rows( 'accordion' ) ): ?>
    
    <div class="Accordion">

        <?php while( have_rows( 'accordion' ) ): the_row(); ?>

            <button class="Accordion-header" type="button"><?php the_sub_field( 'accordion_header' ); ?></button>
            <div class="Accordion-content">
                <h2 class="Accordion-label"><?php the_sub_field( 'accordion_label' ); ?></h2>
                <?php the_sub_field( 'accordion_content' ); ?>
            </div> <!-- //.Accordion-content -->

        <?php endwhile; ?>

    </div> <!-- //.accordion -->

<?php endif; ?>