import defaultTheme from 'tailwindcss/defaultTheme';

// npm install -D tailwindcss postcss autoprefixer
// npx tailwindcss init -p

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        // wendet Tailwind auf Blade-Dateien in diesem Ordner und Unterordner an
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                // "Laracasts": "rgb(50, 138, 241)",
                "laracasts": "#ff2364",
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
