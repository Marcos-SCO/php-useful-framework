<?php

### Domain
define('ROOT', dirname(__FILE__, 3));
define('ROOT_URL', 'http://localhost/public/');
define('VIEWS', dirname(__FILE__, 3) . '/app/Views');

### Database 
define('HOST', 'localhost');
define('PORT', 3306);
define('DBNAME', 'db_api_rest_placeholder_mockarro');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', '');

### Timezone
define('DEFAULT_TIME_ZONE', 'America/Sao_Paulo');


### Controllers
define('CONTROLLER_PATH', 'app\\controllers\\');