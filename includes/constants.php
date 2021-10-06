<?php

//integer constants for submissions statuses. Smaller & more secure db storage. NOT bitflags.
define('STATUS_DEFAULT', 1);
define('STATUS_SPAM', 2);
define('STATUS_POSSBILE_SPAM', 3);
define('STATUS_POSSIBLE_TEXT_SPAM', 4);

//priority constants.
define('PRIORITY_DEFAULT', 1);
define('PRIORITY_SAME_DAY', 2);
define('PRIORITY_MORNING_REPLY', 3);

//recaptcha
define('RC_SITE_KEY', '6LfQTrEcAAAAAFv_OpzVUq3QJsrGJXhJyJRFfGL_');
define('RC_SECRET_KEY', '6LfQTrEcAAAAAFyz-PIolJscQXa3ogFd2-6_aXM5');
