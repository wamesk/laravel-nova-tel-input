<?php

namespace Wame\TelInput;

use Laravel\Nova\Fields\Field;

class TelInput extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'tel-input';

    public function mode($value) {
        return $this->withMeta([
            'mode' => $value,
        ]);
    }

    public function enableValidate($value) {
        return $this->withMeta([
            'enableValidate' => $value,
        ]);
    }
    public function preferredCountries($value) {
        return $this->withMeta([
            'preferredCountries' => $value,
        ]);
    }

    public function onlyCountries($value) {
        return $this->withMeta([
            'onlyCountries' => $value
        ]);
    }

    public function showDialCode($value) {
        return $this->withMeta([
            'showDialCode' => $value
        ]);
    }

    public function placeholder($value) {
        return $this->withMeta([
            'placeholder' => $value
        ]);
    }

    public function enabledCountryCode($value) {
        return $this->withMeta([
            'enabledCountryCode' => $value
        ]);
    }



}
