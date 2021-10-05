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
                "secondary-red-hover": "#923d1d",
                "secondary-red": "#d1582a",
                "ocean-white": "#f2faff",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
