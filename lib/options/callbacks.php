<?php

// ================OGÓLNE===================== //

function pgn_fb_link_callback() {
  global $general_options;
    echo '<input type="text" id="fb_link_id" name="pgn_general_page_option[fb_link]" value="' . $general_options['fb_link']. '"></input>';
}
function pgn_twitter_link_callback() {
  global $general_options;
    echo '<input type="text" id="twitter_link_id" name="pgn_general_page_option[twitter_link]" value="' . $general_options['twitter_link']. '"></input>';
}

function pgn_store_link_callback() {
  global $general_options;
    echo '<input type="text" id="store_link_id" name="pgn_general_page_option[store_link]" value="' . $general_options['store_link']. '"></input>';
}
function pgn_position_callback() {
  global $general_options;
    echo '<input type="text" id="position_id" name="pgn_general_page_option[position]" value="' . $general_options['position']. '"></input>';
}
function pgn_table_callback() {
  global $general_options;
    echo '<input type="text" id="table_id" name="pgn_general_page_option[table]" value="' . $general_options['table']. '"></input>';
}

function pgn_patrons_pdf_callback() {
  global $general_options;
    echo '<input type="text" id="patrons_pdf_id" name="pgn_general_page_option[patrons_pdf]" value="' . $general_options['patrons_pdf']. '"></input>';
}

// ===============O NAS===================== //

function pgn_latitude_callback() {
  global $kontakt_options;
    echo '<input type="text" id="latitude_id" name="pgn_kontakt_page_option[latitude]" value="' . $kontakt_options['latitude']. '"></input>';
}
function pgn_longtitude_callback() {
  global $kontakt_options;
    echo '<input type="text" id="longtitude_id" name="pgn_kontakt_page_option[longtitude]" value="' . $kontakt_options['longtitude']. '"></input>';
}
