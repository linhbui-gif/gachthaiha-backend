<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MoneyFormatRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $allowNull;
    public function __construct($allowNull = false)
    {
        $this->allowNull = $allowNull;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /*
         * Chú ý: Đối với các kiểu float, double, decimal nếu có cặp giá trị là (a, b)
         * a: Tổng số chữ số của cả 2 phần nguyên và phần thập phân
         * b: Là số chữ số ở phần thập phân
         * Từ b sẽ suy ra được ở phần nguyên sẽ có (a - b) chữ số
         * */

        if(str_replace(',', '', $value) <= 0 || str_replace(',', '', $value) > pow(10, 9)){
            if(!$this->allowNull){
                return false;
            }
        }
        return preg_match('/^[0-9\,]+/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute không đúng định dạng tiền. Số tiền phải lớn hơn 0 và nhỏ hơn 10^9';
    }
}
