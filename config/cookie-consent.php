<?php

return [

    /*
     * Use this setting to enable the cookie consent dialog.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * The name of the cookie in which we store if the user
     * has agreed to accept the conditions.
     */
    'cookie_name' => 'cookie_consent',

    /*
     * Set the cookie duration in days.  Default is 365 * 20.
     */
    'cookie_lifetime' => 365 * 20,

    /*
     * Choose the middleware handler to use. Available
     * handlers are 'abort' and 'continue'.
     *
     * If using the 'abort' middleware, a 403 response
     * will be returned if the user has not accepted
     * the cookie policy.
     *
     * If using the 'continue' middleware, the Laravel
     * request lifecycle will be followed regardless
          * of whether the user has accepted the cookie policy.
     */
    'middleware_handler' => env('COOKIE_CONSENT_MIDDLEWARE_HANDLER', 'continue'),

    /*
     * If the "dialog" view is used, this is the text that will
     * be shown in the cookie consent dialog.
     */
    'dialog_text' => 'This website uses cookies to ensure you get the best experience on our website.',

    /*
     * If the "dialog" view is used, this is the text that will
     * be shown on the accept button in the cookie consent dialog.
     */
    'accept_button_text' => 'Accept',

    /*
     * If the "dialog" view is used, this is the text that will
     * be shown on the refuse button in the cookie consent dialog.
     */
    'refuse_button_text' => 'Refuse',

    /*
     * The name of the view that should be used to render the
     * cookie consent dialog. Two views are provided out of the
     * box: 'cookie-consent::dialog' and 'cookie-consent::notify'.
     */
    'view' => 'cookie-consent::dialog',
];

