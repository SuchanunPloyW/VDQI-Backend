<?php
  return [
'paths' => ['api/', '*'],
'allowed_methods' => ['GET','POST','PUT','DELETE'],
'allowed_origins' => ['example.com', '*.example.org'],
'allowed_origins_patterns' => [],
'allowed_headers' => ['*'],
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => true,

];
