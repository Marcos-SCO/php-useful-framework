<?php

namespace App\Core;

use Exception;

class Router
{
    private function regularExpressionMatchArrayRoutes($uri, $routes)
    {
        return array_filter($routes, function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        }, ARRAY_FILTER_USE_KEY);
    }

    private function params($uri, $matchedUri)
    {
        if (!empty($matchedUri)) {
            $matchedToGetParams = array_keys($matchedUri)[0];
            return array_diff(
                // explode('/', ltrim($uri, '/')),
                $uri,
                explode('/', ltrim($matchedToGetParams, '/')),
            );
        }
        return [];
    }

    private function paramsFormat($uri, $params)
    {
        // $uri = explode('/', ltrim($uri, '/'));
        $paramsData = [];
        foreach ($params as $index => $param) {
            $paramsData[$uri[$index - 1]] = $param;
        }
        return $paramsData;
    }

    private function exactMatchUriInArrayRoutes($uri, $routes)
    {
        return array_key_exists($uri, $routes) ? [$uri => $routes[$uri]] : [];
    }

    public function run()
    {
        // $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $pathInfo = $_SERVER['PATH_INFO'] ?? '/';
        $uri = parse_url($pathInfo, PHP_URL_PATH);
        $routes = require 'routes.php';

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $matchedUri = $this->exactMatchUriInArrayRoutes($uri, $routes[$requestMethod]);

        $params = [];
        if (empty($matchedUri)) {
            $matchedUri = $this->regularExpressionMatchArrayRoutes($uri, $routes[$requestMethod]);
            $uri = explode('/', ltrim($uri, '/'));
            $params = $this->params($uri, $matchedUri);
            $params = $this->paramsFormat($uri, $params);
        }

        if (!empty($matchedUri)) return controller($matchedUri, $params);

        throw new Exception('Algo deu errado...');
    }
}
