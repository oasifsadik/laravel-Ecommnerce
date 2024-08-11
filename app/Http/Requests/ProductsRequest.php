<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cat_id' => 'required|integer|exists:categories,id',
            'product_slug' => 'required|string|max:255|unique:products,product_slug,' . $this->route('product'),
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:0',
            'buying_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:TK,Percentages',
            'discount_value' => 'required_if:discount_type,TK,Percentages|nullable|numeric|min:0',
            'color' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'action' => 'required|in:Active,In-Active',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
            'thumbnail' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'cat_id.required' => 'The category name is required.',
            'cat_id.integer' => 'The category ID must be an integer.',
            'cat_id.exists' => 'The selected category does not exist.',
            'product_slug.required' => 'The product slug is required.',
            'product_slug.string' => 'The product slug must be a string.',
            'product_slug.max' => 'The product slug must not exceed 255 characters.',
            'product_slug.unique' => 'The product slug must be unique.',
            'product_name.required' => 'The product name is required.',
            'product_name.string' => 'The product name must be a string.',
            'product_name.max' => 'The product name must not exceed 255 characters.',
            'product_quantity.required' => 'The product quantity is required.',
            'product_quantity.integer' => 'The product quantity must be an integer.',
            'product_quantity.min' => 'The product quantity must be at least 0.',
            'buying_price.required' => 'The buying price is required.',
            'buying_price.numeric' => 'The buying price must be a number.',
            'buying_price.min' => 'The buying price must be at least 0.',
            'selling_price.required' => 'The selling price is required.',
            'selling_price.numeric' => 'The selling price must be a number.',
            'selling_price.min' => 'The selling price must be at least 0.',
            'discount_price.numeric' => 'The discount price must be a number.',
            'discount_price.min' => 'The discount price must be at least 0.',
            'discount_type.in' => 'The discount type must be either TK or Percentages.',
            'discount_value.required_if' => 'The discount value is required when discount type is selected.',
            'discount_value.numeric' => 'The discount value must be a number.',
            'discount_value.min' => 'The discount value must be at least 0.',
            'color.string' => 'The color must be a string.',
            'color.max' => 'The color must not exceed 255 characters.',
            'size.string' => 'The size must be a string.',
            'size.max' => 'The size must not exceed 255 characters.',
            'action.required' => 'The action is required.',
            'action.in' => 'The action must be either Active or In-Active.',
            'description.string' => 'The description must be a string.',
            'images.required' => 'Image :attribute is required.',
            'images.image' => 'File :attribute must be an image.',
            'images.mimes' => 'File :attribute must be of type: jpeg, png, jpg, gif.',
            'images.max' => 'File :attribute may not be greater than :max kilobytes.',
            'thumbnail.required' => 'The thumbnail is required.'

        ];
    }
}
