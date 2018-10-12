<?php

use Illuminate\Database\Schema\Builder as Schema;

// Decimal rule

Validator::extend('decimal', function ($attribute, $value, $parameters, $validator) {
    return (bool) preg_match("/^\d{1,{$parameters[0]}}(\.\d{1,{$parameters[1]}})?$/", $value);
});

Validator::replacer('decimal', function ($message, $attribute, $rule, $parameters) {
    return str_replace([':m', ':d'], [$parameters[0], $parameters[1]], $message);
});

// Max database string rule

Validator::extend('max_db_string', function ($attribute, $value, $parameters, $validator) {
    return is_string($value) && strlen($value) <= Schema::$defaultStringLength;
});

Validator::replacer('max_db_string', function ($message, $attribute, $rule, $parameters) {
    return str_replace([':max'], [Schema::$defaultStringLength], $message);
});

// Max database text rule

Validator::extend('max_db_text', function ($attribute, $value, $parameters, $validator) {
    return is_string($value) && strlen($value) <= 65535;
});

Validator::replacer('max_db_text', function ($message, $attribute, $rule, $parameters) {
    return str_replace([':max'], [65535], $message);
});

// Max database medum text rule

Validator::extend('max_db_text_medium', function ($attribute, $value, $parameters, $validator) {
    return is_string($value) && strlen($value) <= 16777215;
});

Validator::replacer('max_db_text_medium', function ($message, $attribute, $rule, $parameters) {
    return str_replace([':max'], [16777215], $message);
});
