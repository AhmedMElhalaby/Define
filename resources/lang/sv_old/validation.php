<?php

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

    'accept' => 'Attributet: måste accepteras.',
    'active_url' => 'Attributet: är inte en giltig webbadress.',
    'after' => 'Attributet: måste vara ett datum efter: datum.',
    'after_or_equal' => 'Attributet: måste vara ett datum efter eller lika med: date.',
    'alpha' => 'Attributet: får endast innehålla bokstäver.',
    'alpha_dash' => 'Attributet: får endast innehålla bokstäver, siffror, streck och understreck.',
    'alpha_num' => 'Attributet: får endast innehålla bokstäver och siffror.',
    'array' => 'Attributet: måste vara en array.',
    'before' => 'Attributet: måste vara ett datum före: datum.',
    'before_or_equal' => 'Attributet: måste vara ett datum före eller lika med: date.',

    'between' => [
        'numeric' => 'Attributet: måste vara mellan: min och: max.',
        'file' => 'Attributet: måste vara mellan: min och: max kilobyte.',
        'string' => 'Attributet: måste vara mellan: min och: max tecken.',
        'array' => 'Attributet: måste ha mellan: min och: max objekt.',
    ],

    'boolean' => 'Attributfältet: måste vara sant eller falskt.',
    'confirm' => 'Attributbekräftelsen matchar inte.',
    'date' => 'Attributet: är inte ett giltigt datum.',
    'date_equals' => 'Attributet: måste vara ett datum som är lika med: date.',
    'date_format' => 'Attributet: matchar inte formatet: format.',
    'different' => ': attributet och: annat måste vara annorlunda.',
    'digits' => 'Attributet: måste vara: siffror.',
    'digits_between' => 'Attributet: måste vara mellan: min och: max siffror.',
    'dimensions' => 'Attributet: har ogiltiga bilddimensioner.',
    'distinct' => 'Fältet: attribut har ett dubblettvärde.',
    'email' => 'Attributet: måste vara en giltig e -postadress.',
    'קיים' => 'Det valda: attributet är ogiltigt.',
    'file' => 'Attributet: måste vara en fil.',
    'fill' => 'Attributfältet måste ha ett värde.',

    'gt' => [
        'numeric' => 'Attributet: måste vara större än: värde.',
        'file' => 'Attributet: måste vara större än: värde kilobyte.',
        'string' => 'Attributet: måste vara större än: värde -tecken.',
        'array' => 'Attributet: måste ha mer än: värdeobjekt.',
    ],
    'gte' => [
        'numeric' => 'Attributet: måste vara större än eller lika: värde.',
        'file' => 'Attributet: måste vara större än eller lika: värde kilobyte.',
        'string' => 'Attributet: måste vara större än eller lika: värdetecken.',
        'array' => 'Attributet: måste ha: värdeobjekt eller mer.',
    ],
    'image' => 'Attributet: måste vara en bild.',
    'in' => 'Det valda: attributet är ogiltigt.',
    'in_array' => 'Attributfältet existerar inte i: other.',
    'integer' => 'Attributet: måste vara ett heltal.',
    'ip' => 'Attributet: måste vara en giltig IP -adress.',
    'ipv4' => 'Attributet: måste vara en giltig IPv4 -adress.',
    'ipv6' => 'Attributet: måste vara en giltig IPv6 -adress.',
    'json' => 'Attributet: måste vara en giltig JSON -sträng.',
    'lt' => [
        'numeric' => 'Attributet: måste vara mindre än: värde.',
        'file' => 'Attributet: måste vara mindre än: värde kilobyte.',
        'string' => 'Attributet: måste vara mindre än: värde -tecken.',
        'array' => 'Attributet: måste ha mindre än: värdeobjekt.',
    ],
    'lte' => [
        'numeric' => 'Attributet: måste vara mindre än eller lika: värde.',
        'file' => 'Attributet: måste vara mindre än eller lika: värde kilobyte.',
        'string' => 'Attributet: måste vara mindre än eller lika: värdetecken.',
        'array' => 'Attributet: får inte ha mer än: värdeobjekt.',
    ],
    'max' => [
        'numeric' => 'Attributet: får inte vara större än: max.',
        'file' => 'Attributet: får inte vara större än: max kilobyte.',
        'string' => 'Attributet: får inte vara större än: max tecken.',
        'array' => 'Attributet: får inte ha mer än: max objekt.',
    ],
    'mimes' => 'Attributet: måste vara en fil av typen:: värden.',
    'mimetypes' => 'Attributet: måste vara en fil av typen:: värden.',
    'min' => [
        'numeric' => 'Attributet: måste vara minst: min.',
        'file' => 'Attributet: måste vara minst: min kilobyte.',
        'string' => 'Attributet: måste vara minst: min tecken.',
        'array' => 'Attributet: måste ha minst: min -objekt.',
    ],
    'not_in' => 'Det valda: attributet är ogiltigt.',
    'not_regex' => 'Formatet: attribut är ogiltigt.',
    'numeric' => 'Attributet: måste vara ett tal.',
    'present' => 'Attributfältet måste vara närvarande.',
    'regex' => 'Formatet: attribut är ogiltigt.',
    'required' => 'Attributfältet är obligatoriskt.',
    'required_if' => 'Attributfältet: krävs när: annat är: värde.',
    'required_unless' => 'Attributfältet: krävs om inte: annat är i: värden.',
    'required_with' => 'Attributfältet: krävs när: värden finns.',
    'required_with_all' => 'Attributfältet: krävs när: värden finns.',
    'required_without' => 'Attributfältet krävs när: värden inte finns.',
    'required_without_all' => 'Attributfältet krävs när inget av: värden finns.',
    'same' => 'Attributet och: annat måste matcha.',

    'size' => [
        'numeric' => 'Attributet: måste vara: storlek.',
        'file' => 'Attributet: måste vara: kilobyte storlek.',
        'string' => 'Attributet: måste vara: storlekstecken.',
        'array' => 'Attributet: måste innehålla: storleksobjekt.',
    ],
    'starts_with' => 'Attributet: måste börja med något av följande:: värden',
    'string' => 'Attributet: måste vara en sträng.',
    'timezone' => 'Attributet: måste vara en giltig zon.',
    'unique' => 'Attributet: har redan tagits.',
    'uploaded' => 'Attributet: det gick inte att ladda upp.',
    'url' => 'Formatet: attribut är ogiltigt.',
    'uuid' => 'Attributet: måste vara ett giltigt UUID.',

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
            'rule-name' => 'anpassat meddelande',
            ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
