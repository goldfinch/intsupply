<?php

namespace Goldfinch\Intsupply\Services;

use SilverStripe\SiteConfig\SiteConfig;

class ScriptSupplier
{
    protected $cfg;

    public function __construct()
    {
        $this->configInit();
    }

    private function configInit()
    {
        $this->cfg = SiteConfig::current_site_config();
    }
}
