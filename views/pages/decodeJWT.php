<?php
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo0OCwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImRhb0BnbWFpbC5mciIsInBzZXVkbyI6IkRhb0NudCIsImlhdCI6MTYzMzQyNTg4NywiZXhwIjoxNjMzNTEyMjg3fQ.h5LvOEFdCdRRcMqXCrfZ9FMibDWbcJCxX_CsOLSedOg';

require_once ('../../config/_pass_jwt.php');
require_once ('../../next_src_wip_denis/classes/JWT.php');

$jwt = new JWT();

// var_dump($jwt->getHeaderd(TOKEN));
var_dump($jwt->check(TOKEN, SECRET));
// var_dump($jwt->getHeader(TOKEN));
// var_dump($jwt->getPayload(TOKEN));

?>