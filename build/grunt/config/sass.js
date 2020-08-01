module.exports = {
    dist: {
        options: {
            sourcemap: 'none',
            loadPath: [
                'node_modules/breakpoint-sass/stylesheets'
            ]
        },
        files: [{
            expand: true,
            cwd: 'src/scss',
            src: ['**/*.scss'],
            dest: '../src/packages/<%= package.typo3ExtName %>/Resources/Public/Stylesheets/',
            ext: '.css'
        }]
    }
};
