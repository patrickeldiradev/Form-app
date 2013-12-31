<?php

namespace App\Modules\Shared\Base;

class BaseFacade
{
    /**
     * @return mixed
     */
    public function getFactory(): mixed
    {
        $namespace = (new \ReflectionClass($this))->getNamespaceName();
        $strArray = explode('\\',$namespace, 4);
        $moduleName = $strArray[2];
        $factory = "\\App\\Modules\\$moduleName\\" . $moduleName . 'Factory';

        return new $factory;
    }
}
