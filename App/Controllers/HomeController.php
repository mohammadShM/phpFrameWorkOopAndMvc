<?php
/** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpUnused */

namespace App\Controllers;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    public function index()
    {
        return View::renderTemplate('index');
    }

}