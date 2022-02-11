<?php

namespace Core;

use Exception;
use RuntimeException;

class Router
{

    protected array $routers = [];
    protected array $params = [];
    protected string $namespace = 'App\Controllers\\';

    public function add($route, $params): void
    {
        // remove / for start route address
        $route = preg_replace('/^\//', '', $route);
        // change all / by \
        $route = preg_replace('/\//', '\\/', $route);
        // change {...} by value
        $route = preg_replace('/{([a-z]+)}/', '(?<\1>[a-z0-9-]+)', $route);
        // add / for start and end and not problem end domain by \
        // set reqex ("/^series\/(?[a-z0-9-]+)\/episode\/(?[a-z0-9-]+)\/?$/i") for domain
        $route = '/^' . $route . '\/?$/i';
        // $actionMe = is_array($params) ? $params['uses'] : $params;
        $AllParams = null;
        if (is_string($params)) {
            [$AllParams['controller'], $AllParams['method']] = explode('@', $params);
        }
        if (is_array($params)) {
            [$AllParams['controller'], $AllParams['method']] = explode('@', $params['uses']);
            unset($params['uses']);
            $AllParams = array_merge($AllParams, $params);
        }
        // $params is array by 2 index in controller name and method name by explode @ in string in route
        $this->routers[$route] = $AllParams;
    }

    // for check has route url
    public function match($url): bool
    {
        foreach ($this->routers as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params['params'][$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function dispatch($url): void
    {
        $url = $this->removeVariablesOfQueryString($url);
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->getNamespace() . $controller;
            if (class_exists($controller)) {
                $controller_object = new $controller();
                $method = $this->params['method'];
                if (is_callable([$controller_object, $method])) {
                    if (isset($this->params['params'])) {
                        $controller_object->before();
                        echo call_user_func_array([$controller_object, $method], $this->params['params']);
                        $controller_object->after();
                    } else {
                        $controller_object->before();
                        echo $controller_object->$method();
                        $controller_object->after();
                    }
                } else {
                    throw new RuntimeException("method $method in Controller $controller_object not found", 404);
                }
            } else {
                throw new RuntimeException("Controller class $controller not found", 404);
            }
        } else {
            throw new RuntimeException("no route matched", 404);
        }
    }

    /** @noinspection PhpUnused */
    public function getRoute(): array
    {
        return $this->routers;
    }

    /** @noinspection PhpUnused */
    public function getParams(): array
    {
        return $this->params;
    }

    protected function getNamespace(): string
    {
        $namespace = $this->namespace;
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }

    protected function removeVariablesOfQueryString($url)
    {
        if ($url !== '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = "";
            }
            return $url;
        }
        return "";
    }

}