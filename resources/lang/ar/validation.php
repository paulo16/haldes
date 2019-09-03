<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => 'يجب قبول الحقل :attribute',
    'active_url'           => "الحقل :attribute  ليس رابط صالح",
    'after'                => 'الحقل :attribute يجب ان يكون تاريخا ما بعد  :date',
    'after_or_equal'       => 'الحقل :attribute يجب ان يكون تاريخا مساويا لتاريخ   :date او بعده ',
    'alpha'                => 'الحقل :attribute يجب ان يحتوي على حورف فقط',
    'alpha_dash'           => 'الحقل :attribute يجب ان يحتوي على حروف ارقام و شرائط فقط',
    'alpha_num'            => 'الحقل :attribute يجب ان يحتوي على ارقام و حروف فقط',
    'array'                => 'الحقل :attribute يجب ان يكون جدول',
    'before'               => 'الحقل :attribute يجب ان يكون تاريخا ما قبل  :date.',
    'before_or_equal'      => 'الحقل :attribute يجب ان يكون تاريخا مساويا لتاريخ   :date او قبله .',
    'between'              => [
        'numeric' => 'قيمة  :attribute يجب ان تكون ما بين :min و :max.',
        'file'    => 'حجم ملف ال :attribute يجب ان يكون ما بين  :min و :max kilo-octets.',
        'string'  => 'النص :attribute يجب ان يحتوي على ما بين :min و :max من الرموز .',
        'array'   => 'الجدول :attributeيجب ان يحتوي ما بين  :min et :max عنصر.',
    ],
    'boolean'              => 'الحقل :attribute يجب ان ياخد القيمة صحيح او خطا.',
    'confirmed'            => 'حقل التاكيد :attribute لا يتوافق',
    'date'                 => "الحقل :attribute ليس تاريخ صالح.",
    'date_equals'          => 'الحقل :attribute يجب ان يكون تاريخا مساويا ل  :date.',
    'date_format'          => 'الحقل :attribute لا يحترم الشكل التالي :format.',
    'different'            => 'الحقل :attribute و :other يجب ان يكونا مختلفان.',
    'digits'               => 'الحقل :attribute doit contenir :digits chiffres.',
    'digits_between'       => 'الحقل :attribute doit contenir entre :min et :max chiffres.',
    'dimensions'           => "La taille de l'image :attribute n'est pas conforme.",
    'distinct'             => 'الحقل :attribute له قيمة مككررة.',
    'email'                => 'الحقل :attribute يجب ان يكون بريد الكتروني صالح.',
    'ends_with'            => 'الحقل :attribute يجب ان ينتهي بواحدة من القيم التالية : :values',
    'exists'               => 'الحقل :attribute المحدد غير صالح.',
    'file'                 => 'الحقل :attribute يجب ان يكون عبارة عن ملف.',
    'filled'               => 'الحقل :attribute يجب ان يحنوي على قيمة.',
    'gt'                   => [
        'numeric' => 'قيمة :attribute يجب ان تكون اكبر من :value.',
        'file'    => 'حجم ملف ال :attribute يجب ان يكون اكبر من :value kilo-octets.',
        'string'  => 'النص :attribute يجب ان يحتوي على اكتر من :value رمز.',
        'array'   => 'الجدول :attribute يجب ان يحتوي على اكتر من :value عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'قيمة :attribute يجب ان تكون ابر من او تساوي :value.',
        'file'    => 'حجم الملف :attribute يجب ان يكون اكبر من او يساوي :value kilo-octets.',
        'string'  => 'النص :attribute يجب ان يحتوي عللا الاقل :value رمزا.',
        'array'   => 'الجدول :attribute يجب ان يحتوي على الاقل :value عنصرا .',
    ],
    'image'                => 'الحقل :attribute يجب ان يكون عبارة عن صورة.',
    'in'                   => 'الحقل :attribute غير صالح.',
    'in_array'             => "الحقل :attribute لا يوجب باي من :other.",
    'integer'              => 'الحقل :attribute يجب ان يكون عددا صحيح.',
    'ip'                   => 'الحقل :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4'                 => 'الحقل :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6'                 => 'الحقل :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json'                 => 'الحقل :attribute يجب أن تكون وثيقة JSON صالحة.',
    'lt'                   => [
        'numeric' => 'قيمة :attribute يجب ان تكون اقل من :value.',
        'file'    => 'حجم ملف ال :attribute يجب ان يكون اقل من  :value kilo-octets.',
        'string'  => 'النص:attribute يجب ان يحتوي على الاقل  :value رمزا.',
        'array'   => 'الجدول:attribute يجب ان يحتوي على الاقل  :value عنصرا.',
    ],
    'lte'                  => [
        'numeric' => 'قيمة :attribute يجب ان تكون مساوية او اقل من  :value.',
        'file'    => 'حجم ملف ال :attribute يجب ان تكون اقل او مساوية ل :value kilo-octets.',
        'string'  => 'النص :attribute يجب ان يحتوي على الاكتر :value رمزا.',
        'array'   => 'الجدول :attribute يجب ان يحتويا على الاكتر :value عنصرا.',
    ],
    'max'                  => [
        'numeric' => 'قيمة :attribute لا يمكن ان تكون اكبر من :max.',
        'file'    => 'حجم ملف ال :attribute لا يمكن ان ينجاوز :max kilo-octets.',
        'string'  => 'النص :attribute لا يمكن ان يحتوي على اكتر من  :max caractères.',
        'array'   => 'الجدول :attribute لا يمكن ان يحتوي على اكتر من  :max عنصرا.',
    ],
    'mimes'                => 'الحقل :attribute يجب ان يكون ملف من نوع : :values.',
    'mimetypes'            => 'الحقل :attribute يجب ان يكون ملف من نوع: :values.',
    'min'                  => [
        'numeric' => 'قيمة :attribute يجب ان تكون اكبر من او تساوي:min.',
        'file'    => 'حجم ملف ال :attribute يجب ان تكون اكبر من:min kilo-octets.',
        'string'  => 'النص :attribute يجب ان يحتوي على الاقل  :min caractères.',
        'array'   => 'الجدول :attribute يجب ان يحتوي على الاقل  :min عنصرا.',
    ],
    'not_in'               => "الحقل :attribute المحدد غير صالح.",
    'not_regex'            => "تنسيق الحقل :attribute غير صالح.",
    'numeric'              => 'الحقل :attribute يجب أن يحتوي على رقم.',
    'present'              => 'الحقل :attribute يجب أن يكون حاضرا.',
    'regex'                => 'تنسيق الحقل :attribute غير صالح.',
    'required'             => 'الحقل :attribute ضروري.',
    'required_if'          => 'الحقل :attribute ضروري عندما تكون قيمة :other تساوي :value.',
    'required_unless'      => 'الحقل :attribute ضروري فقط عندما تكون قيمة :other تساوي :values.',
    'required_with'        => 'الحقل :attribute ضروري عندما تكون  :values حاضرة.',
    'required_with_all'    => 'الحقل :attribute ضروري عندما :values يكونون حاضرين.',
    'required_without'     => "الحقل :attribute ضروري عندما يكون :values ليس حاضرا.",
    'required_without_all' => "الحقل :attribute ضروري عندما تكون اي من  :values غير حاضرة.",
    'same'                 => 'الحقل :attribute و :other يجب ان يكونو متماتلين .',
    'size'                 => [
        'numeric' => 'قيمة :attribute يجب ان تكون مساوية ل  :size.',
        'file'    => 'حجم ملف ال :attribute doit être de :size kilo-octets.',
        'string'  => 'Le texte de :attribute يجب ان يحتوي على  :size رمزا.',
        'array'   => 'الجدول :attribute يجب ان يحتوي :size عنصرا.',
    ],
    'starts_with'          => 'الحقل :attribute يجب ان يبدا بقيمة من القيم التالية : :values',
    'string'               => 'الحقل :attribute doit يجب ان يكون عبارة عن سلسلة من الرموز.',
    'timezone'             => 'الحقل :attribute يجب أن تكون منطقة زمنية صالحة.',
    'unique'               => 'قيمة الحقل :attribute استعملت سابقا.',
    'uploaded'             => "ملف الحقل  :attribute لم يتمكن من الرفع.",
    'url'                  => "شكل l'URL :attribute غير صالح.",
    'uuid'                 => 'الحقل :attribute يجب أن يكون UUID صالح',
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => "اسم المستخدم",
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الاول',
        'last_name'             => 'اللقب',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تاكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'البلد',
        'address'               => 'العوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الهاتف المحمول',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'الساعة',
        'minute'                => 'الدقيقة',
        'second'                => 'التانية',
        'title'                 => 'العنوان',
        'content'               => 'المحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المقتطف',
        'date'                  => 'التاريخ',
        'time'                  => 'الساعة',
        'available'             => 'متاح',
        'size'                  => 'الحجم',
    ],
];
