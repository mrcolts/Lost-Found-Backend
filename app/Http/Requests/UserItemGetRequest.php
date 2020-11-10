<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserItemGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['item_id'] = $this->route('item_id');

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_id' => ['required', 'uuid', 'exists:user_items,id']
        ];
    }
}
