/* tailwind.config.js */
module.exports = {
    content: [
        './app/Views/**/*.php',
        'node_modules/preline/dist/*.js',
    ],
    plugins: [
        // require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
}