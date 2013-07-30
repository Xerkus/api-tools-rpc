<?php

namespace ZF\Rpc;

use Zend\Mvc\MvcEvent;

class ConfigurationListener
{
    public function __invoke(MvcEvent $e)
    {
        $app = $e->getParam('application');
        $sm = $app->getServiceManager();

        $config = $app->getServiceManager()->get('configuration');

        $zfRpc = $sm->get('ZF\Rpc');

        if (isset($config['zf-rpc']) && is_array($config['zf-rpc'])) {
            foreach ($config['zf-rpc'] as $rpcConfig) {
                $zfRpc->configure($rpcConfig);
            }
        }

    }
}