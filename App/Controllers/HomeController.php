<?php
/** @noinspection ALL */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpMissingReturnTypeInspection */

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    public function index()
    {
        var_dump(User::query()->find(1) ? User::query()->find(1)->toArray() : "Not found");
        return View::renderTemplate('index');
    }

}