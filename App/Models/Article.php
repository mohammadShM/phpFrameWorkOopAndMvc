<?php /** @noinspection SqlNoDataSourceInspection */

namespace App\Models;

use Core\Model;
use PDO;

class Article extends Model
{

    protected $table = "articles";
    protected $guarded = ['id'];

}