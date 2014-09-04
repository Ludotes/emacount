'use strict';
module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            all: ['Gruntfile.js',
                'app/webroot/js/**/*.js',
                '!app/webroot/js/components/*.js',
                '!app/webroot/js/app.js'],
            options: {
                jshintrc: '.jshintrc'
            }
        },
        compass: {
            dist: {
                options: {
                    require: ['animate'],
                    sassDir: 'app/webroot/sass',
                    cssDir: 'app/webroot/css',
                    environment: 'production'
                }
            },
            dev: {
                options: {
                    require: ['animate'],
                    sassDir: 'app/webroot/sass',
                    cssDir: 'app/webroot/css'
                }
            }
        },
        watch: {
            js: {
                files: ['Gruntfile.js', 'app/webroot/js/**/*.js'],
                tasks: ['jshint:all']
            },
            sass: {
                files: ['app/webroot/sass/**/*.scss', 'app/webroot/sass/**/*.sass'],
                tasks: ['compass:dev', 'autoprefixer'],
                options: {
                    livereload: 1337
                }
            }
        },
        autoprefixer: {
            multipleFiles: {
                  expand: true,
                  flatten: true,
                  src: ['app/webroot/css/afficheurs/*.css'],
                  dest: 'app/webroot/css/afficheurs/'
            },
        }
    }
    );
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.registerTask('default', ['watch']);
};