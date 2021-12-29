module.exports = {
    configuration: {
        files: {
            'src/scss/_0-configuration.scss':
                'src/scss/_0-configuration/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    },
    atoms: {
        files: {
            'src/scss/_1-atoms.scss':
                'src/scss/_1-atoms/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    },
    molecules: {
        files: {
            'src/scss/_2-molecules.scss':
                'src/scss/_2-molecules/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    },
    organisms: {
        files: {
            'src/scss/_3-organisms.scss':
                'src/scss/_3-organisms/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    },
    templates: {
        files: {
            'src/scss/_4-templates.scss':
                'src/scss/_4-templates/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    },
    packages: {
        files: {
            'src/scss/_5-subpackages.scss':
                '../extensions/<%= package.typo3ExtName %>/Subpackages/**/Private/**/*.scss'
        },
        options: {
            useSingleQuotes: true,
            signature: ''
        }
    }
};
