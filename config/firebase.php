<?php

declare(strict_types=1);

return [
    /*
     * ------------------------------------------------------------------------
     * Default Firebase project
     * ------------------------------------------------------------------------
     */

    'default' => env('FIREBASE_PROJECT', 'app'),

    /*
     * ------------------------------------------------------------------------
     * Firebase project configurations
     * ------------------------------------------------------------------------
     */

    'projects' => [
        'app' => [

            /*
             * ------------------------------------------------------------------------
             * Credentials / Service Account
             * ------------------------------------------------------------------------
             *
             * In order to access a Firebase project and its related services using a
             * server SDK, requests must be authenticated. For server-to-server
             * communication this is done with a Service Account.
             *
             * If you don't already have generated a Service Account, you can do so by
             * following the instructions from the official documentation pages at
             *
             * https://firebase.google.com/docs/admin/setup#initialize_the_sdk
             *
             * Once you have downloaded the Service Account JSON file, you can use it
             * to configure the package.
             *
             * If you don't provide credentials, the Firebase Admin SDK will try to
             * auto-discover them
             *
             * - by checking the environment variable FIREBASE_CREDENTIALS
             * - by checking the environment variable GOOGLE_APPLICATION_CREDENTIALS
             * - by trying to find Google's well known file
             * - by checking if the application is running on GCE/GCP
             *
             * If no credentials file can be found, an exception will be thrown the
             * first time you try to access a component of the Firebase Admin SDK.
             *
             */

            'credentials' => [
                'type' => 'service_account',
                'project_id' => 'cars-market-5bda3',
                'private_key_id' => '865b834a02aee2c347309c58e00569cec9c827ab',
                'private_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCe+/pPLB/BOHAu\n/hTqWsksK9lpIw9kA/sIJ/G79PJHQB2vv9BT14EickMmT8x+w4x4AtITP2XnUTF8\nsCH5LZd9J6XwvIR6+Zc7uJv1fhRG8Ys3tYYLI4l1QYYgxy4R8+nV41UrgJZmyfeQ\nxfpqKQcc9evYgANdlVPRnzERsxiW4v8H6NctLL9WrQQFKhC0GY1lHDX5OFe0kn3l\nFAmbkv9lrzyRAZsJ79Y+ljFc7BXhUANEHyL6t5T3SaJDJtVrCD4M5VmrV7apSQqz\n7n5kYBLw5qEuHrtDFn3m3/KH1UfFlFkaPVQr+SrJqzzP03EgvI2YMP8ueqXLJ9o4\nDh/e1W4DAgMBAAECggEAQZ6rYAZMTQooc5z3sQsrwYmPwO9xqMxjzqf+BKBDZ9k0\n55d6O0DV0gvrX2LMev3neplfcAZY3zMKA/cG7rw8rLGysjx9Sey+2S2HYbpaUDXe\nSm4oF2zhjX4wCFNt1ocgWuHsA3qdmWt/PUgZ5bttbiyq3b9opDXAVOMp865CVfRQ\nbPvkr3cIhw1g+60DWkP3JwLRDquFwT2GiQaeFQHJzUuTHOb3NfwRWzFCZf4HZNq/\ndgAgP679/b4b8Xx/1sf6gUrqG0/r8vNi2xrNy1QFNfiQtvHxUQh0rZPnQ7JHp42x\n5l0d2I/dLMkuBpbqokDajycw17u5S56xvIQEjqV5kQKBgQDYp9lt4HvQeghkt/3/\n4XkTlArV7+/X9o7aAp6nvsWuY5OX+Uy7s6sRAka182Fibo5WzcuKE+Nyw9hJJncf\nac3k3ywGQ5Cs3tM0EOx2t/mefqH3B9mIG+LY8g6fYclzC5q/lbqWGbKtMfutpDgF\nZWS4A+5IiB11jnh3NC67YF2FDQKBgQC72wglaUZjTjr3YcjfrH5atXilKnVVz0iF\nXhqJaA5OpqKiCGcPBr2JaVWK+mSfsrZtcbFwguV+Wp9iPTghe/om0X5j1SlgMELK\nq28fN/BDjj7sScqyJnJfyx0uDb9BOQtSRbxzoYZHt7CEU6soQvxA3Mty4RKyhinR\nj8VpznUbTwKBgBytoy9TLrB65s+GN13+l4tK5mBJQWNB5Mjg3eVwcDRUQ/4y5sBV\n2QgIWBnPnI1t+vNsjEu7tDjFycRtDgmfdLyd+fLeULFBUY2ry9EvKyCavI+5f0bw\nAggbimn4hLTwzUwc4rTps+gPHLRwb2XvdPSSuKDrO5MLB9EnnCP7boWlAoGAJENM\n2EPxNXxFf7mdmCfpIEOFrYR7r/vaiPw4bSvsDxy1qkeq9Uicz+jIfZKGWBmcg5X9\n5bUu7ew6djFRI42WJWYtWsIsQYgvbIYZZlJbC/9qgBxih29KhtljoZ8/uyxy1gfm\nMAAPNsrrxS+Ni7Ealr7Iez2daV7itbRmLF2RV5sCgYEApso8v4u+rlI+NT2YNLrw\nTzh0zWUHVGRuh4jiU1X/M93magvkFb23naDc6opCJCHwh4Jfs6+I9UFqifKdQBxg\nQYhf/XoKJbs7OjQHMqgo6mcqPxUjSAELgyiuwrNRpnDd761QrKtCNbMon5EUrlcA\nMSob/KJAgzjogztF/Sp3qow=\n-----END PRIVATE KEY-----\n",
                'client_email' => 'firebase-adminsdk-fbsvc@cars-market-5bda3.iam.gserviceaccount.com',
                'client_id' => '116763663029938120657',
                'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
                'token_uri' => 'https://oauth2.googleapis.com/token',
                'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
                'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-fbsvc%40cars-market-5bda3.iam.gserviceaccount.com',
                'universe_domain' => 'googleapis.com',
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Auth Component
             * ------------------------------------------------------------------------
             */

            'auth' => [
                'tenant_id' => env('FIREBASE_AUTH_TENANT_ID'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firestore Component
             * ------------------------------------------------------------------------
             */

            'firestore' => [

                /*
                 * If you want to access a Firestore database other than the default database,
                 * enter its name here.
                 *
                 * By default, the Firestore client will connect to the `(default)` database.
                 *
                 * https://firebase.google.com/docs/firestore/manage-databases
                 */

                // 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Realtime Database
             * ------------------------------------------------------------------------
             */

            'database' => [

                /*
                 * In most of the cases the project ID defined in the credentials file
                 * determines the URL of your project's Realtime Database. If the
                 * connection to the Realtime Database fails, you can override
                 * its URL with the value you see at
                 *
                 * https://console.firebase.google.com/u/1/project/_/database
                 *
                 * Please make sure that you use a full URL like, for example,
                 * https://my-project-id.firebaseio.com
                 */

                'url' => env('FIREBASE_DATABASE_URL'),

                /*
                 * As a best practice, a service should have access to only the resources it needs.
                 * To get more fine-grained control over the resources a Firebase app instance can access,
                 * use a unique identifier in your Security Rules to represent your service.
                 *
                 * https://firebase.google.com/docs/database/admin/start#authenticate-with-limited-privileges
                 */

                // 'auth_variable_override' => [
                //     'uid' => 'my-service-worker'
                // ],

            ],

            'dynamic_links' => [

                /*
                 * Dynamic links can be built with any URL prefix registered on
                 *
                 * https://console.firebase.google.com/u/1/project/_/durablelinks/links/
                 *
                 * You can define one of those domains as the default for new Dynamic
                 * Links created within your project.
                 *
                 * The value must be a valid domain, for example,
                 * https://example.page.link
                 */

                'default_domain' => env('FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Cloud Storage
             * ------------------------------------------------------------------------
             */

            'storage' => [

                /*
                 * Your project's default storage bucket usually uses the project ID
                 * as its name. If you have multiple storage buckets and want to
                 * use another one as the default for your application, you can
                 * override it here.
                 */

                'default_bucket' => env('FIREBASE_STORAGE_DEFAULT_BUCKET'),

            ],

            /*
             * ------------------------------------------------------------------------
             * Caching
             * ------------------------------------------------------------------------
             *
             * The Firebase Admin SDK can cache some data returned from the Firebase
             * API, for example Google's public keys used to verify ID tokens.
             *
             */

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            /*
             * ------------------------------------------------------------------------
             * Logging
             * ------------------------------------------------------------------------
             *
             * Enable logging of HTTP interaction for insights and/or debugging.
             *
             * Log channels are defined in config/logging.php
             *
             * Successful HTTP messages are logged with the log level 'info'.
             * Failed HTTP messages are logged with the log level 'notice'.
             *
             * Note: Using the same channel for simple and debug logs will result in
             * two entries per request and response.
             */

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
                'http_debug_log_channel' => env('FIREBASE_HTTP_DEBUG_LOG_CHANNEL'),
            ],

            /*
             * ------------------------------------------------------------------------
             * HTTP Client Options
             * ------------------------------------------------------------------------
             *
             * Behavior of the HTTP Client performing the API requests
             */

            'http_client_options' => [

                /*
                 * Use a proxy that all API requests should be passed through.
                 * (default: none)
                 */

                'proxy' => env('FIREBASE_HTTP_CLIENT_PROXY'),

                /*
                 * Set the maximum amount of seconds (float) that can pass before
                 * a request is considered timed out
                 *
                 * The default time out can be reviewed at
                 * https://github.com/kreait/firebase-php/blob/6.x/src/Firebase/Http/HttpClientOptions.php
                 */

                'timeout' => env('FIREBASE_HTTP_CLIENT_TIMEOUT'),

                'guzzle_middlewares' => [],
            ],
        ],
    ],
];
