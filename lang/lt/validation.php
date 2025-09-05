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

    'accepted' => 'Laukas :attribute turi būti priimtas.',
    'accepted_if' => 'Laukas :attribute turi būti priimtas, kai :other yra :value.',
    'active_url' => 'Laukas :attribute turi būti galiojantis URL.',
    'after' => 'Lauke :attribute turi būti data po :date.',
    'after_or_equal' => 'Lauko :attribute data turi būti po :date arba jai lygi.',
    'alpha' => 'Lauke :attribute turi būti tik raidžių.',
    'alpha_dash' => 'Lauke :attribute turi būti tik raidės, skaičiai, brūkšneliai ir apatiniai brūkšniai.',
    'alpha_num' => 'Lauke :attribute turi būti tik raidės ir skaičiai.',
    'any_of' => 'Laukas :attribute yra neteisingas.',
    'array' => 'Laukas :attribute turi būti masyvas.',
    'ascii' => 'Lauke :attribute turi būti tik vieno baito raidiniai skaitmeniniai simboliai ir simboliai.',
    'before' => 'Lauke :attribute turi būti data prieš :date.',
    'before_or_equal' => 'Lauko :attribute data turi būti prieš :date arba jai lygi.',
    'tarp' => [
        'array' => 'Lauke :attribute turi būti elementų nuo :min iki :max.',
        'file' => 'Laukas :attribute turi būti nuo :min iki :max kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti tarp :min ir :max.',
        'string' => 'Laukas :attribute turi būti tarp :min ir :max simbolių.',
    ],
    'boolean' => 'Laukas :attribute turi būti teisingas arba klaidingas.',
    'can' => 'Lauke :attribute yra neleistina reikšmė.',
    'confirmed' => 'Neatitinka lauko :attribute patvirtinimas.',
    'contains' => 'Lauke :attribute trūksta būtinos reikšmės.',
    'current_password' => 'Slaptažodis neteisingas.',
    'date' => 'Laukas :attribute turi būti tinkama data.',
    'date_equals' => 'Lauko :attribute data turi būti lygi :date.',
    'date_format' => 'Laukas :attribute turi atitikti formatą :format.',
    'decimal' => 'Lauke :attribute turi būti :decimal po kablelio.',
    'declined' => 'Laukas :attribute turi būti atmestas.',
    'declined_if' => 'Laukas :attribute turi būti atmestas, kai :other yra :value.',
    'different' => 'Laukai :attribute ir :other turi skirtis.',
    'digits' => 'Lauke :attribute turi būti :digits skaitmenys.',
    'digits_between' => 'Laukas :attribute turi būti tarp :min ir :max skaitmenų.',
    'dimensions' => 'Lauke :attribute yra neteisingi vaizdo matmenys.',
    'distinct' => 'Lauko :attribute reikšmė pasikartoja.',
    'doesnt_end_with' => 'Laukas :attribute neturi baigtis vienu iš šių: :values.',
    'doesnt_start_with' => 'Laukas :attribute negali prasidėti vienu iš šių: :values.',
    'email' => 'Laukas :attribute turi būti galiojantis el. pašto adresas.',
    'ends_with' => 'Laukas :attribute turi baigtis vienu iš šių: :values.',
    'enum' => 'Pasirinktas :attribute yra neteisingas.',
    'exists' => 'Pasirinktas :attribute yra neteisingas.',
    'extensions' => 'Lauke :attribute turi būti vienas iš šių plėtinių: :values.',
    'file' => 'Laukas :attribute turi būti failas.',
    'filled' => 'Lauke :attribute turi būti reikšmė.',
    'gt' => [
        'array' => 'Lauke :attribute turi būti daugiau nei :value elementų.',
        'file' => 'Laukas :attribute turi būti didesnis nei :value kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti didesnis nei :value.',
        'string' => 'Laukas :attribute turi būti didesnis nei :value simboliai.',
    ],
    'gte' => [
        'array' => 'Lauke :attribute turi būti :value elementų ar daugiau.',
        'file' => 'Laukas :attribute turi būti didesnis arba lygus :value kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti didesnis arba lygus :value.',
        'string' => 'Laukas :attribute turi būti didesnis arba lygus simboliams :value.',
    ],
    'hex_color' => 'Lauko :attribute spalva turi būti tinkama šešioliktainė spalva.',
    'image' => 'Laukas :attribute turi būti vaizdas.',
    'in' => 'Pasirinktas :attribute yra neteisingas.',
    'in_array' => 'Laukas :attribute turi egzistuoti :other.',
    'integer' => 'Laukas :attribute turi būti sveikasis skaičius.',
    'ip' => 'Laukas :attribute turi būti galiojantis IP adresas.',
    'ipv4' => 'Laukas :attribute turi būti galiojantis IPv4 adresas.',
    'ipv6' => 'Laukas :attribute turi būti galiojantis IPv6 adresas.',
    'json' => 'Laukas :attribute turi būti tinkama JSON eilutė.',
    'list' => 'Laukas :attribute turi būti sąrašas.',
    'lowercase' => 'Laukas :attribute turi būti rašomas mažosiomis raidėmis.',
    'lt' => [
        'array' => 'Lauke :attribute turi būti mažiau nei :value elementai.',
        'file' => 'Laukas :attribute turi būti mažesnis nei :value kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti mažesnis nei :value.',
        'string' => 'Laukas :attribute turi būti mažesnis nei :value simbolių.',
    ],
    'lte' => [
        'array' => 'Lauke :attribute negali būti daugiau nei :value elementų.',
        'file' => 'Laukas :attribute turi būti mažesnis arba lygus :value kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti mažesnis arba lygus :value.',
        'string' => 'Laukas :attribute turi būti mažesnis arba lygus :value simboliams.',
    ],
    'mac_address' => 'Laukas :attribute turi būti galiojantis MAC adresas.',
    'max' => [
        'array' => 'Lauke :attribute negali būti daugiau nei :max elementų.',
        'file' => 'Laukas :attribute neturi būti didesnis nei :max kilobaitų.',
        'numeric' => 'Laukas :attribute neturi būti didesnis nei :max.',
        'string' => 'Laukas :attribute neturi būti didesnis nei :max simbolių.',
    ],
    'max_digits' => 'Lauke :attribute negali būti daugiau nei :max skaitmenų.',
    'mimes' => 'Laukas :attribute turi būti tokio tipo failas: :values.',
    'mimetypes' => 'Laukas :attribute turi būti tokio tipo failas: :values.',
    'min' => [
        'array' => 'Lauke :attribute turi būti bent :min elementų.',
        'file' => 'Laukas :attribute turi būti bent :min kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti bent :min.',
        'string' => 'Lauke :attribute turi būti bent :min simbolių.',
    ],
    'min_digits' => 'Lauke :attribute turi būti bent :min skaitmenų.',
    'missing' => 'Turi trūkti lauko :attribute.',
    'missing_if' => 'Turi trūkti lauko :attribute, kai :other yra :value.',
    'missing_unless' => 'Turi būti :attribute lauko, nebent :other yra :value.',
    'missing_with' => 'Kai yra :values, turi būti :attribute lauko.',
    'missing_with_all' => 'Turi trūkti lauko :attribute, kai yra :values.',
    'multiple_of' => 'Laukas :attribute turi būti :value kartotinis.',
    'not_in' => 'Pasirinktas :attribute yra neteisingas.',
    'not_regex' => 'Netinkamas :attribute lauko formatas.',
    'numeric' => 'Lauke :attribute turi būti skaičius.',
    'password' => [
        'letters' => 'Lauke :attribute turi būti bent viena raidė.',
        'mixed' => 'Lauke :attribute turi būti bent viena didžioji ir viena mažoji raidė.',
        'numbers' => 'Lauke :attribute turi būti bent vienas skaičius.',
        'symbols' => 'Lauke :attribute turi būti bent vienas simbolis.',
        'uncompromised' => 'Duotas :attribute atsirado duomenų nutekėjimo metu. Pasirinkite kitą :attribute.',
    ],
    'present' => 'Turi būti laukas :attribute.',
    'present_if' => 'Laukas :attribute turi būti, kai :other yra :value.',
    'present_unless' => 'Laukas :attribute turi būti, nebent :other yra :value.',
    'present_with' => 'Laukas :attribute turi būti, kai yra :values.',
    'present_with_all' => 'Laukas :attribute turi būti, kai yra :values.',
    'prohibited' => 'Laukas :attribute draudžiamas.',
    'prohibited_if' => 'Laukas :attribute yra draudžiamas, kai :other yra :value.',
    'prohibited_if_accepted' => 'Laukas :attribute yra draudžiamas, kai priimamas :other.',
    'prohibited_if_declined' => 'Laukas :attribute yra draudžiamas, kai atmetamas :other.',
    'prohibited_unless' => 'Laukas :attribute yra draudžiamas, nebent :other yra :values.',
    'prohibits' => 'Laukas :attribute draudžia būti :other.',
    'regex' => 'Netinkamas :attribute lauko formatas.',
    'required' => 'Laukas :attribute yra būtinas.',
    'required_array_keys' => 'Lauke :attribute turi būti įrašų: :values.',
    'required_if' => 'Laukas :attribute būtinas, kai :other yra :value.',
    'required_if_accepted' => 'Laukas :attribute būtinas, kai priimamas :other.',
    'required_if_declined' => 'Laukas :attribute būtinas, kai atmetamas :other.',
    'required_unless' => 'Laukas :attribute yra būtinas, nebent :other yra :values.',
    'required_with' => 'Laukas :attribute būtinas, kai yra :values.',
    'required_with_all' => 'Laukas :attribute būtinas, kai yra :values.',
    'required_without' => 'Laukas :attribute būtinas, kai :values ​​nėra.',
    'required_without_all' => 'Laukas :attribute būtinas, kai nėra nė vienos iš :reikšmių.',
    'same' => 'Laukas :attribute turi atitikti :other.',
    'size' => [
        'array' => 'Lauke :attribute turi būti :size elementai.',
        'file' => 'Laukas :attribute turi būti :size kilobaitų.',
        'numeric' => 'Laukas :attribute turi būti :size.',
        'string' => 'Lauke :attribute turi būti :size simbolių.',
    ],
    'starts_with' => 'Laukas :attribute turi prasidėti vienu iš šių: :values.',
    'string' => 'Laukas :attribute turi būti eilutė.',
    'timezone' => 'Laukas :attribute turi būti tinkama laiko juosta.',
    'unique' => ':atributas jau buvo paimtas.',
    'uploaded' => 'Nepavyko įkelti :attribute.',
    'uppercase' => 'Laukas :attribute turi būti didžiosiomis raidėmis.',
    'url' => 'Laukas :attribute turi būti galiojantis URL.',
    'ulid' => 'Laukas :attribute turi būti galiojantis ULID.',
    'uuid' => 'Laukas :attribute turi būti galiojantis UUID.',

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
