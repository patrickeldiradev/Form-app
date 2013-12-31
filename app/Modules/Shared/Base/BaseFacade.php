<?php

namespace App\Modules\Shared\Base;

class BaseFacade
{
    public $factory;
    /**
     * @return mixed
     */
    public function getFactory(): mixed
    {
        if(!$this->factory) {
            $this->factory = $this->resolveFactory();
        }

        return $this->factory;
    }

    public function resolveFactory()
    {
        $namespace = (new \ReflectionClass($this))->getNamespaceName();
        $strArray = explode('\\', $namespace, 4);
        $moduleName = $strArray[2];
        $factory = "\\App\\Modules\\$moduleName\\" . $moduleName . 'Factory';

        return new $factory();
    }
}
