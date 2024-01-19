<?php

namespace Goldfinch\Intsupply\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use LeKoala\Encrypt\EncryptHelper;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\CompositeField;
use SilverStripe\ORM\ValidationResult;
use LeKoala\Encrypt\EncryptedDBVarchar;
use LeKoala\Encrypt\HasEncryptedFields;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class SiteConfigExtension extends DataExtension
{
    use HasEncryptedFields;

    private static $db = [
        'GoogleCloud' => 'Boolean',
        'GoogleCloudAPIKey' => 'Varchar',

        'GoogleRecaptcha' => 'Boolean',
        // 'GoogleRecaptchaOnPageLoad' => 'Boolean',
        // 'GoogleRecaptchaAutomaticBind' => 'Boolean',
        'GoogleRecaptchaSiteKey' => 'Varchar',
        'GoogleRecaptchaSecretKey' => EncryptedDBVarchar::class,

        'GoogleAnalytics' => 'Boolean',
        'GoogleAnalyticsGTM_ID' => 'Varchar',
        'GoogleAnalyticsGTAG_ID' => 'Varchar',

        'YandexMetrika' => 'Boolean',
        'YandexMetrika_ID' => 'Varchar',

        'FacebookPixel' => 'Varchar',
        'FacebookPixelTrackingID' => 'Varchar',

        'CampaignMonitor' => 'Boolean',
        'CampaignMonitorAPIKey' => EncryptedDBVarchar::class,
        'CampaignMonitorListID' => EncryptedDBVarchar::class,

        'Mailchimp' => 'Boolean',
        'MailchimpAPIKey' => EncryptedDBVarchar::class,
        'MailchimpListID' => EncryptedDBVarchar::class,
        'MailchimpServer' => EncryptedDBVarchar::class,

        // 'HubSpot' => 'Boolean',
        // 'HubSpotAccessKey' => EncryptedDBVarchar::class,
        // 'HubSpotAccessClientID' => EncryptedDBVarchar::class,
        // 'HubSpotPortalID' => 'Varchar',
        // 'HubSpotFormID' => 'Varchar',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Configurations', [
            CompositeField::create(
                CheckboxField::create('GoogleAnalytics', 'Google Analytics'),
                Wrapper::create(
                    FieldGroup::create(
                        TextField::create(
                            'GoogleAnalyticsGTM_ID',
                            'Google Tag Manager ID',
                        )
                            ->setAttribute('placeholder', 'GTM-*******')
                            ->addExtraClass('fcol-6'),
                        TextField::create(
                            'GoogleAnalyticsGTAG_ID',
                            'Google Tag ID',
                        )
                            ->setAttribute('placeholder', 'G-**********')
                            ->addExtraClass('fcol-6'),
                    )->setDescription(
                        'refer to <a href="https://tagmanager.google.com/" target="_blank">tagmanager.google.com</a> | <a href="https://analytics.google.com/" target="_blank">analytics.google.com</a>',
                    ),
                )
                    ->displayIf('GoogleAnalytics')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('YandexMetrika', 'Yandex Metrika'),
                Wrapper::create(
                    TextField::create('YandexMetrika_ID', 'ID')->setDescription(
                        'refer to <a href="https://metrica.yandex.com/" target="_blank">metrica.yandex.com</a>',
                    ),
                )
                    ->displayIf('YandexMetrika')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('GoogleRecaptcha', 'Google reCAPTCHA'),
                Wrapper::create(
                    FieldGroup::create(
                        TextField::create(
                            'GoogleRecaptchaSiteKey',
                            'Site Key',
                        )->addExtraClass('fcol-6'),
                        TextField::create(
                            'GoogleRecaptchaSecretKey',
                            'Secret Key',
                        )->addExtraClass('fcol-6 fcol-6-mr0'),
                        // CheckboxField::create('GoogleRecaptchaAutomaticBind', 'Automatic bind'),
                        // CheckboxField::create('GoogleRecaptchaOnPageLoad', 'Load script with each page load')->setDescription('by default recaptcha does not'),
                    )->setDescription(
                        'refer to <a href="https://www.google.com/recaptcha/admin" target="_blank">google.com/recaptcha</a>, <a href="https://developers.google.com/recaptcha/docs/v3#automatically_bind_the_challenge_to_a_button" target="_blank">*Automatically bind</a>',
                    ),
                )
                    ->displayIf('GoogleRecaptcha')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('GoogleCloud', 'Google Cloud'),
                Wrapper::create(
                    TextField::create(
                        'GoogleCloudAPIKey',
                        'API Key',
                    )->setDescription(
                        'refer to <a href="https://console.cloud.google.com/apis/credentials" target="_blank">console.cloud.google.com/apis/credentials</a>',
                    ),
                )
                    ->displayIf('GoogleCloud')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('FacebookPixel', 'Facebook Pixel'),
                Wrapper::create(
                    FieldGroup::create(
                        TextField::create(
                            'FacebookPixelTrackingID',
                            'Tracking ID',
                        )->addExtraClass('fcol-6 fcol-6-mr0'),
                    )->setDescription(
                        'refer to <a href="https://www.facebook.com/business/help/742478679120153?id=1205376682832142" target="_blank">facebook.com/business/help</a>',
                    ),
                )
                    ->displayIf('FacebookPixel')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('CampaignMonitor', 'Campaign Monitor'),
                Wrapper::create(
                    FieldGroup::create(
                        TextField::create(
                            'CampaignMonitorAPIKey',
                            'API Key',
                        )->addExtraClass('fcol-6'),
                        TextField::create(
                            'CampaignMonitorListID',
                            'List ID',
                        )->addExtraClass('fcol-6'),
                    )->setDescription(
                        'refer to <a href="https://www.campaignmonitor.com/api/" target="_blank">www.campaignmonitor.com/api</a>',
                    ),
                )
                    ->displayIf('CampaignMonitor')
                    ->isChecked()
                    ->end(),
            ),

            CompositeField::create(
                CheckboxField::create('Mailchimp'),
                Wrapper::create(
                    FieldGroup::create(
                        TextField::create(
                            'MailchimpAPIKey',
                            'API Key',
                        )->addExtraClass('fcol-6'),
                        TextField::create(
                            'MailchimpServer',
                            'Server',
                        )->addExtraClass('fcol-6'),
                        TextField::create(
                            'MailchimpListID',
                            'List ID',
                        )->addExtraClass('fcol-6'),
                    )->setDescription(
                        'refer to <a href="https://mailchimp.com/help/about-api-keys/" target="_blank">mailchimp.com/help/about-api-keys</a>',
                    ),
                )
                    ->displayIf('Mailchimp')
                    ->isChecked()
                    ->end(),
            ),

            // CompositeField::create(

            //     CheckboxField::create('HubSpot', 'Hub Spot'),
            //     Wrapper::create(

            //         FieldGroup::create(

            //             TextField::create('HubSpotAccessKey', 'Access Key')->addExtraClass('fcol-6'),
            //             TextField::create('HubSpotAccessClientID', 'Client ID')->addExtraClass('fcol-6'),
            //             TextField::create('HubSpotPortalID', 'Portal ID')->addExtraClass('fcol-6'),
            //             TextField::create('HubSpotFormID', 'Form ID')->addExtraClass('fcol-6'),

            //         )->setDescription('refer to <a href="https://developers.hubspot.com/docs/api/overview" target="_blank">developers.hubspot.com/docs/api/overview</a>'),

            //     )->displayIf('HubSpot')->isChecked()->end(),

            // ),
        ]);

        // Set Encrypted Data
        $this->nestEncryptedData($fields);
    }

    protected function nestEncryptedData(FieldList $fields)
    {
        foreach ($this::$db as $name => $type) {
            if (
                EncryptHelper::isEncryptedField(get_class($this->owner), $name)
            ) {
                $this->owner->$name = $this->owner->dbObject($name)->getValue();
            }
        }
    }
}
