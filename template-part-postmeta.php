<?php global $dm_settings; ?>
<?php if ($dm_settings['show_postmeta'] != 0) : ?>
    <div class="meta">
         <?php the_time("d.m.Y"); ?>
         <?php edit_post_link(__('Edytuj','pogonlwow')); ?>
    </div>
<?php endif; ?>