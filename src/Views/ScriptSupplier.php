<?php

namespace Goldfinch\Intsupply\Views;

use SilverStripe\View\ViewableData;
use SilverStripe\SiteConfig\SiteConfig;

class ScriptSupplier extends ViewableData
{
    protected $supplierState;

    public function __construct($state = null)
    {
        $this->supplierState = $state;
    }

    /**
     * https://developers.facebook.com/docs/meta-pixel/get-started
     */
    public function FacebookPixel()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->FacebookPixel && $cfg->FacebookPixelTrackingID) {
            return $this->customise([
                'TrackingID' => $cfg->FacebookPixelTrackingID,
            ])->renderWith('Views/ScriptSupplies/FacebookPixel');
        }
    }

    public function GTAG()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleAnalytics && $cfg->GoogleAnalyticsGTAG_ID) {
            return $this->customise([
                'TrackingID' => $cfg->GoogleAnalyticsGTAG_ID,
            ])->renderWith('Views/ScriptSupplies/GTAG');
        }
    }

    public function GTMHead()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleAnalytics && $cfg->GoogleAnalyticsGTM_ID) {
            return $this->customise([
                'TrackingID' => $cfg->GoogleAnalyticsGTM_ID,
            ])->renderWith('Views/ScriptSupplies/GTMHead');
        }
    }

    public function GTMBody()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleAnalytics && $cfg->GoogleAnalyticsGTM_ID) {
            return $this->customise([
                'TrackingID' => $cfg->GoogleAnalyticsGTM_ID,
            ])->renderWith('Views/ScriptSupplies/GTMBody');
        }
    }

    public function YandexMetrika()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->YandexMetrika && $cfg->YandexMetrika_ID) {
            return $this->customise([
                'TrackingID' => $cfg->YandexMetrika_ID,
            ])->renderWith('Views/ScriptSupplies/YandexMetrika');
        }
    }

    /**
     * https://developers.google.com/recaptcha/docs/v3
     */
    public function reCAPTCHA()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleRecaptcha && $cfg->GoogleRecaptchaSiteKey) {
            return $this->customise([
                'AutomaticBind' => $cfg->GoogleRecaptchaAutomaticBind,
                'SiteKey' => $cfg->GoogleRecaptchaSiteKey,
            ])->renderWith('Views/ScriptSupplies/reCAPTCHA');
        }
    }

    public function reCAPTCHAmeta()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleRecaptcha && $cfg->GoogleRecaptchaSiteKey) {
            return $this->customise([
                'SiteKey' => $cfg->GoogleRecaptchaSiteKey,
            ])->renderWith('Views/ScriptSupplies/reCAPTCHAmeta');
        }
    }

    /**
     * https://developers.google.com/maps/documentation/javascript/load-maps-js-api#migrate-to-dynamic
     */
    public function GoogleMap()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleCloud && $cfg->GoogleCloudAPIKey) {
            return $this->customise([
                'APIKey' => $cfg->GoogleCloudAPIKey,
            ])->renderWith('Views/ScriptSupplies/GoogleMap');
        }
    }

    public function GoogleCloudMeta()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->GoogleCloud && $cfg->GoogleCloudAPIKey) {
            return $this->customise([
                'APIKey' => $cfg->GoogleCloudAPIKey,
            ])->renderWith('Views/ScriptSupplies/GoogleCloudMeta');
        }
    }

    public function HubSpot()
    {
        $cfg = SiteConfig::current_site_config();

        if ($cfg->HubSpot && $cfg->HubSpotPortalID && $cfg->HubSpotFormID) {
            return $this->customise([
                'PortalID' => $cfg->HubSpotPortalID,
                'FormID' => $cfg->HubSpotFormID,
            ])->renderWith('Views/ScriptSupplies/HubSpot');
        }
    }

    public function forTemplate()
    {
        return $this->renderWith('Views/ScriptSupplier');
    }

    public function SupplierState()
    {
        return $this->supplierState;
    }
}
