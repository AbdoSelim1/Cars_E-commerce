<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class PermissionGenerator
{
    private array $permissions = [];

    public function generator()
    {
        foreach (Route::getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('controller', $action) && !in_array("api", $action['middleware']) && str_starts_with($action['controller'], 'App\Http\Controllers\Admin') && str_contains($action['controller'], '@')) {
                $actionArray = explode("@", $action['controller']);
                $Contorller = $actionArray[0];
                $method = $actionArray[1];
                $this->permissions[$Contorller][] = $method;
            }
        }

        return $this;
    }

    public function exceptNamespace(array $namespaces)
    {
        foreach ($this->permissions as $fullNamespace => $mathods) {
            foreach ($namespaces as $namespace) {
                if (str_starts_with($fullNamespace, $namespace)) {
                    unset($this->permissions[$fullNamespace]);
                }
            }
        }
        return $this;
    }

    public function exceptContorller(array $controllers)
    {
        foreach ($controllers as $contorller) {
            if (array_key_exists($contorller, $this->permissions)) {
                unset($this->permissions[$contorller]);
            }
        }

        return $this;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function get()
    {
        $permissions = [];
        foreach ($this->permissions as $fullNamespace => $methods) {
            $permissions[str_replace("Controller", "", last(explode('\\', $fullNamespace)))] = $methods;
        }
        return $permissions;
    }

    public function exceptMethods(array $exceptMethods)
    {
        foreach ($this->permissions as $namespace => $methods) {
            foreach ($methods as $index => $method) {
                if (in_array($method, $exceptMethods)) {
                    unset($this->permissions[$namespace][$index]);
                }
            }
        }
        return $this;
    }
}
