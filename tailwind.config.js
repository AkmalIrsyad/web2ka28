import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            lineClamp: {
                10 : '10',
                12 : '12'
            },
            fontFamily: {
                Poppins:['Poppins'],
                SourceCodePro:['SourceCodePro'],

            }
        },
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ]

    // plugins: [require("@tailwindcss/line-clamp")],
};
