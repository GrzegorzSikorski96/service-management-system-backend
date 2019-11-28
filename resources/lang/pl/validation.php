<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':Attribute musi zostać zaakceptowane.',
    'active_url' => ':Attribute nie jest prawidłowym adresem URL.',
    'after' => ':Attribute musi być datą późniejszą niż :date.',
    'after_or_equal' => ':Attribute musi być datą późniejszą lub równą :date.',
    'alpha' => ':Attribute może zawierać tylko litery.',
    'alpha_dash' => ':Attribute może zawierać tylko litery, cyfry i podkreślenia.',
    'alpha_num' => ':Attribute może zawierać tylko litery i cyfry.',
    'array' => ':Attribute musi być tablicą.',
    'before' => ':Attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal' => ':Attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'numeric' => ':Attribute musi być wartością pomiędzy :min i :max.',
        'file' => ':Attribute musi mieć pomiędzy :min a :max kilobajtów.',
        'string' => ':Attribute musi mieć pomiędzy :min a :max znaków.',
        'array' => ':Attribute musi mieć pomiędzy :min a :max pozycji.',
    ],
    'boolean' => 'pole :attribute musi być true lub false',
    'confirmed' => 'Potwierdzenie  nie zgadza się.',
    'date' => ':Attribute nie jest prawidłową datą.',
    'date_format' => ':Attribute nie zgadza się z formatem :format.',
    'different' => ':Attribute i :other muszą być różne.',
    'digits' => ':Attribute musi mieć :digits cyfr.',
    'digits_between' => ':Attribute musi mieć pomiędzy :min a :max cyfr.',
    'dimensions' => ':Attribute ma niewłaściwy rozmiar.',
    'distinct' => 'pole :attribute ma zduplikowaną wartość.',
    'email' => ':Attribute musi być odpowiednim adresem e-mail',
    'exists' => 'wybrany :attribute jest nieprawidłowy.',
    'file' => ':Attribute musi być plikiem.',
    'filled' => 'pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => ':Attribute musi być większy niż :value.',
        'file' => ':Attribute musi być większy niż :value kilobajtów.',
        'string' => ':Attribute musi mieć więcej niż :value znaków.',
        'array' => ':Attribute musi mieć więcej niż :value pozycji.',
    ],
    'gte' => [
        'numeric' => ':Attribute musi być większy bądź równy :value.',
        'file' => ':Attribute musi być większy bądź równy :value kilobajtów.',
        'string' => ':Attribute musi mieć więcej bądź równo :value znaków.',
        'array' => ':Attribute musi mieć więcej bądź równo niż :value pozycji.',
    ],
    'image' => ':Attribute musi być obrazkiem.',
    'in' => 'wybrany :attribute jest nieprawidłowy.',
    'in_array' => 'pole :attribute nie istnieje w :other.',
    'integer' => ':Attribute musi być liczbą.',
    'ip' => ':Attribute musi być poprawnym adresem IP.',
    'ipv4' => ':Attribute musi być odpowiednim ciągiem znaków IPv4.',
    'ipv6' => ':Attribute musi być odpowiednim ciągiem znaków IPv6.',
    'json' => ':Attribute musi być odpowiednim ciągiem znaków JSON.',
    'lt' => [
        'numeric' => ':Attribute musi być mniejszy niż :value.',
        'file' => ':Attribute musi być mniejszy niż :value kilobajtów.',
        'string' => ':Attribute musi mieć mniej niż :value znaków.',
        'array' => ':Attribute musi mieć mniej niż :value pozycji.',
    ],
    'lte' => [
        'numeric' => ':Attribute musi być mniejszy bądź równy :value.',
        'file' => ':Attribute musi być mniejszy bądź równy :value kilobajtów.',
        'string' => ':Attribute musi mieć mniej bądź równo :value znaków.',
        'array' => ':Attribute nie może mieć więcej niż :value pozycji.',
    ],
    'max' => [
        'numeric' => ':Attribute nie może być większy niż :max.',
        'file' => ':Attribute nie może być większy niż :max kilobajtów.',
        'string' => ':Attribute nie może mieć więcej niż :max znaków.',
        'array' => ':Attribute nie może mieć więcej niż :max pozycji.',
    ],
    'mimes' => ':Attribute musi być plikiem typu: :values.',
    'mimetypes' => ':Attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => ':Attribute musi większy lub równy :min.',
        'file' => ':Attribute musi mieć co najmniej :min kilobajtów.',
        'string' => ':Attribute musi mieć co najmniej :min znaków.',
        'array' => ':Attribute musi mieć co najmniej :min pozycji.',
    ],
    'not_in' => 'wybrany :attribute jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest niepoprawny.',
    'numeric' => ':Attribute musi być liczbą.',
    'present' => 'pole :attribute musi być obecne.',
    'regex' => 'format :attribute jest nieprawidłowy',
    'required' => 'pole :attribute jest wymagane.',
    'required_if' => 'pole :attribute jest wymagane, gdy :other ma wartość :value.',
    'required_unless' => 'pole :attribute jest wymagane, póki :other jest pomiędzy :values.',
    'required_with' => 'pole :attribute jest wymagane, gdy :values są zdefiniowane.',
    'required_with_all' => 'pole :attribute jest wymagane, gdy :values są zdefiniowane.',
    'required_without' => 'pole :attribute jest wymagane, gdy :values nie są zdefiniowane.',
    'required_without_all' => 'pole :attribute jest wymagane, gdy żadne z :values nie są zdefiniowane.',
    'same' => ':Attribute i :other muszą być takie same.',
    'size' => [
        'numeric' => ':Attribute musi wynosić :size.',
        'file' => ':Attribute musi mieć :size kilobajtów.',
        'string' => ':Attribute musi mieć :size znaków.',
        'array' => ':Attribute musi zawierać :size pozycji.',
    ],
    'string' => ':Attribute musi być ciągiem znaków.',
    'timezone' => ':Attribute musi być prawidłową strefą czasową.',
    'unique' => ':Attribute jest już zajęty.',
    'uploaded' => 'Wysyłanie :attribute nie powiodło się.',
    'url' => 'format :attribute jest nieprawidłowy.',
    'uuid' => ':Attribute musi być typem UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
            'even' => 'Wartość :attribute musi być liczbą parzystą.',
            'friendly' => 'Pole :attribute zawiera wulgarne słowo.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'password' => 'hasło',
        'description' => 'opis'
    ],

];
