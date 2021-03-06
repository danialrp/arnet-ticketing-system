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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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
        'email' => [
            'required' => 'لطفا آدرس ایمیل را وارد کنید!',
            'email' => 'فرمت ایمیل وارد شده صحیح نمی باشد!',
            'max' => 'طول فیلد ایمیل از حد مجاز بیشتر است!',
            'unique' => 'این ایمیل توسط کاربر دیگری ثبت شده است!',
        ],

        'password' => [
            'required' => 'لطفا کلمه عبور را وارد کنید!',
            'confirmed' => 'کلمه های عبور یکسان نیستند!',
            'min' => 'کلمه عبور حداقل باید 2 حرف باشد!',
            'regex' => 'کلمه عبور باید شامل حروف کوچک و بزرگ و اعداد باشد!',
        ],

        'message_body' => [
            'required' => 'متن پیغام نمی تواند خالی باشد!',
        ],

        'priority_select' => [
            'required' => 'لطفا اولویت را مشخص نمایید!',
            'size' => 'مشکلی در انتخاب نوع اولویت وجود دارد!',
        ],

        'status_select' => [
            'required' => 'لطفا وضعیت را انتخاب نمایید!',
            'size' => 'مشکلی در انتخاب وضعیت وجود دارد!',
        ],

        'attachment_file' => [
            'file' => 'فایل شما به صورت کامل آپلود نشده است!',
            'max' => 'حداکثر حجم مجاز برای فایل ضمیمه 2MB می باشد!',
            'mimes' => 'فرمت فایل ضمیمه مجاز به ارسال نمی باشد!(فرمت های مجاز jpeg, png, bmp, gif, pdf, zip)',
        ],

        'ticket_title' => [
            'required' => 'لطفا عنوان کار یا درخواست را وارد نمایید!',
            'max' => 'طول عنوان درخواست از حد مجاز بیشتر می باشد!'
        ],

        'ticket_description' => [
            'required' => 'لطفا توضیحات مربوط به کار یا درخواست را به صورت کامل درج نمایید!',
        ],

        'projectId' => [
            'required' => 'درخواست متعلق به هیچ پروژه‌ای نمی باشد و امکان ثبت آن وجود ندارد!'
        ],

        'fname' => [
            'required' => 'لطفا نام را وارد کنید!',
            'max' => 'طول فیلد نام از مقدار مجاز بیشتر است!',
        ],

        'lname' => [
            'required' => 'لطفا نام خانوادگی را وارد کنید!',
            'max' => 'طول فیلد نام خانوادگی از مقدار مجاز بیشتر است!',
        ],

        'phone' => [
            'required' => 'لطفا شماره تلفن را وارد کنید!',
            'max' => 'طول فیلد تلفن بیش از حد مجاز می باشد!',
            'min' => 'شماره تلفن باید حداقل 6 کاراکتر باشد!',
            'numeric' => 'شماره تلفن را به صورت عدد وارد کنید!',
        ],

        'note' => [
            'max' => 'طول فیلد یادداشت از مقدار مجاز بیشتر است!',
        ],

        'project_select' => [
            'required' => 'لطفا پروژه مرتبط را انتخاب نمایید!'
        ],

        'project_title' => [
            'required' => 'لطفا عنوان پروژه را وارد نمایید!',
            'max' => 'طول فیلد عنوان بیش از حد مجاز می باشد!'
        ],

        'project_note' => [
            'max' => 'طول فیلد یادداشت بیش از حد مجاز می باشد!'
        ],

        'user_select' => [
            'required' => 'انتخاب کاربر الزامی می باشد!'
        ],

        'invoice_amount' => [
            'required' => 'لطفا مبلغ فاکتور را وارد کنید!',
            'numeric' => 'مبلغ فاکتور را به صورت مقدار عددی وارد کنید!'
        ],

        'invoice_description' => [
            'max' => 'طول فیلد توضیحات بیش از حد مجاز می باشد!'
        ],

        'old_password' => [
            'required' => 'لطفا کلمه عبور فعلی خود را وارد نمایید!'
        ],

        'new_password' => [
            'required' => 'لطفا کلمه عبور جدید را وارد نمایید!',
            'min' => 'کلمه عبور باید حداقل 6 حرف باشد!'
        ],

        'new_re_password' => [
            'required' => 'لطفا تکرار کلمه عبور جدید را وارد نمایید!',
            'same' => 'مقادیر فیلدهای کلمه عبور و تکرار کلمه عبور مطابقت ندارد!'
        ],

        'telegramNumber' => [
            'max' => 'طول فیلد شماره تلگرام بیش از حد مجاز می باشد!'
        ],

        'telegramUsername' => [
            'max' => 'طول فیلد نام کاربری تلگرام بیش از حد مجاز می باشد!'
        ],

        'telegramChatId' => [
            'max' => 'طول فیلد شناسه کاربری تلگرام بیش از حد مجاز می باشد!',
            'integer' => 'شناسه کاربری تلگرام باید مقدار عددی داشته باشد!'
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

    'attributes' => [],

];
