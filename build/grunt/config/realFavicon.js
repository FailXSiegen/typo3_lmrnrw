module.exports = {
	favicons: {
		src: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Images/Favicons/favicon-master.svg',
		dest: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Images/Favicons/Generated/',
		options: {
			iconsPath: 'typo3conf/ext/lmr_sitepackage/Resources/Public/Images/Favicons/Generated',
			html: [ '../extensions/<%= package.typo3ExtName %>/Resources/Private/Templates/Generated/Favicons.html' ],
			design: {
				ios: {
					pictureAspect: 'backgroundAndMargin',
					backgroundColor: '#ffffff',
					margin: '35%',
					assets: {
						ios6AndPriorIcons: false,
						ios7AndLaterIcons: false,
						precomposedIcons: false,
						declareOnlyDefaultIcon: true
					}
				},
				desktopBrowser: {},
				windows: {
					pictureAspect: 'noChange',
					backgroundColor: '#ffffff',
					onConflict: 'override',
					assets: {
						windows80Ie10Tile: false,
						windows10Ie11EdgeTiles: {
							small: false,
							medium: true,
							big: false,
							rectangle: false
						}
					}
				},
				androidChrome: {
					pictureAspect: 'shadow',
					themeColor: '#ffffff',
					manifest: {
						name: 'Landesmusikrat NRW',
						display: 'standalone',
						orientation: 'notSet',
						onConflict: 'override',
						declared: true
					},
					assets: {
						legacyIcon: false,
						lowResolutionIcons: false
					}
				},
				safariPinnedTab: {
					pictureAspect: 'silhouette',
					themeColor: '#5bbad5'
				}
			},
			settings: {
				scalingAlgorithm: 'Mitchell',
				errorOnImageTooSmall: false,
				readmeFile: false,
				htmlCodeFile: false,
				usePathAsIs: false
			}
		}
	}
};
