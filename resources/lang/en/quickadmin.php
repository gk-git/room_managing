<?php

return [
	
	'user-management' => [
		'title' => 'إدارة المستخدم',
		'fields' => [
		],
	],
	
	'roles' => [
		'title' => 'الأدوار',
		'fields' => [
			'title' => 'عنوان',
		],
	],
	
	'users' => [
		'title' => 'المستخدمين',
		'fields' => [
			'name' => 'اسم',
			'email' => 'البريد الإلكتروني',
			'password' => 'كلمه السر',
			'role' => 'وظيفة',
			'remember-token' => 'تذكر الرمز المميز',
		],
	],
	
	'user-actions' => [
		'title' => 'إجراءات المستخدم',
		'created_at' => 'الوقت',
		'fields' => [
			'user' => 'المستخدم',
			'action' => 'الإجراء',
			'action-model' => 'نموذج العمل',
			'action-id' => 'معرف الإجراء',
		],
	],
	
	'internal-notifications' => [
		'title' => 'إخطارات',
		'fields' => [
			'text' => 'Text',
			'link' => 'Link',
			'users' => 'Users',
		],
	],
	
	'rooms' => [
		'title' => 'الخيام',
		'fields' => [
			'name' => 'اسم',
			'size' => 'الحجم',
		],
	],
	
	'customers' => [
		'title' => 'الزبائن',
		'fields' => [
			'name' => 'اسم',
			'phone' => 'هاتف',
		],
	],
	
	'reservations' => [
		'title' => 'الحجوزات',
		'fields' => [
			'name' => 'ملاحظات',
			'customer' => 'زبون',
			'room' => 'خيمة',
			'start' => 'بداية',
			'end' => 'النهاية',
			'paid' => 'مدفوع',
			'status' => 'الحالة',
		],
	],
	'qa_create' => 'خلق',
	'qa_save' => 'حفظ',
	'qa_edit' => 'تعديل',
	'qa_restore' => 'استعادة',
	'qa_permadel' => 'الحذف بشكل نهائي',
	'qa_all' => 'الكل',
	'qa_trash' => 'قمامة',
	'qa_view' => 'معاينة',
	'qa_update' => 'تحديث',
	'qa_list' => 'قائمة',
	'qa_no_entries_in_table' => 'ليست هناك إدخالات في الجدول',
	'qa_custom_controller_index' => 'مؤشر تحكم مخصص.',
	'qa_logout' => 'الخروج',
	'qa_add_new' => 'اضف جديد',
	'qa_are_you_sure' => 'هل أنت واثق؟',
	'qa_back_to_list' => 'الرجوع للقائمة',
	'qa_dashboard' => 'لوحه الاعدادات',
	'qa_delete' => 'حذف',
	'qa_delete_selected' => 'احذف المختار',
	'qa_category' => 'الفئة',
	'qa_categories' => 'الاقسام',
	'qa_sample_category' => 'فئة العينة',
	'qa_questions' => 'الأسئلة',
	'qa_question' => 'سؤال',
	'qa_answer' => 'إجابة',
	'qa_sample_question' => 'سؤال بسيط',
	'qa_sample_answer' => 'جواب بسيط',
	'qa_faq_management' => 'التعليمات إدارة',
	'qa_administrator_can_create_other_users' => 'المشرف',
	'qa_simple_user' => 'مستخدم بسيط',
	'qa_title' => 'عنوان',
	'qa_roles' => 'الأدوار',
	'qa_role' => 'وظيفة',
	'qa_user_management' => 'إدارةالمستخدم',
	'qa_users' => 'المستخدمين',
	'qa_user' => 'المستعمل',
	'qa_name' => 'اسم',
	'qa_email' => 'البريد الإلكتروني',
	'qa_password' => 'كلمه السر',
	'qa_remember_token' => 'تذكر الرمز المميز',
	'qa_permissions' => 'أذونات',
	'qa_user_actions' => 'إجراءات المستخدم',
	'qa_action' => 'عمل',
	'qa_action_model' => 'نموذج العمل',
	'qa_action_id' => 'معرف الإجراء',
	'qa_time' => 'الوقت',
	'qa_campaign' => 'حملة',
	'qa_campaigns' => 'حملات',
	'qa_description' => 'وصف',
	'qa_valid_from' => 'صالح من تاريخ',
	'qa_valid_to' => 'صالحة إلى',
	'qa_discount_amount' => 'مقدار الخصم',
	'qa_discount_percent' => 'نسبة الخصم',
	'qa_coupons_amount' => 'كوبونات المبلغ',
	'qa_coupons' => 'كوبونات',
	'qa_code' => 'الشفرة',
	'qa_redeem_time' => 'استرداد الوقت',
	'qa_coupon_management' => 'إدارة القسيمة',
	'qa_time_management' => 'إدارة الوقت',
	'qa_projects' => 'مشاريع',
	'qa_reports' => 'تقارير',
	'qa_time_entries' => 'إدخالات الوقت',
	'qa_work_type' => 'نوع العمل',
	'qa_work_types' => 'أنواع العمل',
	'qa_project' => 'مشروع',
	'qa_start_time' => 'وقت البدء',
	'qa_end_time' => 'وقت النهاية',
	'qa_expense_category' => 'فئة المصروفات',
	'qa_expense_categories' => 'فئات النفقات',
	'qa_expense_management' => 'إدارة حساب',
	'qa_expenses' => 'نفقات',
	'qa_expense' => 'مصروف',
	'qa_entry_date' => 'موعد الدخول',
	'qa_amount' => 'كمية',
	'qa_income_categories' => 'فئات الدخل',
	'qa_monthly_report' => 'التقرير الشهري',
	'qa_companies' => 'الشركات',
	'qa_company_name' => 'اسم الشركة',
	'qa_address' => 'عنوان',
	'qa_website' => 'موقع الكتروني',
	'qa_contact_management' => 'إدارة الاتصال',
	'qa_contacts' => 'جهات الاتصال',
	'qa_company' => 'شركة',
	'qa_first_name' => 'الاسم الاول',
	'qa_last_name' => 'اسم العائلة',
	'qa_phone' => 'هاتف',
	'qa_phone1' => 'الهاتف 1',
	'qa_phone2' => 'الهاتف 2',
	'qa_skype' => 'سكايب',
	'qa_photo' => 'صورة (بحد أقصى 8 ميغابايت)',
	'qa_category_name' => 'اسم التصنيف',
	'qa_product_management' => 'ادارة المنتج',
	'qa_products' => 'منتجات',
	'qa_product_name' => 'اسم المنتج',
	'qa_price' => 'السعر',
	'qa_tags' => 'الكلمات',
	'qa_tag' => 'بطاقة',
	'qa_photo1' => 'الصورة 1',
	'qa_photo2' => 'الصورة 2',
	'qa_photo3' => 'الصورة 3',
	'qa_calendar' => 'التقويم',
	'qa_statuses' => 'الأوضاع',
	'qa_task_management' => 'ادارة المهام',
	'qa_tasks' => 'مهام',
	'qa_status' => 'الحال',
	'qa_attachment' => 'المرفق',
	'qa_due_date' => 'تاريخ الاستحقاق',
	'qa_assigned_to' => 'محدد إلى',
	'qa_assets' => 'الأصول',
	'qa_asset' => 'الأصول',
	'qa_serial_number' => 'رقم سري',
	'qa_location' => 'موقعك',
	'qa_locations' => 'مواقع',
	'qa_assigned_user' => 'المعين (المستخدم)',
	'qa_notes' => 'ملاحظات',
	'qa_assets_history' => 'تاريخ الأصول',
	'qa_assets_management' => 'إدارة الأصول',
	'qa_slug' => 'سبيكة',
	'qa_content_management' => 'ادارة المحتوى',
	'qa_text' => 'نص',
	'qa_excerpt' => 'مقتطفات',
	'qa_featured_image' => 'صورة مميزة',
	'qa_pages' => 'صفحات',
	'qa_axis' => 'محور',
	'qa_show' => 'عرض',
	'qa_group_by' => 'مجموعة من',
	'qa_chart_type' => 'نوع الرسم البياني',
	'qa_create_new_report' => 'إنشاء تقرير جديد',
	
	
	'qa_no_reports_yet' => 'لا توجد تقارير حتى الآن.',
	'qa_created_at' => 'أنشئت في',
	'qa_updated_at' => 'تم التحديث في',
	'qa_deleted_at' => 'تم الحذف في',
	'qa_reports_x_axis_field' => 'X-أكسيس - الرجاء اختيار واحد من حقول التاريخ / الوقت',
	'qa_reports_y_axis_field' => 'Y- محور - الرجاء اختيار واحد من حقول الرقم',
	'qa_select_crud_placeholder' => 'يرجى اختيار واحد من كرودس الخاص بك',
	'qa_select_dt_placeholder' => 'يرجى تحديد أحد حقول التاريخ / الوقت',
	'qa_aggregate_function_use' => 'الدالة الإجمالية للاستخدام',
	'qa_x_axis_group_by' => 'X-أكسيس غروب بي',
	'qa_x_axis_field' => 'حقل المحور السيني (التاريخ / الوقت)',
	'qa_y_axis_field' => 'حقل المحور الصادي',
	'qa_integer_float_placeholder' => 'يرجى تحديد واحد من الحقول الصحيحة / تعويم',
	'qa_change_notifications_field_1_label' => 'إرسال إشعار بالبريد الإلكتروني إلى المستخدم',
	'qa_change_notifications_field_2_label' => 'عند الدخول على كرود',
	'qa_select_users_placeholder' => 'يرجى تحديد أحد المستخدمين',
	'qa_is_created' => 'أنشئ',
	'qa_is_updated' => 'يتم تحديث',
	'qa_is_deleted' => 'يتم حذف',
	'qa_notifications' => 'إخطارات',
	'qa_notify_user' => 'إعلام المستخدم',
	'qa_when_crud' => 'عندما كرود',
	'qa_create_new_notification' => 'إنشاء إشعار جديد',
	'qa_stripe_transactions' => 'Stripe Transactions',
	'qa_upgrade_to_premium' => 'الترقية إلى بريميوم',
	'qa_messages' => 'رسائل',
	'qa_you_have_no_messages' => 'ليس لديك رسائل.',
	'qa_all_messages' => 'جميع الرسائل',
	'qa_new_message' => 'رسالة جديدة',
	'qa_outbox' => 'صندوق الحفظ',
	'qa_inbox' => 'صندوق الوارد',
	'qa_recipient' => 'مستلم',
	'qa_subject' => 'موضوع',
	'qa_message' => 'رسالة',
	'qa_send' => 'إرسال',
	'qa_reply' => 'الرد',
	'qa_calendar_sources' => 'مصادر التقويم',
	'qa_new_calendar_source' => 'إنشاء مصدر تقويم جديد',
	'qa_crud_title' => 'عنوان كرود',
	'qa_crud_date_field' => 'حقل تاريخ برود',
	'qa_prefix' => 'اختصار',
	'qa_label_field' => 'حقل التصنيف',
	'qa_suffix' => 'لاحقة',
	'qa_no_calendar_sources' => 'لا توجد مصادر تقويم حتى الآن.',
	'qa_crud_event_field' => 'حقل تسمية الحدث',
	'qa_create_new_calendar_source' => 'إنشاء مصدر جديد للتقويم',
	'qa_edit_calendar_source' => 'تحرير مصدر التقويم',
	'qa_client_management' => 'إدارة العملاء',
	'qa_client_management_settings' => 'إعدادات إدارة العميل',
	'qa_country' => 'بلد',
	'qa_client_status' => 'حالة العميل',
	'qa_clients' => 'عملاء',
	'qa_client_statuses' => 'حالات العميل',
	'qa_currencies' => 'العملات',
	'qa_main_currency' => 'العملة الرئيسية',
	'qa_documents' => 'مستندات',
	'qa_file' => 'ملف',
	'qa_income_source' => 'مصدر دخل',
	'qa_income_sources' => 'مصادر الدخل',
	'qa_fee_percent' => 'نسبة الرسوم',
	'qa_note_text' => 'نص ملاحظة',
	'qa_client' => 'زبون',
	'qa_start_date' => 'تاريخ البدء',
	'qa_budget' => 'ميزانية',
	'qa_project_status' => 'حالة المشروع',
	'qa_project_statuses' => 'حالة المشروعs',
	'qa_transactions' => 'المعاملات',
	'qa_transaction_types' => 'أنواع المعاملات',
	'qa_transaction_type' => 'نوع المعاملة',
	'qa_transaction_date' => 'تاريخ الصفقة',
	'qa_currency' => 'دقة',
	'qa_current_password' => 'كلمة السر الحالية',
	'qa_new_password' => 'كلمة السر الجديدة',
	'qa_password_confirm' => 'تأكيد كلمة السر الجديدة',
	'qa_dashboard_text' => 'لقد سجلت الدخول!',
	'qa_forgot_password' => 'نسيت رقمك السري؟',
	'qa_remember_me' => 'تذكرنى',
	'qa_login' => 'تسجيل الدخول',
	'qa_change_password' => 'تغيير كلمة السر',
	'qa_csv' => 'CSV',
	'qa_print' => 'طباعة',
	'qa_excel' => 'Excel',
	'qa_copy' => 'نسخ',
	'qa_colvis' => 'رؤية العمود',
	'qa_pdf' => 'PDF',
	'qa_reset_password' => 'إعادة تعيين كلمة المرور',
	'qa_reset_password_woops' => '<strong>عفوا!</strong> كانت هناك مشاكل مع المدخلات:',
	'qa_email_line1' => 'أنت تتلقى هذه الرسالة الإلكترونية لأننا تلقينا طلب إعادة تعيين كلمة المرور لحسابك.',
	'qa_email_line2' => 'ذا لم تطلب إعادة تعيين كلمة المرور، فلا يلزم اتخاذ أي إجراء آخر.',
	'qa_email_greet' => 'مرحبا',
	'qa_email_regards' => 'مع تحياتي',
	'qa_confirm_password' => 'تأكيد كلمة المرور',
	'qa_if_you_are_having_trouble' => 'إذا كنت تواجه مشكلة في النقر على',
	'qa_copy_paste_url_bellow' => '، انسخ عنوان ورل والصقه أدناه في متصفح الويب:',
	'qa_please_select' => 'الرجاء التحديد',
	'qa_register' => 'تسجيل',
	'qa_registration' => 'التسجيل',
	'qa_not_approved_title' => 'أنت غير موافق عليه',
	'qa_not_approved_p' => 'لم تتم الموافقة على حسابك من قبل المشرف. يرجى التحلي بالصبر وإعادة المحاولة لاحقا.',
	'qa_there_were_problems_with_input' => 'كانت هناك مشاكل مع المدخلات',
	'qa_whoops' => 'عفوا!',
	'qa_file_contains_header_row' => 'يحتوي الملف على صف رأس الصفحة؟',
	'qa_csvImport' => 'CSV استيراد',
	'qa_csv_file_to_import' => 'CSV ملف للاستيراد',
	'qa_parse_csv' => 'تحليل CSV',
	'qa_import_data' => 'بيانات الاستيراد',
	'qa_imported_rows_to_table' => 'Imported :rows rows to :table table',
	'quickadmin_title' => 'Kashta Camp',
];