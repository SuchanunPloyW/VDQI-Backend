<?php
return [
  'paths' => ['api/', '*'],
  'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
  'allowed_origins' => ['http://localhost:58531', 'http://localhost:8080'],
  'allowed_origins_patterns' => [],
  'allowed_headers' => ['*'],
  'exposed_headers' => [],
  'max_age' => 0,
  'supports_credentials' => true,

];