<?php
namespace app\admin\controller;

class Error
{
    public function index() {
        abort(404);
    }
}