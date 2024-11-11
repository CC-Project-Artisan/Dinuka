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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'custom': '10px 10px 25px rgba(0, 0, 0, 0.1)',
            }
        },

        colors: {
            customBrown: '#a55e3f',
            customGray: '#58595b',
        },

        // define custome font family
        fontFamily: {
            mainText: ['Alegreya', 'serif'],
            secondaryText: ['Lato', 'sans-serif'],
            thirdText: ['Montserrat', 'sans-serif'],
        },
    },

    plugins: [forms],
};
