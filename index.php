<?php

/*
 * Google Analytics addon for Bear Framework
 * https://github.com/ivopetkov/google-analytics-bearframework-addon
 * Copyright (c) 2016 Ivo Petkov
 * Free to use under the MIT license.
 */

$app->hooks->add('responseCreated', function($response) use ($app, $context) {
    $options = $context->getOptions();
    if (!empty($options['trackingID'])) {
        $code = '<script>(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga(\'create\',\'' . htmlentities($options['trackingID']) . '\',\'auto\');ga(\'send\',\'pageview\');</script>';
        $response->content = $app->components->insertHTML($response->content, $code, 'beforeBodyEnd');
    }
});
