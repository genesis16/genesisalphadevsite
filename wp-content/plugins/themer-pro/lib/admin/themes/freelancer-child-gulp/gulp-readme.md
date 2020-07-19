# Gulp Setup

## First-Time Setup

If you have not yet run the initial Gulp Setup Script for use with Instant IDE then do so now.

gulp-first-time-setup.sh is found here: https://gist.github.com/cobaltapps/33808bbc843510aa1d06702e810ae42c

NOTE: If you already used the gulp-user-data-setup.sh script code in the setup of a new Cloud Server (as per a Cobalt Apps tutorial) then the above script does not need to be run.

For reference... gulp-user-data-setup.sh is found here: https://gist.github.com/cobaltapps/ba451f706cc5eabd7419f2d038d69229

## New Child Theme Setup

Once either the gulp-first-time-setup or gulp-user-data-setup script has been executed you will only need to run the gulp-setup.sh script from that point on.

The gulp-setup.sh script should be included in the Child Theme by default (assuming it was created by Themer Pro), but if not then see below for a reference.

gulp-setup.sh is found here: https://gist.github.com/cobaltapps/0618a042fbadd7ed83fdae51c19834b9

To run this script you just need to do two things using Instant IDE:

1. Copy/paste this line into the Console to make this script executable: chmod +x gulp-setup.sh
2. Copy/paste this line into the Console to execute this script: ./gulp-setup.sh

## Running Gulp

Once that is finished running you can then type "gulp" into the Console, hit enter, and if the Console does not give any errors after about 5 seconds or so you can close the Console.

Note that when running this setup script the Console may seem to freeze-up for several seconds before it provides a response. That's normal.

If all goes well you should then be able to edit your /src/ files and have then compile and copy and update as specified in your gulpfile.babel.js file.

Also note that once you have this setup and running you may want to click the gear icon at the top-right of your file browser and then click "Refresh File Tree" to update your file tree and see all the NodeJS files/folders.

(When you first activate your Gulpified Child Theme it will not have any styling because the primary stylesheet will not have been created yet. This will resolve itself after your first Gulp-powered save.)