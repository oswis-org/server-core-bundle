<?php

declare(strict_types=1);

namespace OswisOrg\ServerCoreBundle\State\AppUser;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;

class AppUserProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly ProcessorInterface $decorated,
    ) {
    }

    /**
     * @param array<mixed> $uriVariables
     * @param array<mixed> $context
     */
    final public function process(
        mixed $data,
        Operation $operation,
        array $uriVariables = [],
        array $context = [],
    ): mixed {
        return $this->decorated->process($data, $operation, $uriVariables, $context);
    }
}
