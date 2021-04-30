<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiUpdate extends FormRequest
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
            'category_id' => 'required|numeric|exists:categories,id',
            'nominal' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Tipe wajib di-pilih !',
            'type.boolean' => 'Value dari tipe harus berupa 1 / 0 (1 = Pemasukan | 0 = Pengeluaran)',
            'category_id.required' => 'Kategori wajib di-pilih !',
            'category_id.numeric' => 'Data Kategori harus wajib di-pilih !',
            'category_id.exists' => 'Data Kategori harus valid !',
            'nominal.required' => 'Nominal wajib di-isi !',
            'nominal.numeric' => 'Nominal harus berupa numerik !',
            'nominal.min' => 'Maximal karakter Nominal adalah :min',
            'description.string' => 'Deskripsi harus berupa alphanumerik !',
            'description.max' => 'Maximal karakter Deskripsi Kategori adalah :max',
        ];
    }
}
