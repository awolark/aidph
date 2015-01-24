'use strict';

module.exports = function (grunt) {

    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Project configuration
    grunt.initConfig({
        // Metadata
        pkg: grunt.file.readJSON('package.json'),
        laravel: {
            // Configurable paths
            assets: 'app/assets',
            bower: 'app/assets/components/bower',
            tmp: 'app/assets/.tmp',
            dest: 'public',
            views: 'app/views'
        },
        // Empties folders to start fresh
        clean: {
            files: {
                dot: true,
                src: [
                    //'<%= laravel.tmp %>/images/**/*',
                    //'<%= laravel.tmp %>/scripts/**/*',
                    //'<%= laravel.tmp %>/scripts/*',
                    //'<%= laravel.tmp %>/styles/**/*',
                    '<%= laravel.dest %>/fonts/*'
                    '<%= laravel.dest %>/images/**/*',
                    '<%= laravel.dest %>/js/*',
                    '<%= laravel.dest %>/css/*'
                ]
            }
        },
        jshint: {
            options: {
                jshintrc: ".jshintrc"
            },
            gruntfile: {
                src: 'gruntfile.js'
            }
            //target: {
            //    src: ['<%= laravel.assets %>/scripts/*.js']
            //}
        },
        copy: {
            images: {
                files: [{
                    expand: true,
                    cwd: '<%= laravel.assets %>/images',
                    dest: '<%= laravel.tmp %>/images',
                    src: [
                        '**/*.{ico,png,jpg,jpeg}',
                        '*.{ico,png,jpg,jpeg}'
                    ]
                }]
            },
            fonts: {
                files: [{
                    expand: true,
                    dot: true,
                    cwd: '<%= laravel.bower %>/fontawesome/fonts',
                    dest: '<%= laravel.dest %>/fonts',
                    src: [
                        '*.*'
                    ]
                }]
            }
        },
        concat: {
            options: {
                stripBanners: false
            },
            js: {
                src: [
                    '<%= laravel.bower %>/jquery/dist/jquery.min.js',
                    '<%= laravel.bower %>/bootstrap/dist/js/bootstrap.min.js'
                ],
                dest: '<%= laravel.tmp %>/js/concat.js'
            },
            css: {
                src: [
                    '<%= laravel.bower %>/bootstrap/dist/css/bootstrap.min.css',
                    '<%= laravel.bower %>/fontawesome/css/font-awesome.min.css',
                    '<%= laravel.bucketadmin %>/css/style-responsive.css',
                    '<%= laravel.bucketadmin %>/css/style.css',
                    '<%= laravel.assets %>/styles/*'
                ],
                dest: '<%= laravel.tmp %>/styles/concat.css'
            }
        },
        uglify: {
            options: {
                mangle: false,
                compress: true,
                preserveComments: "some"
            },
            dist: {
                src: '<%= laravel.tmp %>/scripts/concat.js',
                dest: '<%= laravel.dest %>/scripts/vendor.min.js'
            }
        },
        // Concatenate and minify CSS
        cssmin: {
            dist: {
                files: [{
                    '<%= laravel.dest %>/styles/vendor.min.css': [ '<%= laravel.tmp %>/styles/concat.css' ]
                }]
            }
        },
        // The following *-min tasks produce minified files in the dist folder
        imagemin: {
            bucketadmin: {
                files: [{
                    expand: true,
                    cwd: '<%= laravel.tmp %>/images/bucketadmin',
                    src: '{,*/}*.{gif,jpeg,jpg,png}',
                    dest: '<%= laravel.dest %>/images/bucketadmin'
                }]
            }
        },
        // Run some tasks in parallel to speed up build process
        concurrent: {
            dist: [
                'imagemin:bucketadmin'
            ]
        }
    });

    // Default task
    grunt.registerTask('default', [
        'jshint',
        'clean',
        'copy:imagesbucket',
        'concurrent:dist',
        'concat',
        'uglify',
        'cssmin',
        'copy:fonts'
        //'watch'
    ]);
};