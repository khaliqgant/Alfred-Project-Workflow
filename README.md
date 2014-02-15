Alfred-Project-Workflow
=======================

Workflow to quickly open projects using Alfred

## Background
There are times when I'm working on 5-6 projects at a time and I want to be able to quickly open a 
new one up. I also love [Alfred](http://www.alfredapp.com/) and so set out to make this.

## Usage
* Initiate with ````proj````
* Prompts for where your projects are located
![Screenshot of project prompt](http://imgur.com/cAHdVL8.png)
* You can optionally set what part of the project you want to launch. For example ````proj Sites assets```` will then launch in your IDE the assets folder. You could also use "*" or "."
* Scroll down to select a project to launch
* It will then launch that project in your IDE and cd to that project in the terminal and run a git status for you

## Issues/Notes
* Right now the IDE is just set to Macvim. I am working on allowing for a configuration set to allow for different IDEs like so:
![Screenshot of config options](http://imgur.com/5lICGTc.png)

Heavily influnced by [gharlan / alfred-github-workflow](https://github.com/gharlan/alfred-github-workflow)

