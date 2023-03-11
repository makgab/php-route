<?php
# ******************************************************************************
# Simple URL handle in PHP
# Using the global variable $_SERVER['REQUEST_URI']
#
# Requirements:
#    * '.htaccess' file: push every request to the index.php
#    * 'AllowOverrideAllow All' in Apache config 'Directory /var/www/html'
# *******************************************************************************


$requestURL = $_SERVER['REQUEST_URI'];
echo "REQUEST: " . $requestURL . "<br><br>";


if ($requestURL == '/') {
    // do for the homepage
    echo "You are in the root URL. ( $requestURL )";
}

elseif ($requestURL == '/register' or $requestURL == '/register/' ) {
    // do for registration
    echo "You are in the register URL.";
}

elseif ($requestURL == '/product/1') {
    // do for product #1
    echo "You are in the product #1 URL.";
}

elseif ($requestURL == '/product/2') {
    // do for product #2
    echo "You are in the product #2 URL.";
}

elseif (preg_match("/product(\/[A-Za-z0-9\-]+)\/$/",$requestURL)) {
    // do for any product:  /product/55/
    echo "You are in the product Any URL.";
}

// match just "/some-unique-url"
elseif (preg_match("/([\/A-Za-z0-9\-]+)/",$requestURL)) { 
    // query database for that url variable
    echo "You are in the unique URL.";
}

// match "/some-unique-url/and-another-unique-url"
elseif (preg_match("(^\/[A-Za-z0-9\-]+\/[A-Za-z0-9\-]+)/",$requestURL)) {
    // query database for first and second variable
    echo "You are in the unique/unique URL.";
}

else {
    // 404 stuff
    echo "404 ERROR - Invalid URL!";
}

?>
