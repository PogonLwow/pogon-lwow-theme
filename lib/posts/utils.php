<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_show_under_slideshow');
function crb_show_under_slideshow()
{
    Container::make('post_meta', 'Pokaż pod slideshow')
        ->show_on_post_type('post')
        ->set_context('side')
        ->set_priority('high')
        ->add_fields(array(
            Field::make("checkbox", "crb_show_under_slideshow", "Pokaż pod slideshow")
                ->set_option_value('yes')
        ));

}
