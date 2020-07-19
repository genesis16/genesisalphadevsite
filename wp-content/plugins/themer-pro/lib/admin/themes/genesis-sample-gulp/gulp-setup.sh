#!/bin/sh

## Once the "gulp-first-time-setup" script has been run (see gulp-readme.md) you should run THIS version from that point on

## Copy/paste this line into the Console to make this script executable: chmod +x gulp-setup.sh
## Copy/paste this line into the Console to execute this script: ./gulp-setup.sh

## Initialize NPM
npm init --yes

## Install Gulp and the rest of the dependencies locally
npm install --save-dev gulp @babel/register @babel/preset-env @babel/core yargs gulp-sass gulp-clean-css gulp-if gulp-sourcemaps gulp-postcss autoprefixer gulp-imagemin del webpack-stream babel-loader vinyl-named gulp-zip gulp-wp-pot

## Delete this script when finished running commands
sudo rm gulp-setup.sh