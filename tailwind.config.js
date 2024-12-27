import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                "poppins" : ['poppins', 'sans-serif'],
                "mulish" : ['mulish', 'sans-serif'],
                "comfortaa" : ['comfortaa', 'sans-serif'],
            },
            colors: {
                mine: {
                    100: '#08752C',
                }
            }
        },
    },

    plugins: [forms],
};
