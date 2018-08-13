<?php

if (!function_exists('get_uri_segments'))
{
  function get_uri_segments()
  {
    return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  }
}

if (!function_exists('get_uri_segment'))
{
  function get_uri_segment($n)
  {
    $segs = get_uri_segments();
    return count(@$segs) > 0 && @count(@$segs) >= ( $n - 1 ) ? @$segs[$n] : '';
  }
}

if (!function_exists('base_name'))
{
  #Get base name
  function base_name()
  {
    return basename($_SERVER['SCRIPT_NAME']);
  }
}

if (!function_exists('base_url'))
{
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
}

if (!function_exists('redirect'))
{
  function redirect($uri = '')
  {
    header("Location: $uri");
  }
}
