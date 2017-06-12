<?php

namespace Val\Pimple\Provider;

use Doctrine\ORM\Events;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Val\Doctrine\Extension\TablePrefix;

class DoctrineTablePrefixServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['dbs.event_manager'] = $app->extend('dbs.event_manager', function ($managers, $app) {
            $app['dbs.options.initializer']();

            foreach ($app['dbs.options'] as $name => $options) {
                if (isset($options['prefix'])) {
                    $tablePrefix = new TablePrefix($options['prefix']);

                    /* @var $managers \Doctrine\Common\EventManager[] */
                    $managers[$name]->addEventListener(
                        Events::loadClassMetadata,
                        $tablePrefix
                    );
                }
            }

            return $managers;
        });
    }
}
