<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $register = [
        'username' => 'alpha_numeric|is_unique[user.username]',
        'password' => 'min_length[8]|alpha_numeric_punct',
        'confirm' => 'matches[password]'
    ];

    public $register_errors = [
        'username' => [
            'alpha_numeric' => 'Username must use number or text',
            'is_unique' => 'Username already used'
        ],
        'password' => [
            'min_length' => 'Password must have at least 8 characters',
            'alpha_numeric_punct' => 'Passwords can only contain valid numbers, letters, and characters'
        ],
        'confirm' => [
            'matches' => 'Confirmation password does not match'
        ]
    ];
}
