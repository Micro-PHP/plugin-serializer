<?php

namespace Micro\Plugin\Serializer\Business;

use Micro\Plugin\Amqp\Business\Message\MessageInterface;

class MessageSerialized
{
    /**
     * @param string $className
     * @param string $sourceContent
     */
    public function __construct(private string $className, private string $source)
    {
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }
}
