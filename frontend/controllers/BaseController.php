<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class BaseController
 * @package frontend\controllers
 */
class BaseController extends Controller
{
    public $enableCsrfValidation = false;
}