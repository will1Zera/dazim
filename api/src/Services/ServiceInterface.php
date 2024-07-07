<?php

namespace App\Services;

interface ServiceInterface
{
    public static function index(mixed $authorization);
    public static function fetch(mixed $authorization, int|string $id);
    public static function create(mixed $authorization, array $data);
    public static function update(mixed $authorization, array $data, int|string $id);
    public static function delete(mixed $authorization, int|string $id);
}