<?php

namespace Micro\Plugin\Serializer\Business;

interface SerializerInterface
{
    /**
     * @param  object $object
     * @param  string $format
     * @param  array  $context
     * @return string
     */
    public function serialize(mixed $object, string $format, array $context = []): string;

    /**
     * @param  string $data
     * @param  string $objectClass
     * @param  string $format
     * @param  array  $options
     * @return object
     */
    public function deserialize(string $data, string $objectClass, string $format, array $options = []): mixed;
}
