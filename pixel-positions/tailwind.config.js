import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                black: '#060606',
            },
            fontFamily: {
                "hanken-grotesk": ['Hanken Grotesk', 'sans-serif'],
            },
            fontSize: {
                // 10px / 16px = 0.625rem
                '2xs': '0.625rem',
            }
        },
    },
    plugins: [],
};
