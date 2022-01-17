<?php

namespace Micro\Plugin\Serializer\Business;


use Micro\Plugin\Serializer\Exception\SerializerAdapterNotInstalledException;

interface SerializerFactoryProviderInterface
{
    /**
     * @param SerializerFactoryInterface $serializerFactory
     *
     * @return void
     */
    public function setFactory(SerializerFactoryInterface $serializerFactory): void;

    /**
     * @return SerializerFactoryInterface
     *
     * @throws SerializerAdapterNotInstalledException
     */
    public function getFactory(): SerializerFactoryInterface;
}
