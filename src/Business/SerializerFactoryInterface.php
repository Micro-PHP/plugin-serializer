<?php

namespace Micro\Plugin\Serializer\Business;

interface SerializerFactoryInterface
{
    /**
     * @return SerializerInterface
     */
    public function create(): SerializerInterface;
}
