<?php
namespace app\index\controller;

class Error
{
    public function index() {
        abort(404);
    }
}