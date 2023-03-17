<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSaveRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_produk' => 'required|min:6',
            'harga' => 'required|numeric',
            'jenis_produk' => 'min:6', 
            'deskripsi' => 'min:10'
        ];
    }
}
