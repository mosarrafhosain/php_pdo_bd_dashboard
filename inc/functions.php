<?php

function get_uri_segments()
{
  return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

function get_uri_segment($n)
{
  $segs = get_uri_segments();
  return count(@$segs) > 0 && @count(@$segs) >= ( $n - 1 ) ? @$segs[$n] : '';
}

#Get base name
function base_name()
{
  return basename($_SERVER['SCRIPT_NAME']);
}

#Get base url
function base_url($uri = "")
{
  $base_url = ( ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ) ? "https" : "http" );
  $base_url .= "://";
  $base_url .= $_SERVER['HTTP_HOST'];
  $base_url .= str_replace(base_name(), "", $_SERVER['SCRIPT_NAME']);
  $base_url .= $uri;
  return $base_url;
}
