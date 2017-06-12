<?php

namespace Val\Cilex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Val\Pimple\Provider\DoctrineTablePrefixServiceProvider as PimpleDoctrineTablePrefixServiceProvider;

class DoctrineTablePrefixServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $pimpleServiceProvider = new PimpleDoctrineTablePrefixServiceProvider();
        $pimpleServiceProvider->register($app);
    }
}
