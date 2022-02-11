<?php
/** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection PhpVoidFunctionResultUsedInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpUnused */

namespace App\Controllers;

use Core\Controller;
use Core\View;

class SeriesController extends Controller
{
    public function index(): string
    {
        return "Index Page <br/>";
    }

    public function serie($slug): string
    {
        return "Serie Page = Slug : $slug . <br/>";
    }

    public function episode($slug, $id)
    {
        return View::renderTemplate('series.episode', [
            "slug" => $slug,
            "id" => $id,
        ]);
    }

}