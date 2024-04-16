<?php



return [
    'plantlist'=> 'قائمة النباتات',
    'actions' => [
        'search'=> 'بحث',
        'add' => 'إضافة',
        'delete' => 'حذف',
        'deleteselected' => 'حذف',
        'import' => 'استيراد',
        'export' => 'تصدير',
        'submit'=> 'إرسال',
        'edit'=> 'تعديل',
    ],
    'attr' => [
        'code'=> 'الرقم',
        'variety' => 'النوع',
        'certified' => 'معتمد',
        'quantity' => 'العدد',
        'age' => 'العمر',
        'place' => 'المكان',
        'lot'=> 'Lot',
        'certification'=> 'الشهادة',
        'transplantingdate'=> 'تاريخ الزرع',
        'omv'=> 'OMV',
    ],
    'dashboardcomponents'=> [
        'allplants'=> 'جميع النباتات',
        'certifiedplants'=> 'النباتات المعتمدة',
    ],
    'detailsof'=> 'تفاصيل ',
    'confirm'=> 'هل أنت متأكد؟',
    'addplant'=> 'أضف نباتًا جديدًا',

    'welcome' => 'أهلا بك في التطبيق !',
    'home' => 'الرئيسية',
    'failed'   => 'بيانات الاعتماد هذه غير متطابقة مع البيانات المسجلة لدينا.',
    'throttle' => 'عدد كبير جدا من محاولات الدخول. يرجى المحاولة مرة أخرى بعد :seconds ثانية.',
    'previous' => '&laquo; السابق',
    'next'     => 'التالي &raquo;',
    'password' => 'يجب أن لا يقل طول كلمة المرور عن ستة أحرف، كما يجب أن تتطابق مع حقل التأكيد',
    'reset'    => 'تمت إعادة تعيين كلمة المرور',
    'sent'     => 'تم إرسال تفاصيل استعادة كلمة المرور الخاصة بك إلى بريدك الإلكتروني',
    'token'    => '.رمز استعادة كلمة المرور الذي أدخلته غير صحيح',
    'user'     => 'لم يتم العثور على أيّ حسابٍ بهذا العنوان الإلكتروني',
    'dashboard' => 'نظرة عامة',
    'accepted'             => 'يجب قبول :attribute',
    'active_url'           => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة',
    'before'               => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => ':attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة :attribute غير موجودة',
    'file'                 => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'               => ':attribute إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون :attribute صورةً',
    'in'                   => ':attribute غير موجود',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => ':attribute موجود',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم :attribute',
    'regex'                => 'صيغة :attribute .غير صحيحة',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'عنوان السكن',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
    ],

];
