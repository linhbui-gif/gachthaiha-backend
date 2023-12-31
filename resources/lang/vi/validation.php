<?php
return [
    'accepted'             => ':attribute phải được chấp nhận.',
    'active_url'           => ':attribute không phải là một URL hợp lệ.',
    'after'                => ':attribute phải là thời gian sau :date.',
    'after_or_equal'       => ':attribute phải là thời gian sau hoặc bằng :date.',
    'alpha'                => ':attribute chỉ có thể chứa chữ cái.',
    'alpha_dash'           => ':attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => ':attribute chỉ có thể chứa chữ cái và số.',
    'array'                => ':attribute phải là một mảng.',
    'before'               => ':attribute phải là một ngày trước :date.',
    'before_or_equal'      => ':attribute phải là ngày trước hoặc bằng :date.',
    'between'              => [
        'numeric' => ':attribute phải nằm giữa :min và :max.',
        'file'    => ':attribute phải nằm giữa :min và :max kilobytes.',
        'string'  => ':attribute phải nằm giữa :min và :max characters.',
        'array'   => ':attribute phải có giữa :min và :max items.',
    ],
    'boolean'              => ':attribute phải là đúng hoặc sai.',
    'confirmed'            => ':attribute xác nhận không khớp.',
    'date'                 => ':attribute không phải là ngày hợp lệ.',
    'date_format'          => ':attribute không khớp với định dạng :format.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => ':attribute phải là :digits số.',
    'digits_between'       => ':attribute phải nằm giữa :min và :max số.',
    'dimensions'           => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => ':attribute có giá trị trùng lặp.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ̣.',
    'exists'               => ':attribute không hợp lệ.',
    'file'                 => ':attribute phải là 1 file.',
    'filled'               => ':attribute phải có giá trị.',
    'image'                => ':attribute phải là ảnh.',
    'in'                   => ':attribute không hợp lệ.',
    'in_array'             => ':attribute không tồn tại trong :other.',
    'integer'              => ':attribute phải là kiểu số nguyên.',
    'ip'                   => ':attribute phải là địa chỉ IP.',
    'ipv4'                 => ':attribute phải là địa chỉ IPv4.',
    'ipv6'                 => ':attribute phải là địa chỉ IPv6.',
    'json'                 => ':attribute phải là một chuỗi JSON hợp lệ.',
    'max'                  => [
        'numeric'          => ':attribute phải nhỏ hơn hoặc bằng :max.',
        'file'             => ':attribute phải nhỏ hơn hoặc bằng :max kilobytes.',
        'string'           => ':attribute phải nhỏ hơn hoặc bằng :max ký tự.',
        'array'            => ':attribute phải nhỏ hơn hoặc bằng :max items.',
    ],
    'mimes'                => ':attribute phải là loại file :values.',
    'mimetypes'            => ':attribute phải là loại file :values.',
    'min'                  => [
        'numeric'          => ':attribute phải lớn hơn hoặc bằng :min.',
        'file'              => ':attribute phải lớn hơn hoặc bằng :min kilobytes.',
        'string'            => ':attribute phải lớn hơn hoặc bằng :min characters.',
        'array'             => ':attribute phải có nhiều hơn hoặc bằng :min items.',
    ],
    'not_in'               => ':attribute không hợp lệ.',
    'numeric'              => ':attribute phải là số.',
    'present'              => ':attribute phải có mặt.',
    'regex'                => ':attribute định dạng không hợp lệ.',
    'required'             => ':attribute không được để trống.',
    'required_if'          => ':attribute không được để trống khi :other là :value.',
    'required_unless'      => ':attribute không được để trống trừ khi khi :other nằm trong :values.',
    'required_with'        => ':attribute không được để trống khi :values có mặt.',
    'required_with_all'    => ':attribute không được để trống khi :values có mặt.',
    'required_without'     => ':attribute không được để trống khi :values có mặt.',
    'required_without_all' => ':attribute không được để trống khi :values không có mặt.',
    'same'                 => ':attribute và :other phải giống nhau.',
    'size'                 => [
        'numeric'           => ':attribute phải :size.',
        'file'              => ':attribute phải :size kilobytes.',
        'string'            => ':attribute phải :size characters.',
        'array'             => ':attribute phải chứa :size items.',
    ],
    'string'               => ':attribute phải là một chuỗi.',
    'timezone'             => ':attribute phải là khu vực hợp lệ.',
    'unique'               => ':attribute đã tồn tại.',
    'uploaded'             => ':attribute phải tải lên thành công.',
    'url'                   => ':attribute định dạng không hợp lệ.',

    'attributes' => [
        'name'                  => 'Tên',
        'type'                  => 'Loại',
        'permission'            => 'Quyền',
        'amount'                => 'Số tiền',
        'status'                => 'Trạng thái',
        'email'                 => 'Email',
        'password'              => 'Mật khẩu',
        'answer'                => 'Câu trả lời',
        'question_title'        => 'Tiêu đề câu hỏi',
        'question_description'  => 'Mô tả câu hỏi',
        'question_id'           => 'ID câu hỏi',
        'point_level'           => 'Mức điểm',
        'suggestion_title'      => 'Tiêu đề lời khuyên',
        'suggestion_description' => 'Mô tả lời khuyên',
        'user_id'               => 'Mã nhân viên',
        'contract_id'           => 'Mã hợp đồng',
        'duration'              => 'Thời hạn',
        'start_date'            => 'Ngày bắt đầu',
        'expired_date'          => 'Ngày kết thúc',
        'contract_content'      => 'Nội dung hợp đồng',
        'number_hour'           => 'Số giờ',
        'description'           => 'Mô tả',
        'user_learn'            => 'Người học',
        'hour'                  => 'Giờ',
        'date'                  => 'Ngày',
        'month'                 => 'Tháng',
        'year'                  => 'Năm',
        'fullname'              => 'Tên đầy đủ',
        'gender'                => 'Giới tính',
        'birth_date'            => 'Ngày sinh',
        'home_town'             => 'Quê quán',
        'nation'                => 'Dân tộc',
        'religion'              => 'Tôn giáo',
        'marital_status'        => 'Tình trạng hôn nhân',
        'current_address'       => 'Địa chỉ hiện tại',
        'permanent_address'     => 'Địa chỉ đăng ký thường trú',
        'personal_email'        => 'Email cá nhân',
        'company_email'         => 'Email công ty',
        'personal_phone'        => 'Số điện thoại cá nhân',
        'company_phone'         => 'Số điện thoại công ty',
        'position'              => 'Vị trí',
        'department'            => 'Phòng ban',
        'work_status'           => 'Trạng thái làm việc',
        'basic_salary'          => 'Lương cơ bản',
        'work_salary'           => 'Lương chuyên môn',
        'responsible_salary'    => 'Lương trách nhiệm',
        'luch_allowance'        => 'Phụ cấp ăn trưa',
        'insurance_status'      => 'Trạng thái đóng bảo hiểm',
        'checkin_required'      => 'Yêu cầu chấm công',
        'work_time'             => 'Thời gian làm việc',
        'checkin_id' => 'Mã chấm công',
        'insurance_balance'     => 'Số tiền đóng bảo hiểm',
        'id'                    => 'Mã',
        'shift'                 => 'Ca làm việc',
        'performance'           => 'Hiệu suất làm việc',
        'comment'               => 'Bình luận',
        'exchange_point'        => 'Điểm đổi',
        'received_user'         => 'Người nhận',
        'send_user'             => 'Người gửi',
        'point'                 => 'Số điểm',
        'lock_redeem_date'      => 'Ngày khóa đổi điểm',
        'reset_date'            => 'Ngày reset',
        'company_name'          => 'Tên công ty',
        'alias'                 => 'Định danh công ty',
        'from_date'             => 'Từ ngày',
        'to_date'               => 'Đến ngày',
        'reason'                => 'Nguyên nhân',
        'icon'                  => 'Biểu tượng',
        'title'                 => 'Tiêu đề',
        'controller'            => 'Controller',
        'action'                => 'Hành động',
        'sort_order'            => 'Sắp xếp',
        'overtime_hour'         => 'Thời gian làm ngoài giờ',
        'position_name'         => 'Tên chức vụ',
        'condition'             => 'Điều kiện',
        'old_password'          => 'Mật khẩu cũ',
        'phone'                 => 'Số điện thoại',
        'source'                => 'Nguồn',
        'time'                  => 'Thời gian',
        'address'               => 'Địa chỉ',
        'result'                => 'Kết quả',
        'note'                  => 'Ghi chú',
        'deadline'              => 'Hạn',
        'gift_id'               => 'Mã quà',
        'number'                => 'số lượng',
        'site_name'             => 'Tên website',
        'currency'              => 'Loại tiền tệ',
        'currency_format'       => 'Định dạng tiền tệ',
        'email_driver'          => 'Trình điều khiển Email',
        'smtp_host'             => 'SMTP Host',
        'smtp_port'             => 'SMTP Port',
        'smtp_email'            => 'SMTP Email',
        'email_name'            => 'Tên hiển thị email',
        'smtp_user'             => 'Tài khoản SMTP',
        'smtp_password'         => 'Mật khẩu SMPT',
        'smtp_charset'          => 'SMTP Charset',
        'slack_channel'         => 'Slack Channel',
        'secret_key'            => 'Secret Key',
        'time_from'             => 'Thời gian từ',
        'time_to'               => 'Thời gian đến',
        'day_of_week'           => 'Ngày trong tuần',
        'content'               => 'Nội dung',
        'question'              => 'Câu hỏi',
        'checkin_time'          => 'Giờ bắt đầu ca',
        'checkout_time'         => 'Giờ kết thúc ca',
        'today_job'             => 'Việc trong ngày',
        'meta_data_field'       => 'Trường dữ liệu',
        'meta_data_field.*.field.*.value'       => 'Giá trị',
        'meta_data_field.*.field.*.name'       => 'Trường dữ liệu',
        'meta_data_field.*.field.*.id'       => 'ID',
        'data_type'             => 'Loại dữ liệu',
        'answer.answer.*'       => 'Câu trả lời',
        'answer.point.*'       => 'Số điểm',
        'cv_file'               => 'Cv File',
        'explanation_type'      => 'Lý do giải trình',
        'g-recaptcha-response'  => 'Xác thực reCaptcha',
        'personal_wish'         => 'Lời chúc cá nhân',
        'company_wish'          => 'Lời chúc công khai',
        'bank.*.bank_number'    => 'Số tài khoản ngân hàng',
        'list_image.*.title'    => 'Tiêu đề',
        'list_image.*.link'     => 'Đường dẫn',
        'list_image.*.image'    => 'Hình ảnh',
        'list_image.*.description' => 'Mô tả',
        'link'                  => 'Đường dẫn',
        'departure'             => 'Nơi khởi hành',
        'destination'           => 'Điểm đến',
        'departure_date'        => 'Ngày khởi hành',
        'number_day'            => 'Số ngày',
        'number_night'          => 'Số đêm',
        'regular_price'         => 'Giá gốc',
        'sale_off_price'        => 'Giá khuyến mãi',
        'price_by_type'         => 'Giá theo đối tượng khách hàng',
        'price_by_type.*.type'  => 'Đối tượng khách hàng',
        'price_by_type.*.price' => 'Giá',
        'highlight'             => 'Đặc điểm nổi bật',
        'include_exclude'       => 'Bao gồm & không bao gồm',
        'special_note'          => 'Lưu ý đặc biệt',
        'attribute'             => 'Thuộc tính',
        'avatar'                => 'Ảnh đại diện',
        'feature_image'         => 'Ảnh đặc trưng',
        'price'                 => 'Giá',
        'departure_id'          => 'Nơi khởi hành',
        'destination_id'        => 'Điểm đến',
    ],
];
?>