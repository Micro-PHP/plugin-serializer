<?php

namespace Micro\Plugin\Serializer;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\KernelInterface;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Plugin\Serializer\Business\Pool\SerializerPool;
use Micro\Plugin\Serializer\Business\Serializer\SerializerInterface;
use Micro\Plugin\Serializer\Facade\SerializerFacade;
use Micro\Plugin\Serializer\Facade\SerializerFacadeInterface;

class SerializerPlugin implements DependencyProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(SerializerFacadeInterface::class, function (
            KernelInterface $kernel
        ) {
            return $this->createSerializerFacade($kernel);
        });
    }

    protected function createSerializerFacade(KernelInterface $kernel): SerializerFacadeInterface
    {
        return new SerializerFacade(
            $this->createSerializerPool($kernel)
        );
    }

    protected function createSerializerPool(KernelInterface $kernel): SerializerInterface
    {
        return new SerializerPool($kernel);
    }
}
