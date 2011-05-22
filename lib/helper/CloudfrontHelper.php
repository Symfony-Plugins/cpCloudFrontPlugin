<?php

function _cloudfront_base_url() {
  $prefix = sfConfig::get('app_cloudfront_images_prefix', '/images');
  if ($prefix && substr($prefix, -1) != '/') { $prefix .= '/'; }
  return sfConfig::get('app_cloudfront_url') . $prefix;
}

function cloudfront_image_tag($source, $options = array()) {
  $enabled = sfConfig::get('app_cloudfront_enable', false);
  $src = ($enabled ? _cloudfront_base_url() : '') . $source;
  return image_tag($src, $options);
}

function cloudfront_image_path($source) {
  $enabled = sfConfig::get('app_cloudfront_enable', false);
  return $enabled ? _cloudfront_base_url() . $source : image_path($source);
}

function cloudfront_submit_image_tag($source, $options = array()) {
  $enabled = sfConfig::get('app_cloudfront_enable', false);
  return submit_image_tag($enabled ? _cloudfront_base_url() . $source : $source, $options);
}
