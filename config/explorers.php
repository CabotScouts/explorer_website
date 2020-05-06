<?php
// Explorer Website Specific Config

return [

  'auth_domain' => env("GOOGLE_AUTH_DOMAIN", null),

  'map' => [
    'centre' => [
      'latitude' => env("GOOGLE_MAPS_DEFAULT_CENTER_LAT", 0),
      'longitude' => env("GOOGLE_MAPS_DEFAULT_CENTER_LNG", 0)
    ],

    'zoom' => env("GOOGLE_MAPS_DEFAULT_ZOOM", 10)
  ],

  'emails' => [
    'accidents' => env("ADDRESS_ACCIDENTS", null),
    'DESC' => env("ADDRESS_DESC", null)
  ]
];
?>
