<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_patron');
function crb_patron()
{
    Container::make('post_meta', 'Kwota')
        ->show_on_post_type('mecenasi')
        ->set_context('side')
        ->set_priority('high')
        ->add_fields(array(
            Field::make('text', 'crb_patron_donation', 'Kwota'),
        ));
}
