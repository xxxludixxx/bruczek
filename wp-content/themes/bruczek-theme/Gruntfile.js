/**
 * Created by adam on 20.06.16.
 */
'use strict';
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        // watch for changes and trigger compass, jshint, uglify and livereload
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                },
                files: {
                    'style.css': 'assets/stylesheets/scss/main.scss',
                }
            }
        },
        watch: {
            css: {
                files: 'assets/stylesheets/scss/**/*.scss',
                tasks: ['concat', 'sass']
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/javascript/source/**/*.js'
            ]
        },

        concat: {
            dist: {
                src: ['assets/stylesheets/scss/bootstrap-overrides.scss', 'assets/stylesheets/scss/styles.scss'],
                dest: 'assets/stylesheets/scss/main.scss'
            }
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                options: {
                    sourceMap: 'assets/javascript/map/source-map.js',
                    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                    '<%= grunt.template.today("yyyy-mm-dd") %> */'
                },
                files: {
                    'assets/js/plugins.min.js': [
                        'assets/js/source/plugins.js',
                        'assets/js/vendor/**/*.js',
                        '!assets/js/vendor/modernizr*.js'
                    ],
                    'assets/js/main.min.js': [
                        'assets/js/source/main.js'
                    ]
                }
            }
        },
        // bower wiredep

        wiredep: {
            task: {
                src: [
                    'functions.php'
                ],
                options: {
                    exclude: [

                    ],
                    fileTypes: {
                        php: {
                            block: /(([ \t]*)\/\/\s*bower:*(\S*))(\n|\r|.)*?(\/\/\s*endbower)/gi,
                            detect: {
                                css: /wp_enqueue_style.*get_template_directory_uri.*['"]\/(.*\.css)/gi,
                                js: /wp_enqueue_script.*get_template_directory_uri.*['"]\/(.*\.js)/gi
                            },
                            replace: {
                                js: function(filePath){
                                    var fileName = filePath.substring(filePath.lastIndexOf('/')+1);
                                    var wpHandle = fileName.replace(".","-");
                                    return "wp_enqueue_script('"+wpHandle+"',get_stylesheet_directory_uri() . '/"+filePath+"');";
                                },
                                css: function(filePath){
                                    var fileName = filePath.substring(filePath.lastIndexOf('/')+1);
                                    var wpHandle = fileName.replace(".","-");
                                    return "wp_enqueue_style('"+wpHandle+"',get_stylesheet_directory_uri() . '/"+filePath+"');";
                                }
                            }
                        }
                    }
                }
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: '**/*',
                    dest: 'assets/images/'
                }]
            }
        },

        // deploy via rsync
        deploy: {
            staging: {
                src: "./",
                dest: "~/path/to/theme",
                host: "user@host.com",
                recursive: true,
                syncDest: true,
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc']
            },
            production: {
                src: "./",
                dest: "~/path/to/theme",
                host: "user@host.com",
                recursive: true,
                syncDest: true,
                exclude: '<%= rsync.staging.exclude %>'
            }
        }

    });

    // rename tasks
    grunt.renameTask('rsync', 'deploy');

    // register task
    grunt.registerTask('default', ['concat', 'watch', 'sass']);

};