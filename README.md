# Laravel Nova Tel Input


<img src="img.png">


## Installation

``` php
composer require wamesk/laravel-nova-tel-input
```

## Usage

``` php
use Ppp\TelInput\TelInput;

TelInput::make(__('phone'), 'phone'),

TelInput::make('tel', 'tel')->required()->rules('required')
    ->showDialCode(true)
    ->preferredCountries(['SK', 'CZ'])
    ->onlyCountries([])
	->placeholder('Tel cislo'),
```

<a href="https://vue-tel-input.iamstevendao.com/">Vue Tel Input</a> for Laravel Nova

<a href="https://codesandbox.io/s/github/Sebastien-Pradines/vue_tel_input/tree/main/?file=/src/App.vue">Playground</a>


