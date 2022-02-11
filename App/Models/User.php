<?php /** @noinspection SqlNoDataSourceInspection */

namespace App\Models;

use Core\Model;

class User extends Model
{

    protected $table = "users";
    protected $guarded = ['id'];

}