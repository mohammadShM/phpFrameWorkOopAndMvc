<?php
/** @noinspection PhpVoidFunctionResultUsedInspection */

/** @noinspection PhpUnhandledExceptionInspection */

namespace Core;

use App\Config;
use ErrorException;

class Error
{

    public static bool $ERROR_LOG_BOOLEAN = Config::SHOW_DEBUG;

    /**
     * @throws ErrorException
     */
    public static function errorHandler($level, $message, $file, $line): void
    {
        if (error_reporting() !== 0) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception): void
    {
        $code = $exception->getCode();
        if ($code !== 404) {
            $code = 500;
        }
        http_response_code($code);
        if (self::$ERROR_LOG_BOOLEAN) {
            echo "<h1>Fatal error</h1>";
            echo "<h5>Code : $code</h5>";
            echo "<p>Uncaught exception: <strong>' " . get_class($exception) . " '</strong> </p>";
            echo "<p>Message : <strong>' " . $exception->getMessage() . " '</strong></p>";
            echo "<p>Stack trace : <pre>' " . $exception->getTraceAsString() . " '</pre></p>";
            echo "<p>Throw in : <strong>' " . $exception->getFile() . " '</strong> on line " . $exception->getLine() . "</p>";
        } else {
            // set file log for admin
            $log = dirname(__DIR__) . '/storage/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            $message = "=================================================================================\n";
            $message .= "#################################################################################\n";
            $message .= "<h1>Fatal error</h1>\n";
            $message .= "<h5>Code : $code</h5>\n";
            $message .= "<p>Uncaught exception: <strong>' " . get_class($exception) . " '</strong> </p>\n";
            $message .= "<p>Message : <strong>' " . $exception->getMessage() . " '</strong></p>\n";
            $message .= "<p>Stack trace : <pre>' " . $exception->getTraceAsString() . " '</pre></p>\n";
            $message .= "<p>Throw in : <strong>' " . $exception->getFile() . " '</strong> on line "
                . $exception->getLine() . "</p>\n";
            $message .= "#################################################################################\n";
            $message .= "=================================================================================\n";
            error_log($message);
            // show view for user
            echo View::renderTemplate("errors.$code");
        }
    }

}