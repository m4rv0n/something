<?php

namespace Framework;

/**
 * Class Error
 * @package Framework
 */
class Error {
    /**
     * @param $level
     * @param $message
     * @param $file
     * @param $line
     *
     * @throws \ErrorException
     */
    public static function errorHandler($level, $message, $file, $line) {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * @param \ErrorException $exception
     *
     * @throws \Exception
     */
    public static function exceptionHandler($exception) {
        $http_code = $exception->getCode();

        $http_code !== 404 ? 500 : 404;

        http_response_code($http_code);

        if (Configuration::SHOW_ERROR === \TRUE) {
            echo '<h1>Fatal error</h1>';
            echo '<p>Uncaught exception: "' . get_class($exception) . '"</p>';
            echo '<p>Message: "' . $exception->getMessage() . '"</p>';
            echo '<p>Stack trace: <pre>' . $exception->getTraceAsString() . '</pre></p>';
            echo '<p>Thrown in "' . $exception->getFile() . '" on line ' . $exception->getLine() . '</p>';
        } else {
            $error_code = self::random_str(8);
            $log        = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '_' . $error_code . '.txt';
            ini_set('error_log', $log);

            $message = 'Uncaught exception: "' . get_class($exception) . '"';
            $message .= ' with message "' . $exception->getMessage() . '"';
            $message .= '\nStack trace: ' . $exception->getTraceAsString();
            $message .= '\nThrown in "' . $exception->getFile() . '" on line ' . $exception->getLine();

            error_log($message);
            echo "Error: " . $error_code;
        }
    }

    /**
     * @param        $length
     * @param string $keyspace
     *
     * @return string
     * @throws \Exception
     */
    private static function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $pieces = [];
        $max    = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces [] = $keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }
}