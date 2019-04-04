<?php

function route_class()
{
    $str = str_replace('.', '-', \Route::currentRouteName());

    return $str ? $str . '-' : '';
}

function dda(...$args)
{
    $arguments = [];

    foreach ($args as $x) {
        $arguments[] = method_exists($x, 'toArray') ? $x->toArray() : $x;
    }

    count($arguments) ? dd(...$arguments) : dd('At least one argument is needed.');
}

function setting($key, $column = 'value', $default = null)
{
    $config = (new \App\Models\Config)->getAllCached()->where('name', $key)->first();

    if (isset($config->{$column}) && $config->{$column}) {
        return $config->{$column};
    } else {
        return $default;
    }
}

function format_path($path)
{
    return preg_replace('/^(\.\/|\/)/', '', str_replace('\\', '/', $path));
}

function cdn($path)
{
    $path = format_path($path);

    $commit_id = '?id=' . config('app.commit_id');

    if ($cdn = config('app.cdn')) {
        $path = "{$cdn}/{$path}{$commit_id}";
    } else {
        $path = asset($path) . $commit_id;
    }

    return $path;
}

function model_plural_name($model)
{
    return str_plural(snake_case(class_basename(get_class($model))));
}

function number_random($length = 6)
{
    $list = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    $number = '';

    for ($i = 0; $i < $length; $i++) {
        $number .= array_rand($list);
    }

    return $number;
}
