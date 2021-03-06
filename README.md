Alfred-Project-Workflow [(Download 1.4.0)](http://bit.ly/1ehCkiR)
=======================

Workflow to quickly open projects using Alfred

## Background
There are times when I'm working on 5-6 projects at a time and I want to be able to quickly open a 
new one up. I also love [Alfred](http://www.alfredapp.com/) and so set out to make this.

## Config Options
* Set your IDE and working directory by writing ````proj set```` and the top options will drop down:
![Screenshot of config options](http://i.imgur.com/q5D42cY.png)
* Right now the only two IDEs that I know that will work are Sublime & Macvim. If you are using Sublime you should have set a symlink so as seen [here](http://www.sublimetext.com/docs/2/osx_command_line.html) so the shortcut will be "subl"
* The IDE should by typed in "Macvim" or "Sublime"
* This must be done first. It defaults to "Sites" for a directory and "Macvim" for an IDE

## Usage
* Initiate with ````proj````
* Shows you which projects are located in the directory that you specified
![Screenshot of project prompt](http://imgur.com/tqqqrWI.png)
* Scroll down to select a project to launch
* It will then launch that project in your IDE and cd to that project in the terminal, run a git status for you, and open the Github app for that repository. Note: Install "Command Lines Tools" on the Github app if you want this to work.
* If you use MAMP it will also look up the domain of the project and open it in the browser

* If you want to open a project only in your IDE of choice, initiate with ````ide```` which will bring up your projects and selecting one will then quickly open it in your IDE.
* No arguments are accepted for this option

# Local Bash File
* Sometimes in my projects I have a localized bash-rc file called ‘bashrc-local'
* With this project loader I conditinoally check for a local bashrc-local file which can only be a maximum of 
two directories deep and load it <br/>
````
[ $(find . -maxdepth 2 -name .bashrc-local) ] && cd $(dirname $(find . -maxdepth 2 -name .bashrc-local)) && source .bashrc-local
````
<br/>

# Roadmap
* Add in the option to pass in an argument for another website to open. In my use case would be a JIRA ticket ID


This project is heavily influnced by [gharlan / alfred-github-workflow](https://github.com/gharlan/alfred-github-workflow)

