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
function pgn_github_link_callback() {
  global $general_options;
    echo '<input type="text" id="github_link_id" name="pgn_general_page_option[github_link]" value="' . $general_options['github_link']. '"></input>';
}
function pgn_vk_link_callback() {
  global $general_options;
    echo '<input type="text" id="vk_link_id" name="pgn_general_page_option[vk_link]" value="' . $general_options['vk_link']. '"></input>';
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
