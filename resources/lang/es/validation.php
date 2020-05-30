<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' 				=> 'El :attribute debe ser aceptado.',
    'active_url' 			=> 'El :attribute no es una URL válida.',
    'after' 				=> 'El :attribute debe ser una fecha después de :date.',
    'after_or_equal' 		=> 'El :attribute debe ser una fecha después o igual a :date.',
    'alpha' 				=> 'El :attribute sólo puede contener letras.',
    'alpha_dash' 			=> 'El :attribute sólo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' 			=> 'El :attribute sólo puede contener letras y números.',
    'array' 				=> 'El :attribute debe ser un arreglo.',
    'before' 				=> 'El :attribute debe ser una fecha después :date.',
    'before_or_equal'		=> 'El :attribute debe ser una fecha después o igual a :date.',
    'between' => [
        'numeric' 			=> 'El :attribute debe estar entre :min y :max.',
        'file' 				=> 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' 			=> 'El :attribute debe estar entre :min y :max cáracteres.',
        'array' 			=> 'El :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' 				=> 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' 			=> 'La confirmación :attribute no coincide.',
    'date' 					=> 'El :attribute no es una fecha válida.',
    'date_equals' 			=> 'El :attribute debe ser una fecha igual a :date.',
    'date_format' 			=> 'El :attribute no coincide con el formato :format.',
    'different' 			=> 'El :attribute y :other deben ser diferentes.',
    'digits' 				=> 'El :attribute debe tener :digits dígitos.',
    'digits_between' 		=> 'El :attribute debe estar entre :min y :max dígitos.',
    'dimensions' 			=> 'El :attribute tiene dimensiones de imagen no válidas.',
    'destinct' 				=> 'El campo :attribute tiene un valor duplicado.',
    'email' 				=> 'El :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' 			=> 'El :attribute debe terminar con uno de los siguientes puntos: :values',
    'exests' 				=> 'El :attribute seleccionado no es válido.',
    'file' 					=> 'El :attribute debe ser un archivo.',
    'filled' 				=> 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' 			=> 'El :attribute debe ser mayor a :value.',
        'file' 				=> 'El :attribute debe ser mayor a :value kilobytes.',
        'string' 			=> 'El :attribute debe ser mayor a :value cáracteres.',
        'array' 			=> 'El :attribute debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' 			=> 'El :attribute debe ser mayor o igual a :value.',
        'file' 				=> 'El :attribute debe ser mayor o igual a :value kilobytes.',
        'string' 			=> 'El :attribute debe ser mayor o igual a :value cáracteres.',
        'array' 			=> 'El :attribute debe tener :value elementos o más.',
    ],
    'image' 				=> 'El :attribute debe ser una imagen.',
    'in' 					=> 'El :attribute seleccionado no es válido.',
    'in_array' 				=> 'El campo :attribute no exeste en :other.',
    'integer' 				=> 'El :attribute debe ser un entero.',
    'ip' 					=> 'El :attribute debe ser una dirección IP válida.',
    'ipv4' 					=> 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' 					=> 'El :attribute debe ser una dirección IPv6 válida.',
    'json' 					=> 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' 			=> 'El :attribute debe ser menor a :value.',
        'file' 				=> 'El :attribute debe ser menor a :value kilobytes.',
        'string' 			=> 'El :attribute debe ser menor a :value cáracteres.',
        'array' 			=> 'El :attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' 			=> 'El :attribute debe ser menor o igual a :value.',
        'file' 				=> 'El :attribute debe ser menor o igual a :value kilobytes.',
        'string' 			=> 'El :attribute debe ser menor o igual a :value cáracteres.',
        'array' 			=> 'El :attribute no debe tener más de :value elementos.',
    ],
    'max' => [
        'numeric' 			=> 'El :attribute no debe ser mayor a :max.',
        'file' 				=> 'El :attribute no debe ser mayor a :max kilobytes.',
        'string' 			=> 'El :attribute no debe ser mayor a :max cáracteres.',
        'array' 			=> 'El :attribute no debe tener más de :max elementos.',
    ],
    'mimes' 				=> 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' 			=> 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' 			=> 'El :attribute debe tener como mínimo :min.',
        'file' 				=> 'El :attribute debe tener como mínimo :min kilobytes.',
        'string' 			=> 'El :attribute debe tener como mínimo :min cáracteres.',
        'array' 			=> 'El :attribute debe tener como mínimo :min elementos.',
    ],
    'not_in' 				=> 'El :attribute seleccionado no es válido.',
    'not_regex' 			=> 'El formato :attribute no es válido.',
    'numeric' 				=> 'El :attribute debe ser un número.',
    'present' 				=> 'El campo :attribute debe estar presente.',
    'regex' 				=> 'El formato :attribute no es válido.',
    'required' 				=> 'El campo :attribute es requerido.',
    'required_if' 			=> 'El campo :attribute es requerido cuando :other es :value.',
    'required_salvo que' 		=> 'El campo :attribute es requerido salvo que :other es en :values.',
    'required_with' 		=> 'El campo :attribute es requerido cuando :values esta presente.',
    'required_with_all' 	=> 'El campo :attribute es requerido cuando :values estan presentes.',
    'required_without' 		=> 'El campo :attribute es requerido cuando :values no estan presentes.',
    'required_without_all' 	=> 'El campo :attribute es requerido cuando ninguno de :values estan presentes.',
    'same' 					=> 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' 			=> 'El :attribute debe ser :size.',
        'file' 				=> 'El :attribute debe ser :size kilobytes.',
        'string' 			=> 'El :attribute debe ser :size cáracteres.',
        'array' 			=> 'El :attribute debe contener :size elementos.',
    ],
    'starts_with' 			=> 'El :attribute debe comenzar con uno de los siguientes: :values',
    'string' 				=> 'El :attribute debe ser una cadena de texto.',
    'timezone' 				=> 'El :attribute debe ser una zona válida.',
    'unique' 				=> 'El :attribute ya ha sido tomado.',
    'uploaded' 				=> 'El :attribute no ha podido cargar.',
    'url' 					=> 'El formato :attribute no es válido.',
    'uuid' 					=> 'El :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. Thes makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | El following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". Thes simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
