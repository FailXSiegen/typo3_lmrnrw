module.exports = {
	flushcache: {
		command: [
			'cd ../',
			'./vendor/bin/typo3cms cache:flush'
		].join('&&')
	}
};
