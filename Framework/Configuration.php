<?php

namespace Framework;

/**
 * Class Configuration
 * @package Framework
 */
class Configuration {
    /**
     * Database driver
     */
    const DB_DRIVER = 'pdo_mysql';

    /**
     * Database host
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     */
    const DB_NAME = 'something';

    /**
     * Database user
     */
    const DB_USER = 'root';

    /**
     * Database user password
     */
    const DB_PASS = '';

    /**
     * Show or hide error messages on screen
     */
    const SHOW_ERROR = \TRUE;

    /**
     * Development environment
     */
    const DEVELOPMENT = \TRUE;
}