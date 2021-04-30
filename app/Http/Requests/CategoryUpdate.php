<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdate extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|boolean',
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Tipe wajib di-pilih !',
            'type.boolean' => 'Value dari tipe harus berupa 1 / 0 (1 = Pemasukan | 0 = Pengeluaran)',
            'name.required' => 'Nama Kategori wajib di-isi !',
            'name.string' => 'Nama harus berupa alphanumerik !',
            'name.max' => 'Maximal karakter Nama Kategori adalah :max',
            'description.string' => 'Deskripsi harus berupa alphanumerik !',
            'description.max' => 'Maximal karakter Deskripsi Kategori adalah :max',
        ];
    }
}
