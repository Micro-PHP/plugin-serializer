<?php

namespace Micro\Plugin\Serializer\Business;

use Micro\Plugin\Serializer\Exception\SerializerAdapterNotInstalledException;

class SerializerFactoryProvider implements SerializerFactoryProviderInterface
{
    /**
     * @var SerializerFactoryInterface|null
     */
    private ?SerializerFactoryInterface $serializerFactory = null;

    /**
     * @param SerializerFactoryInterface $serializerFactory
     * @return void
     */
    public function setFactory(SerializerFactoryInterface $serializerFactory): void
    {
        $this->serializerFactory = $serializerFactory;
    }

    /**
     * @return SerializerFactoryInterface
     */
    public function getFactory(): SerializerFactoryInterface
    {
        if($this->serializerFactory === null) {
            throw new SerializerAdapterNotInstalledException();
        }

        return $this->serializerFactory;
    }
}
