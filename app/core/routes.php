<?php

return [
  'GET' => [
    '/' => 'Home@index',
    '/usuario/[\d]+' => 'Home@getUser',
  ],
];
// return [
//   'POST' => [
//     '/login' => 'Login@store',
//     '/user/store' => 'User@store',
//   ],
//   'GET' => [
//     '/' => 'Home@index',
//     '/user/create' => 'User@create',
//     '/user/' => 'User@index',
//     '/user/[0-9]+' => 'User@show',
//     '/login' => 'Login@index',
//     '/logout' => 'Login@destroy',
//   ],
// ];