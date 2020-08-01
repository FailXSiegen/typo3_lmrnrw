module.exports = {
	faviconToRoot: {
		files: [
			{
				expand: false,
				flatten: false,
				src: ['../src/packages/<%= package.typo3ExtName %>/Resources/Public/Images/Favicons/Generated/favicon.ico'],
				dest: '../web/favicon.ico',
				filter: 'isFile'
			}
		]
	}
};
