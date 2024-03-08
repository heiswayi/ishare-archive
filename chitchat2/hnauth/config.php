<?php

// mysql db connection
$hndb['host'] = "localhost";
$hndb['user'] = "root";
$hndb['pass'] = "toor";
$hndb['name'] = "chitchat2";

// mysql db config (hnauth)
$hndb['table'] = 'users';

// mysql db config (chitchat)
$ccdb['chitchat'] = 'chitchat';
$ccdb['chatmsg'] = 'chatmsg';
$ccdb['onlineusers'] = 'online';
$ccdb['bookmark'] = 'bookmark';

// hnauth configurations
$hnauth['salt'] = "Yu23ds09*d?";
$hnauth['user_default_level'] = 1;
$loc = 'en'; // English

// hnauth mail config.
$hnmail['from'] = 'noreply@address.com';
$hnmail['from_name'] = 'HN AUTH SYSTEM';

// hnauth site config.
$hnsite['name'] = 'MY SITE';
$hnsite['url'] = 'http://localhost:8080/mysite';

?>