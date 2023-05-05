/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            aspectRatio: {
                '3/2': '3 / 2',
            },
            height:{
                '48r': '48rem',
                '36r': '36rem',
                '29r': '29rem',
            },
            maxHeight: {
                '29r': '29rem',
                '30r': '30rem',
                '36r': '36rem',
                '43r': '43rem',
            },
            colors: {
                'purple': '#723F5FFF',
            },
        },
        fontFamily: {
            'roboto': ['Roboto', 'sans-serif'],
        }
    },
    plugins: [
        require('tailwind-scrollbar-hide'),
    ],
}
