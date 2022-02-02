<?php

namespace Micro\Plugin\Serializer\Business;

use Micro\Plugin\Serializer\SerializerFacadeInterface;

class SerializerFacade implements SerializerFacadeInterface
{
    /**
     * @param SerializerFactoryProviderInterface $factoryProvider
     */
    public function __construct(
    private SerializerFactoryProviderInterface $factoryProvider
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function serialize(mixed $object, string $format, array $context = []): string
    {
        return $this->factoryProvider
            ->getFactory()
            ->create()
            ->serialize($object, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function deserialize(string $data, string $objectClass, string $format, array $options = []): object
    {
        return $this->factoryProvider
            ->getFactory()
            ->create()
            ->deserialize($data, $objectClass, $format, $options);
    }
}
