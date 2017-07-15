<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/9/26
 * Time: 15:23
 */

namespace App\Controller;

use Bower\Traits\Pdo;
use Bower\Traits\Redis;
use Bower\Mvc\Controller;
use Bower\Traits\Sms;

class Home extends Controller
{
    use Redis,Pdo,Sms;

    public function __construct()
    {

    }

    public function index()
    {
        echo 'hello framework v3.0';

    }

}


