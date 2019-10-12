<?php

$config['facebook_app_id'] = 'your_facebook_app_id';
$config['facebook_api_secret'] = 'your_api_secret';
$config['facebook_default_scope'] = 'read_insights'; // E.G 'read_stream,birthday,users_events,rsvp_event'
$config['facebook_api_url'] = 'https://graph.facebook.com/'; // Just in case it changes.

//Enable or disable caching
$config['caching'] = TRUE;

//Time to cache facebook objects in minutes
$config['object_cache_time'] = 60;