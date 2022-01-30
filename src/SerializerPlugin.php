<?php

namespace Micro\Plugin\Serializer;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Serializer\Business\SerializerFacade;
use Micro\Plugin\Serializer\Business\SerializerFactoryInterface;
use Micro\Plugin\Serializer\Business\SerializerFactoryProvider;
use Micro\Plugin\Serializer\Business\SerializerFactoryProviderInterface;

class SerializerPlugin extends AbstractPlugin
{
    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(
            SerializerFacadeInterface::class, function (Container $container) {
                return $this->createSerializerFacade($container);
            }
        );
    }

    /**
     * @param  Container $container
     * @return SerializerFacadeInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function createSerializerFacade(Container $container): SerializerFacadeInterface
    {
        return new SerializerFacade(
            $this->createSerializerFactoryProvider($container)
        );
    }

    /**
     * @param  Container $container
     * @return SerializerFactoryProviderInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function createSerializerFactoryProvider(Container $container): SerializerFactoryProviderInterface
    {
        $serializerFactory = $container->get(SerializerFactoryInterface::class);
        $factoryProvider = new SerializerFactoryProvider();
        $factoryProvider->setFactory($serializerFactory);

        return $factoryProvider;
    }
}
