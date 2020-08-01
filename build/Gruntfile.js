module.exports = function(grunt) {
    'use strict';

    require('time-grunt')(grunt);

    grunt.registerTask('load-grunt-config');
1
    var path = require('path');

    require('load-grunt-config')(grunt, {
        configPath: path.join(process.cwd(), 'grunt/config'),
        jitGrunt: {
            customTasksDir: 'grunt/tasks',
            staticMappings: {
                googlefonts: 'grunt-google-fonts'
            }
        }
    });

    grunt.registerTask('default', function () {
        grunt.task.run('googlefonts');
        grunt.task.run('styles');
        grunt.task.run('scripts');
    });

    grunt.registerTask('styles', function () {
        grunt.task.run('sass_globbing');
        grunt.task.run('sass:dist');
        grunt.task.run('postcss:dist');
    });

    grunt.registerTask('scripts', function () {
        grunt.task.run('concat:globalVendorScripts');
        grunt.task.run('jshint:dist');
        grunt.task.run('concat:scripts');
        grunt.task.run('uglify');
    });

	grunt.registerTask('generateFavicons', function() {
		grunt.task.run('realFavicon');
		grunt.task.run('copy:faviconToRoot');
	});

    grunt.registerTask('dev', function() {
        grunt.task.run('concurrent:watch');
    });

};
