<?php

namespace Micro\Plugin\Serializer;

interface SerializerFacadeInterface
{
    public const FORMAT_JSON = 'json';
    public const FORMAT_XML = 'xml';

    /**
     * @param object $object
     * @param string $format
     * @param array $context
     * @return string
     */
    public function serialize(object $object, string $format, array $context = []): string;

    /**
     * @param string $data
     * @param string $objectClass
     * @param string $format
     * @param array $options
     * @return object
     */
    public function deserialize(string $data, string $objectClass, string $format, array $options = []): object;
}
