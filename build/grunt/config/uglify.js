module.exports = {
	scripts: {
		options: {
			beautify: false,
			compress: true,
			report: 'gzip'
		},
		files: {
			'../extensions/<%= package.typo3ExtName %>/Resources/Public/Scripts/Scripts.js': [
				'../extensions/<%= package.typo3ExtName %>/Resources/Public/Scripts/Scripts.js'
			]
		}
	}
};
