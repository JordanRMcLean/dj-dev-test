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
