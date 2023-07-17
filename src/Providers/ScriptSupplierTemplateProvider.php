<?php

namespace Goldfinch\Intsupply\Providers;

use Goldfinch\Intsupply\Views\ScriptSupplier;
use SilverStripe\View\TemplateGlobalProvider;

class ScriptSupplierTemplateProvider implements TemplateGlobalProvider
{
    /**
     * @return array|void
     */
    public static function get_template_global_variables(): array
    {
        return [
            'ScriptSupplier',
        ];
    }

    /**
     * @return boolean
     */
    public static function ScriptSupplier($state = null) : ScriptSupplier
    {
        return ScriptSupplier::create($state);
    }
}
