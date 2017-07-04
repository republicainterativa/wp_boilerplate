// -------------------------------------------------------
// Gruntfile.js for República Interativa's projects
// Version: 3.0.0
//
// Author:  Sergio Costa
// URL:     http://www.republicainterativa.com.br
// Contact: requipe@republicainterativa.com
// -------------------------------------------------------
"use strict";

module.exports = function(grunt) {

    /**
     * Para instalar o grunt do projeto: $ npm install grunt --save-dev
     */

    // Para instalar matchdep na pasta src do projeto: $ npm install matchdep --save-dev
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    var projectConfig = {

        // Setting Directories
        dirs: {
            app:  "../",
            js:   "../assets/js",
            sass: "../assets/sass",
            css:  "../assets/css",
            img:  "../assets/img"
        },

        // Metadata
        pkg: grunt.file.readJSON("package.json"),
        banner:
        "\n" +
        "/*\n" +
         "* -------------------------------------------------------\n" +
         "* Project: República Interativa\n" +
         "* Version: 2.0.0\n" +
         "*\n" +
         "* Author:  República Interativa\n" +
         "* URL:     http://republicainterativa.com\n" +
         "* Contact: requipe@republicainterativa.com\n" +
         "*\n" +
         "*\n" +
         "* Copyright (c) 2017 - República Interativa\n" +
         "* -------------------------------------------------------\n" +
         "*/\n" +
         "",

        // Watch 
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-watch --save-dev
        watch: {
            options: {
                livereload: true
            },
            compass: {
                files: [
                    "<%= dirs.css %>/{,*/}*.css",
                    "<%= dirs.sass %>/{,*/}*.{scss,sass}"
                ],
                tasks: ["compass", "notify:compass"]
            },
            js: {
                files: ["<%= dirs.js %>/{,*/}*.js"],
                tasks: ["uglify", "notify:js"]
            },
            html: {
                files: [
                    // supported files: html, htm, shtml, shtm, xhtml, php, jsp, asp, aspx, erb, ctp
                    "<%= dirs.app %>/*.{html,htm,shtml,shtm,xhtml,php,jsp,asp,aspx,erb,ctp}"
                ]
            }
        },

        // Uglify
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-uglify --save-dev
        uglify: {
            options: {
                mangle: false,
                banner: "<%= banner %>",
                beautify: false,
                compress: true
            },
            dist: {
                files: {
                    "<%= dirs.js %>/jquery.min.js": [
                        "<%= dirs.js %>/uncompressed/jquery-2.2.4.js",
                    ],

                    "<%= dirs.js %>/main.min.js": [
                        "<%= dirs.js %>/uncompressed/scripts.js"
                    ],

                    "<%= dirs.js %>/picturefill.min.js": [
                        "<%= dirs.js %>/uncompressed/picturefill.js"
                    ]
                }
            }
        },

        // Compass
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-compass --save-dev
        compass: {
            dist: {
                options: {
                    sassDir: '../assets/sass',
                    cssDir: '../assets/css',
                    environment: "development",
                    outputStyle: "expanded",
                    force: true,
                    config: "config.rb"
                }
            }
        },

        // Notify
        // Para instalar na pasta src do projeto: $ npm install grunt-notify --save-dev
        notify: {
          compass: {
            options: {
              title: "SASS - <%= pkg.title %>",
              message: "Compilado e minificado com sucesso!"
            }
          },
          js: {
            options: {
              title: "Javascript - <%= pkg.title %>",
              message: "Concatenado e minificado com sucesso!"
            }
          },
          image: {
            options: {
              title: "<%= pkg.title %>",
              message: "Imagens minificadas!"
            }
          }
        },

        // Image Optimization
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-imagemin --save-dev
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 3,
                    progressive: true
                },
                files: [{
                    expand: true,
                    cwd: "<%= dirs.img %>/",
                    src: "<%= dirs.img %>/**",
                    dest: "<%= dirs.img %>/"
                }]
            }
        }

    };

    // Init Grunt
        grunt.initConfig(projectConfig);


    // Register Tasks
    // ----------------

    // Watch Project - $ grunt
    grunt.registerTask( "default", [ "watch" ]);

    // Uglify js - $ grunt u
    grunt.registerTask( "u", [ "uglify" ]);

    // Optimize the images files - $ grunt o
    grunt.registerTask( "o", [ "imagemin" ]);


};