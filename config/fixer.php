<?php

return [
    'rules' => [
        'psr0' => false,
        '@PSR2' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'whitespace_after_comma_in_array' => true,
        'trim_array_spaces' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'braces' => true,
        'class_definition' => true,
        'elseif' => true,
        'encoding' => true,
        'full_opening_tag' => true,
        'function_declaration' => true,
        'indentation_type' => true,
        'ordered_imports' => [
                'sortAlgorithm' => 'alpha',
        ],
        'line_ending' => true,
        'lowercase_cast' => true, //
        'lowercase_constants' => true,
        'lowercase_keywords' => true,
        'magic_constant_casing' => true,
        'method_argument_space' => [
            'ensure_fully_multiline' => true,
        ],
        'no_break_comment' => true,
        'no_closing_tag' => true,
        'no_spaces_after_function_name' => true,
        'no_spaces_inside_parenthesis' => true,
        'no_trailing_whitespace_in_comment' => true,
        'no_trailing_whitespace' => true,
        'no_unused_imports' => true,
        'not_operator_with_successor_space' => true,
        'single_blank_line_at_eof' => true,
        'single_class_element_per_statement' => [
            'elements' => [
                'property',
            ],
        ],
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'single_quote' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'ternary_operator_spaces' => true,
        'visibility_required' => true,
        ],
];
