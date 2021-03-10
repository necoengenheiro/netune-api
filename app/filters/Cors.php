<?php

namespace app\filters;

use atare\turim\routing\Filter;
use atare\turim\lib\Wrapper;
use atare\turim\lib\Config;
use atare\turim\session\Auth;

Filter::add('cors', function($context){
    if($context->request->method() == 'OPTIONS'){
        $context->stop();
        $context->result = 'ok';
    }
});
