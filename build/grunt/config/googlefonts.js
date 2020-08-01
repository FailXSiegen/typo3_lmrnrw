module.exports = {
    build: {
        options: {
            fontPath: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Fonts/',
            httpPath: '/typo3conf/ext/<%= package.typo3ExtName %>/Resources/Public/Fonts/',
            cssFile: 'src/scss/_0-configuration/_fonts-include.scss',
            formats: {
                eot: true,
                woff: true,
                svg: true
            },
            fonts: [
                {
                    family: 'Roboto',
                    styles: [
                        400, '500i', 700
                    ]
                },
                {
                    family: 'Lora',
                    styles: [
                        400, '700i', 700
                    ]
                }
            ]
        }
    }
};
