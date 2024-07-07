<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

interface ControllerInterface
{
    public function index(Request $request, Response $response);
    public function fetch(Request $request, Response $response, array $id);
    public function create(Request $request, Response $response);
    public function update(Request $request, Response $response, array $id);
    public function delete(Request $request, Response $response, array $id);
}