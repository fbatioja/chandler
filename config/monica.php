<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DEFAULT STORAGE LIMIT IN MB
    |--------------------------------------------------------------------------
    |
    | This value represents the default storage limit for every new account in
    | this instance. The value is represented in MB.
    |
    */

    'default_storage_limit_in_mb' => env('DEFAULT_STORAGE_LIMIT', 50),

    /*
    |--------------------------------------------------------------------------
    | Mapbox API key
    |--------------------------------------------------------------------------
    |
    | Used to display static maps. See https://docs.mapbox.com/help/how-mapbox-works/static-maps/
    |
    */

    'mapbox_api_key' => env('MAPBOX_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | API key for geolocation service.
    |--------------------------------------------------------------------------
    |
    | We use LocationIQ (https://locationiq.com/) to translate addresses to
    | latitude/longitude coordinates. We could use Google instead but we don't
    | want to give anything to Google, ever.
    | LocationIQ offers 10,000 free requests per day.
    |
    */

    'location_iq_api_key' => env('LOCATION_IQ_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Locationiq API Url
    |--------------------------------------------------------------------------
    |
    | Url to call LocationHQ api. See https://locationiq.com/docs
    |
    */

    'location_iq_url' => env('LOCATION_IQ_URL', 'https://us1.locationiq.com/v1/'),

    /*
    |--------------------------------------------------------------------------
    | Mapbox username
    |--------------------------------------------------------------------------
    |
    | Used to display static maps. See https://docs.mapbox.com/help/how-mapbox-works/static-maps/
    | This should be the username used when creating the account.
    |
    */

    'mapbox_api_username' => env('MAPBOX_USERNAME', null),

    /*
    |--------------------------------------------------------------------------
    | URL of the documentation center
    |--------------------------------------------------------------------------
    |
    | This platform hosts the help documentation.
    |
    */

    'help_center_url' => 'https://docs-ivory-one.vercel.app/docs/',

    /*
    |--------------------------------------------------------------------------
    | HELP CENTER URL
    |--------------------------------------------------------------------------
    |
    | These are the links that are used in the UI to point to the right help
    | section.
    |
    */

    'help_links' => [
        'last_updated_contacts' => 'vaults/dashboard#last-updated-contacts',
        'settings_preferences_help' => 'account-settings/manage-preferences#help-display',
        'settings_preferences_language' => 'account-settings/manage-preferences#language',
        'settings_preferences_contact_names' => 'account-settings/manage-preferences#customize-contact-names',
        'settings_preferences_date' => 'account-settings/manage-preferences#date-format',
        'settings_preferences_numerical_format' => 'account-settings/manage-preferences#numerical-format',
        'settings_preferences_timezone' => 'account-settings/manage-preferences#timezone',
        'settings_preferences_maps' => 'account-settings/manage-preferences#maps-preferences',
    ],
];
