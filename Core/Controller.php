<?php

namespace Core;

class Controller
{

    public function before(): bool
    {
        // echo "Before Method <br/>";
        return true;
    }

    public function after(): bool
    {
        // echo "After Method <br/>";
        return true;
    }

}