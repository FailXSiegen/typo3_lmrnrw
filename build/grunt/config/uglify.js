module.exports = {
	scripts: {
		options: {
			beautify: false,
			compress: true,
			report: 'gzip'
		},
		files: {
			'../src/packages/<%= package.typo3ExtName %>/Resources/Public/Scripts/Scripts.js': [
				'../src/packages/<%= package.typo3ExtName %>/Resources/Public/Scripts/Scripts.js'
			]
		}
	}
};
