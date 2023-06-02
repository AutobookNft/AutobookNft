<?php

/*

"The ImageValidator class is responsible for validating image files based on specified
configurations. It accepts an array of data containing the image file and an optional
array of configurations in the constructor. If no configurations are provided,
the class will use default configurations stored in the 'image_validation.php'
file in the config directory.

The class uses the Laravel Validator class to validate the image file based on the
specified or default configurations. It then checks the validation results and returns
an instance of the ImageValidator class with the validation results.
The class also contains a method to check if the validation has failed.

 - Accepts an array of data containing the image file and an optional array of configurations in the constructor.
 - Uses the Laravel Validator class to validate the image file based on the specified configurations (or default configurations if none are provided).
 - Contains a method to check if the validation has failed.
 - Returns an instance of the ImageValidator class with the validation results.
*/

/*
Esempio di come deve essere richiamata la classe

    $config = config('image_validation.images');
    $imageValidator = (new ImageValidator(['image' => $request->file('image')], $config))->validate();

    if ($imageValidator->fails()) {

        // i dati non sono validi, quindi redirect alla pagina precedente con gli errori
    return redirect('image/create')
        ->withErrors($imageValidator->validator)
        ->withInput();
}
*/


namespace App\Validation;

use Illuminate\Validation\Validator;

class ImageValidator
{
    protected $data;
    protected $validator;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate_old()
    {
        $allowedTypes = explode(',', env('IMAGE_ALLOWED_TYPES', config('image_validation.allowed_types', [
            'jpg',
            'jpeg',
            'png',
            'gif'
        ])));
        $maxSize = env('IMAGE_MAX_SIZE', config('image_validation.max_size', 2000)); // in KB

        $this->validator = Validator::make($this->data, [
            'image' => 'required|image|mimes:' . implode(',', $allowedTypes) . '|max:' . $maxSize,
        ]);

        return $this;
    }

    public function validate()
    {
        $allowedTypes = config('images.allowed_types');
        $maxSize = config('images.max_size'); // in KB

        $this->validator = Validator::make($this->data, [
            'image' => 'required|image|mimes:' . implode(',', $allowedTypes) . '|max:' . $maxSize,
        ]);

        return $this;
    }

    public function fails()
    {
        return $this->validator->fails();
    }
}
