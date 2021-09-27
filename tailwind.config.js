module.exports = {
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "ocean-primary": "#1da2d8",
                "ocean-secondary": "#76b6c4",
                "ocean-light": "#7fcdff",
                "ocean-dark": "#021a2e",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
