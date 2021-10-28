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

    'accept' => 'Attributten: skal accepteres.',
    'active_url' => 'Attributten: er ikke en gyldig URL.',
    'after' => 'Attributten: skal være en dato efter: date.',
    'after_or_equal' => 'Attributten: skal være en dato efter eller lig med: date.',
    'alpha' => 'Attributten: må kun indeholde bogstaver.',
    'alpha_dash' => 'Attributten: må kun indeholde bogstaver, tal, bindestreger og understregninger.',
    'alpha_num' => 'Attributten: må kun indeholde bogstaver og tal.',
    'array' => 'Attributten: skal være en matrix.',
    'before' => 'Attributten: skal være en dato før: dato.',
    'before_or_equal' => 'Attributten: skal være en dato før eller lig med: date.',
    'between' => [
        'numeric' => 'Attributten: skal være mellem: min og: maks.',
        'file' => 'Attributten: skal være mellem: min og: maks kilobytes.',
        'string' => 'Attributten: skal være mellem: min og: max tegn.',
        'array' => 'Attributten skal have mellem: min og: max elementer.',
    ],
    'boolean' => 'Feltet: attribut skal være sandt eller forkert.',
    'confirm' => 'Attributbekræftelsen matcher ikke.',
    'date' => 'Attributten: er ikke en gyldig dato.',
    'date_equals' => 'Attributten: skal være en dato, der er lig med: date.',
    'date_format' => 'Attributten: matcher ikke formatet: format.',
    'different' => 'The: attribute and: other must be different.',
    'digits' => 'Attributten: skal være: cifre cifre.',
    'digits_between' => 'Attributten: skal være mellem: min og: max cifre.',
    'dimensions' => 'Attributten: har ugyldige billeddimensioner.',
    'distinct' => 'Feltet: attribut har en dubleret værdi.',
    'email' => 'Attributten: skal være en gyldig e -mail -adresse.',
    'exist' => 'Den valgte: attribut er ugyldig.',
    'file' => 'Attributten: skal være en fil.',
    'filled' => 'Feltet: attribut skal have en værdi.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Attributten: skal være større end eller lig: værdi.',
        'file' => 'Attributten: skal være større end eller lig: værdi kilobytes.',
        'string' => 'Attributten: skal være større end eller lig med: værditegn.',
        'array' => 'Attributten: skal have: værdielementer eller mere.',
    ],
    'image' => 'Attributten: skal være et billede.',
    'in' => 'Den valgte: attribut er ugyldig.',
    'in_array' => 'Feltet: attribut findes ikke i: andet.',
    'integer' => 'Attributten: skal være et heltal.',
    'ip' => 'Attributten: skal være en gyldig IP -adresse.',
    'ipv4' => 'Attributten: skal være en gyldig IPv4 -adresse.',
    'ipv6' => 'Attributten: skal være en gyldig IPv6 -adresse.',
    'json' => 'Attributten: skal være en gyldig JSON -streng.',
    'lt' => [
        'numeric' => 'Attributten: skal være mindre end: værdi.',
        'file' => 'Attributten: skal være mindre end: værdi kilobytes.',
        'string' => 'Attributten: skal være mindre end: værditegn.',
        'array' => 'Attributten: skal have mindre end: værdielementer.',
    ],
    'lte' => [
        'numeric' => 'Attributten: skal være mindre end eller lig med: værdi.',
        'file' => 'Attributten: skal være mindre end eller lig: værdi kilobytes.',
        'string' => 'Attributten: skal være mindre end eller lig med: værditegn.',
        'array' => 'Attributten: må ikke have mere end: værdielementer.',
    ],
    'max' => [
        'numeric' => 'Attributten: må ikke være større end: maks.',
        'file' => 'Attributten: må ikke være større end: maks. kilobyte.',
        'string' => 'Attributten: må ikke være større end: maks. tegn.',
        'array' => 'Attributten: må ikke have mere end: maks. varer.',
    ],
    'mimes' => 'Attributten: skal være en fil af typen:: værdier.',
    'mimetypes' => 'Attributten: skal være en fil af typen:: værdier.',
    'min' => [
        'numeric' => 'Attributten: skal være mindst: min.',
        'file' => 'Attributten: skal være mindst: min kilobytes.',
        'string' => 'Attributten: skal mindst være: min tegn.',
        'array' => 'Attributten: skal mindst have: min. elementer,',
    ],
    'not_in' => 'Den valgte: attribut er ugyldig.',
    'not_regex' => 'Formatet: attribut er ugyldigt.',
    'numeric' => 'Attributten: skal være et tal.',
    'present' => 'Feltet: attribut skal være til stede.',
    'regex' => 'Formatet: attribut er ugyldigt.',
    'required' => 'Feltet: attribut er påkrævet.',
    'required_if' => 'Feltet: attribut er påkrævet, når: andet er: værdi.',
    'required_unless' => 'Feltet: attribut er påkrævet, medmindre: andet er i: værdier.',
    'required_with' => 'Feltet: attribut er påkrævet, når: værdier er til stede.',
    'required_with_all' => 'Feltet: attribut er påkrævet, når: værdier er til stede.',
    'required_without' => 'Feltet: attribut er påkrævet, når: værdier ikke er til stede.',
    'required_without_all' => 'Attributfeltet er påkrævet, når ingen af: værdier er til stede.',
    'same' => 'The: attribute and: other must match.',
    'size' => [
        'numeric' => 'Attributten: skal være: størrelse.',
        'file' => 'Attributten: skal være: størrelse kilobytes.',
        'string' => 'Attributten: skal være: størrelse tegn.',
        'array' => 'Attributten: skal indeholde: elementer i størrelsen.',
    ],
    'starts_with' => 'Attributten: skal starte med et af følgende:: værdier',
    'string' => 'Attributten: skal være en streng.',
    'timezone' => 'Attributten: skal være en gyldig zone.',
    'unique' => 'Attributten: er allerede taget.',
    'uploaded' => 'Attributten: attributten kunne ikke uploades.',
    'url' => 'Formatet: attribut er ugyldigt.',
    'uuid' => 'Attributten: skal være et gyldigt UUID.',

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
            'rule-name' => 'brugerdefineret besked',
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
