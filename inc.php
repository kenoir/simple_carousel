<?php

class Utility {
    public static function fetch($url, $timeout=2) {
        return `env http_proxy=www-cache.reith.bbc.co.uk:80 https_proxy=www-cache.reith.bbc.co.uk:80 curl --connect-timeout $timeout -m$timeout -kE /etc/pki/dev13.pem: $url`;
    }
}

