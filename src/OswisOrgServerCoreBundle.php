<?php

declare(strict_types=1);

namespace OswisOrg\ServerCoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OswisOrgServerCoreBundle extends Bundle
{
    final public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
