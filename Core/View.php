<?php /** @noinspection RealpathInStreamContextInspection */
/** @noinspection NullPointerExceptionInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpMissingReturnTypeInspection */

namespace Core;

use Exception;
use Jenssegers\Blade\Blade;
use RuntimeException;

class View
{

    /**
     * @throws Exception
     */
    public static function render($view, $args = []): void
    {
        extract($args, EXTR_SKIP);
        $file = "../App/Views/$view.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new RuntimeException("$file not found");
        }
    }

    public static function renderTemplate($template, $args = null)
    {
        $views = realpath(__DIR__ . '/../App/Views');
        $cache = realpath(__DIR__ . '/../storage/views');
        $blade = new Blade($views, $cache);
        if (is_null($args)) {
            return $blade->make($template)->render();
        }
        return $blade->make($template, $args)->render();
    }

}