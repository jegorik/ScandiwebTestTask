<?php

/**
 * Class Validation
 * This class validates information from web form
 */
class Validation
{
    private $validation = false;

    /**
     * @return $validation status
     */
    public function isValidation(): bool
    {
        return $this->validation;
    }

    /**
     * Public function to get access to validation function
     */
    public function makeValidation($formData)
    {
        return $this->doFormValidation($formData);
    }


    /**
     * Web form input fields data validation
     *
     * @param $formData - parsed array with web form input fields data
     * @return array - return checked and valid data array or array with errors
     */

    private function doFormValidation($formData)
    {
        $products = Products::Products;
        $errors = array();
        $validParam = array();
        $attribute = '';
        $validArray = array();

        foreach ($formData as $key => $value) {
            $param = $formData[$key];
            $param = trim($param);
            $param = strip_tags($param);
            $param = stripslashes($param);

            if (empty($param)) {
                $errors[] = $errorParam = $key . ' field is empty!';
                $validParam[] = false;
            }

            if ($value == null) {
                $errors[] = $param . ' ' . $value . ' not allowed value!';
                $validParam[] = false;
            }

            if ($key === 'product') {
                if (!in_array($param, $products)) {
                    $errors[] = $value . ' wrong product in "Type Switcher" field!';
                    $validParam[] = false;
                }
            }

            $validArray[$key] = $param;
            $validParam[] = true;
        }

        if (!in_array(false, $validParam)) {
            switch ($formData['product']) {
                case 'dvd':
                {
                    $attribute = 'Size: ' . $formData['size'] . " MB";
                    break;
                }
                case 'book':
                {
                    $attribute = 'Weight: ' . $formData['weight'] . " KG";
                    break;
                }
                case 'furniture':
                {
                    $attribute = 'Dimension: ' . $formData['height'] . 'x' . $formData['width'] . 'x' . $formData['length'];
                    break;
                }
            }
        } else {
            return $errors;
        }

        $validArray['attribute'] = $attribute;

        $this->validation = true;
        return $validArray;
    }
}
