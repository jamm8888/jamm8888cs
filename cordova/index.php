<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>How To: Portable App using Cordova, jquery-mobile and ajax</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- highlight.js css and javascript -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>

    <!-- custom css and javascript -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- design from http://codepen.io/SitePoint/full/GgOzwX/ -->
  </head>
  <body data-spy="scroll" data-target=".scrollspy">
  <!-- START top navbar -->
    <div class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">HowTo</a>
          <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
          </a>
        </div>
        <div class="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a>
            </li>
            <li><a href="#introduction">Introduction</a>
            </li>
            <li><a href="#pre-requisites">Pre-Reqs</a>
            </li>
            <li><a href="#software-install">Software</a>
            </li>
            <li><a href="#get-started">Build App</a>
            </li>
            <li><a href="#paydirt">Try it out</a>
            </li>
          </ul>        
        </div>
        <!--/.navbar-collapse -->
      </div>
    </div>
    <!-- END top navbar -->
    <!-- START Jumbotron -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="font-effect-3d-float heading">Portable Phone App with Ajax APIs</h1>
        <h2 class="font-effect-3d-float">Using Cordova, HTML5 and jquery-mobile</h2>
        <h3><span class="fa fa-pencil"></span> Cordova = Portability.</h3>
        <h3><span class="fa fa-pencil"></span> jquery-mobile = HTML5 and javascript.</h3>
        
        <!--<a href="http://www.sitepoint.com/understanding-bootstraps-affix-scrollspy-plugins" class="btn btn-primary btn-lg">Learn More</a>-->
      </div>
    </div>
    <!-- END Jumbotron -->
    <!-- START MainContainer -->
    <div class="container" id="main-container">
      <!-- START ROW -->
      <div class="row">
        <!-- START scrollspy navbar -->
        <div class="col-md-3 scrollspy">
          <ul id="nav" class="nav hidden-xs hidden-sm" data-spy="affix">
            <li><a href="#introduction">Introduction</a>
              <ul class="nav">
                <li><a href="#why-cordova"><span class="fa fa-angle-double-right"></span>Why Cordova?</a></li>
              </ul>
            </li>
            <li><a href="#pre-requisites">Pre-Requisites</a>
              <ul class="nav">
                <li><a href="#assumptions"><span class="fa fa-angle-double-right"></span>Assumptions</a></li>
                <li><a href="#min-requirements"><span class="fa fa-angle-double-right"></span>Minimum Requirements</a></li>
              </ul>
            </li>
            <li><a href="#software-install">Install Software</a>
                <ul class="nav">
                  <li><a href="#jdk8">JDK 8</a>
                    <ul>
                      <li><a href="#jdkgotcha">JDK Potential Gotcha!</a></li>
                    </ul class="nav">
                  </li>
                  <li><a href="#nodejs">NodeJS and NPM</a>
                    <ul class="nav">
                      <li><a href="#nodejsgotcha">NodeJS and NPM Potential Gotcha!</a></li>
                    </ul>
                  </li>
                  <li><a href="#androidsdk">Android SDK and Android Studio</a>
                    <ul class="nav">
                        <li><a href="#androidsdkgotcha">Android SDK Potential Gotcha!</a></li>
                    </ul>
                  </li>
                  <li><a href="#cordova">Cordova</a>
                    <ul class="nav">
                      <li><a href="#cordovagotcha">Cordova Potential Gotcha!</a></li>
                    </ul>
                  </li>
                  <li><a href="#cordovajquery">cordova-jquery</a>
                    <ul class="nav">
                        <li><a href="#corjquerygotcha">cordova-jquery Potential Gotcha!</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#get-started">Build The App</a>
                <ul class="nav">
                  <li><a href="#gen-cordova">Create the app</a></li>
                  <li><a href="#gen-cordova-jquery">Install cordova-jquery</a>
                    <ul class="nav">
                      <li><a href="#gen-cordovaj-gotcha">Install cordova-jquery Potential Gotcha!</a></li>
                    </ul>
                  </li>
                  <li><a href="#add-platforms">Add Platforms</a>
                    <ul class="nav">
                      <li><a href="#gen-addp-gotcha">Add Platforms Potential Gotcha!</a></li>
                    </ul>
                  </li>
                  <li><a href="#test-drive">Test-Drive</a></li>
                  <li><a href="#gen-content">Generate Content</a>
                    <ul>
                      <li><a href="#indexhtml">html</a></li>
                      <li><a href="#index-step">html walkthrough</a></li>
                      <li><a href="#indexcss">css</a></li>
                      <li><a href="#indexjs">js</a></li>
                      <li><a href="#java-step">java walkthrough</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#paydirt">Try it out!</a></li>
            </ul>
          </div>
          <!-- END Scrollspy Navbar -->
          <!-- START content -->
          <div class="col-md-9">
            <!-- start introduction section -->
            <section id="introduction">
              <h2><span class="fa fa-edit"></span> Introduction</h2>
              <p>If you tried a lot of the tutorials to pull data from a web api using portable web applications like I did - only to end up with a blank screen on Android - this tutorial is the right one for you!</p>
              <p>I found a lot of tutorials covered some of the items to perform the actions but fell short when it came to updating the security policies for ajax to make a cross site data pull.</p>
              <p>This howto will help you understand how to make a portable hybrid application that pulls information from a cross-site api.  The tricky part is setting up the correct security settings for android to ensure you get more than just a blank page!</p>

              <section id="why-cordova">
              <h3> Why Cordova?</h3>
              A big challenge in writing phone apps is Portability.  Writing a truly native app usually means having to write a different app for every native platform.  Cordova brings the capability to create a hybrid app, an app that can be written once and wrapped with native code to run on more than one platform.
              <p>Cordova = Portability</p>
              </section>
            </section>
            <!-- end introduction section -->
            <!-- start pre-requisites section -->
            <section id="pre-requisites">
              <h2><span class="fa fa-edit"></span> Pre-Requisites</h2>
              <p>
                This tutorial is not intended for those users that have never used HTML5, javascript or css prior.  Links are included in the assumptions below to start your journey if you are an absolute beginner.  You will want to bookmark this page and come back to it once you have completed the tutorials as it may take some time to work through the tutorials depending on your learning capacity.
              </p>
              <!-- start pre-req assumptions section -->          
              <section id="assumptions">
                <h3>Assumptions</h3>
                <p>This tutorial assumes you have a working knowledge in the following areas:
                  <ul>
                    <li>HTML5
                      <ul>
                        <li><a href="http://www.w3schools.com/html/html5_intro.asp" target="_blank">Learn HTML5</a></li>
                      </ul>
                    </li>
                    <li>CSS
                      <ul>
                        <li><a href="http://www.w3schools.com/css/default.asp" target="_blank">Learn CSS</a></li>
                      </ul>
                    </li>
                    <li>Javascript
                      <ul>
                        <li><a href="http://www.w3schools.com/js/default.asp" target="_blank">Learn Javascript</a></li>
                      </ul>
                    </li>
                    <li>Command Line Interpreters like Terminal for Mac/Linux or Command Prompt for Windows
                      <ul>
                        <li><a href="http://www.imore.com/how-use-terminal-mac-when-you-have-no-idea-where-start" target="_blank">Learn how to use Terminal for MAC/Linux</a></li>
                        <li><a href="http://www.computerhope.com/issues/chusedos.htm" target="_blank">Learn how to use Command Prompt in Windows</a></li>
                        <li><a href="http://pcsupport.about.com/od/commandlinereference/f/open-command-prompt.htm" target="_blank">Open command prompt in Windows 8, 8.1, 10</a></li>
                        <li><a href="http://pcsupport.about.com/od/commandlinereference/f/elevated-command-prompt.htm" target="_blank">Open an elevated command prompt in Windows 8, 8.1, 10</a></li>
                      </ul>
                    </li>
                    <li>Basic Phone Navigation for you platform of choice (ios, Android, Windows etc)</li>
                  </ul>
                </p>
              </section>
              <!-- end pre-req assumptions section --> 
              <!-- start pre-req min requirements section --> 
              <section id="min-requirements">
                <h3>Minimum-Requirements</h3>
                <p>
                  Each piece of software you will install for this tutorial has it's own minimum system requirements and links will be provided for each one in the next section where we will install the software.  Here I will list the consolidated minimum system requirements that will be needed to run all the installed software.
                </p>
                <table class="table table-hover table-bordered" id="minreqtable">
                  <thead>
                    <tr>
                      <th>Requirement</th>
                      <th>Windows</th>
                      <th>OS X</th>
                      <th>Linux</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Version</th>
                      <td>8 (professional version)</td>
                      <td>10.8.5</td>
                      <td>GNOME or KDE with glibc 2.11 or later</td>
                    </tr>
                    <tr>
                      <th scope="row">RAM</th>
                      <td colspan="3" class="text-center">2 GB (4 GB Recommended)</td>
                    </tr>
                    <tr>
                      <th scope="row">Resolution</th>
                      <td colspan="3" class="text-center">1280 x 800</td>
                    </tr>                
                    <tr>
                      <th scope="row">Processor</th>
                      <td>For accelerated emulator: 64-bit operating system and
    Intel® processor with support for Intel®
    VT-x, Intel® EM64T (Intel® 64), and Execute Disable (XD) Bit functionality</td>
                      <td>-</td>
                      <td>For accelerated emulator: Intel® processor with support for Intel® VT-x, Intel® EM64T (Intel® 64), and Execute Disable (XD) Bit functionality, or AMD processor with support for AMD Virtualization™ (AMD-V™)</td>
                    </tr>
                    <tr>
                      <th scope="row">Min. Java Development Kit</th>
                      <td>8</td>
                      <td>6</td>
                      <td>8</td>
                    </tr>
                  </tbody>
                </table>
              </section>
              <!-- end pre-req min requirements section -->
            </section>
            <!-- end pre-req min requirements section --> 
            <!-- start software-install sections -->
            <section id="software-install">
              <h2><span class="fa fa-edit"></span> Software Installation</h2>
              <p>
                If you are missing items from the list below be sure to grab a coffee and get ready.  It is time to install the pre-requisite software!  
              </p>
              <!-- start install jdk8 -->
              <section id="jdk8">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>Java Development Kit</h3>
                    <p>
                      Java Development Kit is the core software that allows us to run Cordova, Android SDK, Android Studio and process the javascript.  To check which version you have you will want to open a command line interpreter and type 
                      <p class="text-left"><kbd>java -version</kbd></p>
                    </p>
                    <p>
                      The output should look something similar to this:
                      <p class="text-center"><img src="images/jdkversion.png" class="text-center" /></p>
                      You can see it states we have java version "1.<b>8</b>.0_91".  The bolded value is the version number.  Since we have version 8 we are okay to proceed.  If you do not see 8 or get an error message like below you will need to install the JDK.
                    </p>
                    <p>
                      Windows Error:
                      <pre>&gt;'java' is not recognized as an internal or external command, operable program or batch file.</pre>
                      OSX / Linux Error:
                      <pre>&gt;java -version
-bash: java: command not found</pre>
                    </p>
                    <p>
                      Please Note:  The Java(TM) SE Runtime Environment is not the value we are looking for, as this is the JRE not the JDK.
                    </p>
                    <a href="http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html" target="_blank"><button type="button" class="btn btn-primary">Install JDK 8</button></a>
                    <section id="jdkgotcha">
                        <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> Don't forget to double check if JDK 8 installed correctly by typing <kbd>java -version</kbd>.</p>
                        <p>
                          <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #2</span> Don't forget to double check if JDK 8 was added to the path. <a href="https://docs.oracle.com/cd/E19182-01/820-7851/inst_cli_jdk_javahome_t/" target="_blank">Click here for help</a>
                        </p>
                    </section>
                  </div>
                </div>
              </section>
              <!-- end install jdk8 -->
              <!-- start install nodejs -->
              <section id="nodejs">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>NodeJS and NPM</h3>
                    <p>
                      NodeJS comes packaged with NPM which allows developers to share their code for others to install.  Cordova is one of those pieces of software that is shared via NPM so we will need to install Nodejs with NPM.  To check if you have nodejs and npm installed first type: <kbd>node --version</kbd> to get your nodejs version and <kbd>npm --version</kbd>.  You should see something like the image below if it is installed.  If your version is lower than the version identified as the recommended version <a href="https://nodejs.org/en/" target="_blank">here</a>, you should install the newer version and then update NPM right after as NPM gets updated more often than Nodejs does.
                    </p>
                    <p class="text-center"><img src="images/nodejsandnpm.png" /></p>
                    <a href="https://nodejs.org/en/" target="_blank"><button tyep="button" class="btn btn-primary">Install NodeJS</button></a>
                    <a href="https://docs.npmjs.com/getting-started/installing-node" target="_blank"><button tyep="button" class="btn btn-primary">Update NPM</button></a>
                    <section id="nodejsgotcha">
                        <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> Don't forget to double check if Nodejs and NPM installed correctly.</p>
                        <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #2</span> Don't forget to double check if NodeJS and NPM was added to the path.</p>
                    </section>
                  </div>
                </div>
              </section>
              <!-- end install nodejs -->
              <!-- start install android sdk -->
              <section id="androidsdk">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>Android SDK and Android Studio</h3>
                    <p>
                      Android Studio and the Android SDK bring some nice features we can utilize such as android emulators and the debugging tool adb.
                    </p>
                    <p class="text-center"><img src="images/nodejsandnpm.png" /></p></p>
                    <a href="https://developer.android.com/studio/index.html" target="_blank"><button tyep="button" class="btn btn-primary">Install Android Studio</button></a>
                    <section id="androidsdkgotcha">
                      <p>
                          <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> Don't forget to double check if Android Studio installed correctly.
                      </p>
                      <p>
                          <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #2</span> Another issue I cam across with the installation of Android Studio on MAC is the emulator not installing correctly the first time.  If you open Android Studio click Configure and AVD Manager you will see a Warning on the emulator if this is the case.  If you don't check now and it is incorrect you will see this warning when you get to the portion about running your project in Cordova:
                          <p class="text-center"><img src="images/emulatorBadInstall.png" class="emulateError" /></p>
                      </p>
                    </section>
                  </div>
                </div>
              </section>
              <!-- end install android sdk -->
              <!-- start install cordova -->
              <section id="cordova">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>Cordova</h3>
                    <p>
                      Now we get to put npm to use.  You will need to open your command line interpreter (Elevated Command Prompt on Windows or Terminal on OS X/Linux) and type the following:
                    </p>
                    <p>
                      Windows:
                      <p class="text-center"><kbd>npm install -g cordova</kbd></p>
                    </p>
                    <p>OS X/Linux:
                      <p class="text-center"><kbd>sudo npm install -g cordova</kbd></p>
                    </p>
                    <p>
                      The -g switch tells npm to install cordova globally.  This might be a good time to refill the coffee as cordova will take a few minutes to complete.  
                      <p><a href="https://docs.npmjs.com/cli/install" target="_blank"><button type="button" class="btn btn-primary">Read more about NPM Install</button></a></p>
                    </p>
                    <section id="cordovagotcha">
                      <p>
                        <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> If you see a lot of errors like below you either do not have administrator permission, did not open a command prompt with admin capability or forgot to add sudo in front of the command on OSX / Linux.  (As you can see we forgot to include sudo in our run)
                        <p class="text-center"><img src="images/cordova_elevated.png" class="emulateError" /></p>
                      </p>
                      <p>
                        <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #2</span> If you forget the -g it may not be available on the command line as it will not be globally installed.  If you type: <kbd>cordova -version</kbd> and you receive an error this is likely the case.  
                      </p>
                    </section>
                  </div>
                </div>
              </section>
              <!-- end install cordova -->
              <!-- start install cordova-jquery -->
              <section id="cordovajquery">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>cordova-jquery</h3>
                    <p>Cordova Jquery installs cordova globally so it can be applied later to individual projects.  It is not automatically included when you create a project but we will walk through the steps to add it to a project in the Building the App section.  For now you want to install it in your node_modules directory that was created when you installed cordova.</p>
                    <p>
                    You do not need to use the elevated command prompt in windows for this install but may need to use sudo on OSX/Linux.  If you see errors similar to the gotcha image under installing cordova, try it again with sudo.</p>
                    <p>Type:
                      <p class="text-center"><kbd>npm install -g cordova-jquery</kbd></p>
                    </p>
                    <p>
                      <a href="https://github.com/Open-I-Beam/cordova-jquery-npm" target="_blank"><button type="button" class="btn btn-primary">corova-jquery info</button></a>
                    </p>
                    <section id="corjquerygotcha">
                      <p>
                        <span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> If you forget the -g it may not be available on the command line as it will not be globally installed.  If you type: <kbd>cordova-jquery -version</kbd> and you receive anything other than the below message you likely forgot the -g option:
  <pre>File does not exist - www/index.html you must run cordova-jquery against a valid cordova project within the root directory. Exiting...</pre>  
                      </p>
                    </section>
                  </div>
                </div>
              </section>
              <!-- end install cordova-jquery -->
            </section>
            <!-- end software install -->
            <!-- start build app -->
            <section id="get-started">
              <h2><span class="fa fa-edit"></span> Building the App</h2>
              <p>
                Now for the fun part!  It is time to build the app!  First we will use cordova to create the app, then we will install cordova-jquery into the app, add the html5, css and javascript content, update the security policy so it will run nicely on android and finally we will test it all out!
              </p>
              <!-- start Step 1 -->
              <section id="gen-cordova">
                <h3>Step 1. Create the app in Cordova</h3>
                <p>
                  You will probably want to create a directory to hold your cordova applications so make a direction called Cordova and the change into the Cordova directory.  To create our app in Cordova we will run the command 
                  <p class="text-center">
                    <kbd>cordova -d create myApiApp com.example.myapiapp "My API App"</kbd>
                  </p>  
                  It will take a few minutes for cordova to create all the directories and return but since we used the <code>-d</code> option we can watch the progress.
                </p>
                <p>
                  Once the app returns you will want to type: <kbd>cd myApiApp</kbd> to enter into the root directory of your app.  You should see something like this: 
                  <p class="text-center"><img src="images/cordovacreate.png" /></p>
                </p>
                <p>If you want to see the breakdown of each portion of the command you can:
                  <p><a href="https://cordova.apache.org/docs/en/4.0.0/guide/cli/index.html#create-the-app" target="_blank"><button type="button" class="btn btn-primary">Read More about creating apps</button></a></p>
                </p>
              </section>
              <!-- end Step 1. -->
              <!-- start step 2. -->
              <section id="gen-cordova-jquery">
                <h3>Step 2. Install cordova-jquery</h3>
                <p>
                  From the root directory of our app we want to tell cordova that we want to use jquery with the app.  We are using JQuery mobile for the template for our app and will be using some JQuery as well to perform our ajax calls.  cordova-jquery will give us the capability to do both.
                </p>
                <p>
                  To install cordova-jquery into our app we will want to be directly in the root of our app so we wil Type: 
                  <p>
                    <kbd>cd myApiApp</kbd>
                  </p>.  
                  Then to install cordova-jquery into our app we will type: 
                  <p>
                    <kbd>cordova-jquery</kbd>
                  </p>.  You will first be asked:
<pre>? Would you like to add jQuery mobile to the current Apache Cordova Project?</pre>
                  <p> 
                    Type: <kbd>Y</kbd> and hit enter.  You will then be presented with a list of options.  Highlight: <pre>&gt; applyTemplate</pre> and hit enter.  On the next screen you want to choose the <pre>&gt; listView</pre> template and hit enter.
                  </p>
                </p>
                <p>You will now be prompted to confirm if you want to keep the current code.
                  <p><pre>? Would you like to keep the current code? ...it could get ugly!</pre></p>Type: <keyb>N</keyb> and hit enter.
                </p>
                <p>You should see messages similar to this if you chose the correct options:</p>
                <p class="text-center"><img src="images/jquerymobileinstall.png" class="emulateError" /></p>
                <p>If you picked the incorrect items it is okay.  You can re-run the utility and correct your choices.</p>
                <section id="gen-cordovaj-gotcha">
                    <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> The one gotcha I found here was that cordova-jquery did not install the image directory for me.  I had to do this myself by going to the jquery-mobile site and downloading the images through the link at the bottom of the page into the myApiApp/js directory.  <a href="http://jquerymobile.com/download-builder/" target="_blank">Download images</a></p>
                    Once downloaded you should have a myApiApp/js/images/ directory with a png file and two folder in it.
                </section>
                <a href="https://www.npmjs.com/package/cordova-jquery" target="_blank"><button type="button" class="btn btn-primary">Learn more about cordova-jquery</button></a>
              </section>
              <!-- end step 2 -->
              <!-- start step 3 -->
              <section id="add-platforms">
                <h3>Step 3. Add Platforms</h3>
                <p>
                  At this point we will have a directory that contains a fully functional website.  We do this using the cordova command add platform.  Our first platform to add will be android since android works on Windows, OS X and Linux.  In your Command Line Interpreter type: 
                  <p class="text-center">
                    <kbd>cordova platform add android</kbd>
                  </p>
                  <p>
                    You should see output similar to this if the platform was added correctly
                    <p class="text-center"><img src="images/platformaddandroid.png" class="emulateError" /></p>
                  </p>
                  <p>
                    Note:  You can add more than just android.  Available platforms vary depending on the operating system you are using cordova in.  If you are using Cordova in Windows you will have options such as android, windows, wp8 etc.  If you are using OS X you will see options like android, ios, osx, etc.  To get the list of available platforms for your operating system you can type: 
                    <p class="text-center"><kbd>cordova platform --list</kbd> or <kbd>cordova platform ls</kbd></p>
                    <a href="https://cordova.apache.org/docs/en/4.0.0/guide/cli/index.html#add-platforms" target="_blank"><button tyep="button" class="btn btn-primary">Read More on Platforms</button></a>
                  </p>
                  <section id="gen-addp-gotcha">
                      <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> If you are working on an OS that does not support the Android emulator and you do not have your own android phone that you can plug into your usb you may want to try one of the other emulators available.  If you are on MAC OS X you might attempt to use ios in place of android for each of the cordova commands.  If you are on a Windows 10 computer you may try to use "windows" in place of "android" for each of the cordova commands.  If you are on Windows 8 or 8.1 you may attempt to use "wp8" in place of the cordova commands.  Note that for the windows emulator to work on a Windows computer you will need to install Visual Studio.  <a href="https://www.visualstudio.com/en-us/products/visual-studio-community-vs.aspx" target="_blank">Get Visual Studio 2015 Community Free</a></p>
                  </section>
                </p>
              </section>
              <!-- end Step 3 -->
              <!-- Start Step 4 -->
              <section id="test-drive">
                <h3>Step 4. Test Drive</h3>
                <p>
                  We are not yet finished but we want to ensure everything is working correctly at this point so we will give our app a test drive.  If you plan to use your own device to install the app on, you will want to plug it into the USB port.  Your device will need to enable Developer Options on your phone.  If you are unsure how to enable Developer Options on your phone <a href="http://www.greenbot.com/article/2457986/how-to-enable-developer-options-on-your-android-phone-or-tablet.html" target="_blank">Click Here</a>.  Once your phone is recognized by your operating system you are clear to proceed.
                </p>
                <p>If you are using your own phone in the Command Line Interpreter type: 
                  <p><kbd>cordova run android</kbd></p>
                </p>
                <p>If you are using an emulator type:
                  <p><kbd>cordova emulate android</kbd></p>
                  Please Note:  The emulator will not work if the minimum requirements are not setup and/or Android-Studio is not functioning correctly.  If you are unable to get android to run see <a href="#gen-addp-gotcha">Gotcha #1</a> under Add Platforms.
                </p>
                <p>You should see somthing similar to this:</p>
                <div class="row">
                  
                  <p class="text-center">
                  <img src="images/testd4.png" class="screenshot" /><img src="images/testd3.png" class="screenshot" /><img src="images/testd2.png" class="screenshot"/><img src="images/testd1.png" class="screenshot"/></p>
                </div>
              </section>
              <section id="gen-content">
                <h2><span class="fa fa-edit"></span> Generate Content</h2>
                <section id="indexhtml">
                  <h3>HTML - index.html</h3>
                  <p>
                    Below is the code we will use for index.html located in the myApiApp/www folder.  We will walk through each interesting part of the code in the next section.
                  </p>
                  <pre><code class="html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta http-equiv="Content-Security-Policy" content="default-src &apos;self&apos; &apos;unsafe-inline&apos; data: gap: https://ssl.gstatic.com &apos;unsafe-eval&apos;; style-src &apos;self&apos; &apos;unsafe-inline&apos;; media-src *; script-src &apos;self&apos; https://api-assignment3b.appspot.com/customers/* &apos;unsafe-inline&apos; &apos;unsafe-eval&apos;; connect-src *;"&gt;
        
        &lt;meta name="format-detection" content="telephone=no"&gt;
        &lt;meta name="msapplication-tap-highlight" content="no"&gt;
        &lt;meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"&gt;
        &lt;link rel="stylesheet" type="text/css" href="css/index.css"&gt;
        &lt;link rel="stylesheet" type="text/css" href="js/jquery-1.5.0.mobile.min.css"&gt;
        &lt;link rel="stylesheet" type="text/css" href="css/custom.css"&gt;
        &lt;style&gt;
          /* For avoiding title truncation in wp8 */
          .ui-header .ui-title {
              overflow: visible !important;
          }
          /* For fixing the absolute position issue for the default cordova gen page*/
          #cjp-accordion1 .app {
              left: 5px !important;
              margin: 5px !important;
              position: relative !important;
          }
        &lt;/style&gt;
        &lt;title&gt;My Api App&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;div id="content"&gt;
      &lt;!-- page 1 --&gt;

    &lt;div data-role="page" id="homePage"&gt;
      &lt;div data-role="header"&gt;
        &lt;h1&gt;Home&lt;/h1&gt;
      &lt;/div&gt;
      &lt;ul data-role="listview"&gt;
        &lt;li&gt;&lt;a href="#customers" data-transition="slide"&gt;Customer List&lt;/a&gt;&lt;/li&gt;
        &lt;!-- &lt;li&gt;&lt;a href="#headline"&gt;Customer Data&lt;/a&gt;&lt;/li&gt;--&gt;
      &lt;/ul&gt;
      
      &lt;div data-role="footer" data-position="fixed"&gt;
        &lt;h1&gt;Home&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt; &lt;!-- home page --&gt;

    &lt;!-- page 2 --&gt;
    &lt;div data-role="page" id="customers"&gt;
      &lt;div data-theme="a" data-role="header"&gt;
        &lt;a href="#" data-icon="back" data-rel="back" data-transition="slide" title="Go back"&gt;Back&lt;/a&gt;
        &lt;h3&gt;
          List of Customers
        &lt;/h3&gt;
      &lt;/div&gt;
      &lt;div data-role="ui-content"&gt;
        &lt;div class="example-wrapper" data-iscroll&gt;
          &lt;ul data-role="listview" id="customer-single" data-theme="a"&gt;                  
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div data-role="footer" data-position="fixed" data-theme="a"&gt;
        &lt;h1&gt;Copyright 2016&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt;&lt;!-- /page2 --&gt;

    &lt;!-- page 3 --&gt;
    &lt;div data-role="page" id="headline"&gt;
      &lt;div data-role="header"&gt;
        &lt;a href="#customers" data-icon="back" data-transition="slide" data-direction="reverse" title="Go back"&gt;Back&lt;/a&gt;
        &lt;h1&gt;Individual Customer Info&lt;/h1&gt;
      &lt;/div&gt;
      &lt;div data-role="content"&gt;
        &lt;ul data-role="listview" id="customer-data" data-theme="a"&gt;                    
        &lt;/ul&gt;
      &lt;/div&gt;
      &lt;div data-role="footer" data-position="fixed"&gt;
        &lt;h1&gt;Copyright 2015&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt;&lt;!-- /page3 --&gt;
  &lt;/div&gt;
  &lt;script type="text/javascript" src="cordova.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="js/jquery-1.11.1.min.js" id="cordova-jquery"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" id="jqm-trans-disable"&gt;
    /* For having a faster transition */
    $(document).on("mobileinit", function() {
        $.mobile.defaultPageTransition = "none";
        $.mobile.defaultDialogTransition = "none";
    });
  &lt;/script&gt;
  &lt;script type="text/javascript" src="js/jquery-1.5.0.mobile.min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="js/index.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="js/custom.js"&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
                </section><!-- GOOD TO HERE -->
                <section id="index-step">
                  <h3>Step through of index.html code</h3>
                  <p>
                    We will cover only those sections that are applicable to app and not related to general HTML5.  We will start with the Content-Security-Policy meta tag as this tag becomes one of the most important items when pulling information from a different location than phone storage.
                  </p>
                  <p>
                    The default security policy implemented when you create a project and apply cordova-jquery looks like this: 
<pre>&lt;meta http-equiv="Content-Security-Policy" content="default-src &apos;self&apos; data: gap: https://ssl.gstatic.com &apos;unsafe-eval&apos;; style-src &apos;self&apos; &apos;unsafe-inline&apos;; media-src *"&gt;</pre>
                  </p>
                  <p>
                    the content attribute contains the policy information. We use some external style sheets with external images for cordova and jquery so the default is set to allow those.
                    <ul>
                      <li>default-src is the default source of information and applies to all items not specifically identified in the content.</li>
                      <li>data: allows data URI - can provide a file within a file and is not very secure</li>
                      <li>style-src identifies valid sources for stylesheets</li>
                      <li>media-src identifies valid sources for audio and video sources</li>
                    </ul>
                  </p>
                  <p>
                    If you were to copy over the above security policy instead of the one below, and you were to run the program, you would see a blank page.  Why?  Cross Site Scripting (XSS) is one form of attack hackers use to maliciously.  Restricting the sites you receive content from is a layer of protection.  It prevents windows from being spawned in iframes or popups that contain malicious code.  Since we know we definitely want to pull data from an external site we need to tell the app that we agree that the data coming from the api is okay to read.  We do this by adding capability for our app to connect to and read from the external site https://api-assignment3b.appspot.com/customers/* by adding the following to our meta tag:
<pre>script-src &apos;self&apos; https://api-assignment3b.appspot.com/customers/* &apos;unsafe-inline&apos; &apos;unsafe-eval&apos;; connect-src *;</pre>
                    connect-src adds the ability to make an XMLHttpRequest and script-src allows us to make the request to the specified location.  We added a trailing star to the url as we will also be querying individual customers via the api and will need to add the keys onto the end of the url along with the callback code ajax applies during the request.
                  </p>

                  <p>You can read more on the Content-Security-Policy directives
                    <a href="https://developer.mozilla.org/en/docs/Web/Security/CSP/CSP_policy_directives" target="_blank">Here</a>.
                  </p>
                  <section id="index-page1">
                    <h4>Page 1</h4>
                    <p>
                      We then update the page to include the following:
<pre>   &lt;div data-role="page" id="homePage"&gt;
      &lt;div data-role="header"&gt;
        &lt;h1&gt;Home&lt;/h1&gt;
      &lt;/div&gt;
      &lt;ul data-role="listview"&gt;
        &lt;li&gt;&lt;a href="#customers" data-transition="slide"&gt;Customer List&lt;/a&gt;&lt;/li&gt;
      &lt;/ul&gt;
      
      &lt;div data-role="footer" data-position="fixed"&gt;
        &lt;h1&gt;Home&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt; &lt;!-- home page --&gt;</pre>
                      <p>
                        This page is the main menu page.  When we click on a list item we want to go to the page that pulls the information for that item, currently we have Customer List to take us to the navigation pane that pulls the data for the customer list from the external site we identified above.  We will cover more on that in the javascript section.
                      </p>
                      <p>
                        To give the app a nice sliding feel we tell the app we want to transition to the link we assign using a slide transition by assigning 'slide' to the data-transition attribute of the anchor &lt;a&gt; tag.
                      </p>
                      <p>
                        At the bottom of the page we have a footer that is fixed (sticky) to the bottom of the page by assigning the data-role of footer to the div and assigning the attribute data-position the value of fixed.  If the content exceeds the length of the page these values hold the footer at the bottom of the screen.
                      </p>
                    </p>
                  </section>
                  <section id="index-page2">
                    <h4>Page 2 - List of customer IDs</h4>
                    <p>
                      The second page will hold the list of customer ids that we retrieve from the external api.  Clicking on the link on the last page will bring this page into view and start the api.  We will cover more on the api retrieval in the javascript section.
                    </p>
<pre>   &lt;!-- page 2 --&gt;
    &lt;div data-role="page" id="customers"&gt;
      &lt;div data-theme="a" data-role="header"&gt;
        &lt;a href="#" data-icon="back" data-rel="back" data-transition="slide" title="Go back"&gt;Back&lt;/a&gt;
        &lt;h3&gt;
          List of Customers
        &lt;/h3&gt;
      &lt;/div&gt;
      &lt;div data-role="ui-content"&gt;
        &lt;div class="example-wrapper" data-iscroll&gt;
          &lt;ul data-role="listview" id="customer-single" data-theme="a"&gt;                  
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div data-role="footer" data-position="fixed" data-theme="a"&gt;
        &lt;h1&gt;Copyright 2016&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt;&lt;!-- /page2 --&gt;</pre>
                    <p>
                      The section is given the role of "page" buy assigning the div the data-role of 'page'.  This allows us to link to it and bring it into view as though it is a seperate page when the link is clicked.
                    </p>
                    <p>
                      The data theme assigned to the header is 'a'.  JQuery-mobile has two themes a and b.  a is the light theme and b is the dark theme.
                    </p>
                    <p>
                      We create a link to go back to the menu by assigning data-rel back with data-icon 'back'.  To make the transition uniform we also assign the back link a slide transition.
                    </p>
                    <p>
                      The unordered list &lt;ul&gt; on this page does not have any list items.  This is because we are unsure exactly how many customer ids we are going to pull from the api when we query the data.  The list items will be added to the listview in the javascript file which we will cover more on in the javascript section.
                    </p>
                  </section>
                  <section id="index-page3">
                    <h4>Page 3 - Individual Customer data</h4>
                    <p>
                      The page for the individual customer data was not linked to from the main menu since we only want it to appear when we have clicked a customer ID on page 2.  It is setup the same way as page two but you will notice on the back button we have a new attribute data-direction with an assigned value of 'reverse' instead of data-rel='back'.  data-rel='back' takes us to the initial view of the app, whereas data-direction="reverse" takes us to last page in reverse order we visited - being the list of customer ids.
                    </p>
<pre>    &lt;!-- page 3 --&gt;
    &lt;div data-role="page" id="headline"&gt;
      &lt;div data-role="header"&gt;
        &lt;a href="#customers" data-icon="back" data-transition="slide" data-direction="reverse" title="Go back"&gt;Back&lt;/a&gt;
        &lt;h1&gt;Individual Customer Info&lt;/h1&gt;
      &lt;/div&gt;
      &lt;div data-role="content"&gt;
        &lt;ul data-role="listview" id="customer-data" data-theme="a"&gt;                    
        &lt;/ul&gt;
      &lt;/div&gt;
      &lt;div data-role="footer" data-position="fixed"&gt;
        &lt;h1&gt;Copyright 2016&lt;/h1&gt;
      &lt;/div&gt;&lt;!-- /footer --&gt;
    &lt;/div&gt;&lt;!-- /page3 --&gt;</pre>
                  </section>
                  <section id="index-jquery">
                    <h4>page script</h4>
                    <p>
                      At the bottom of the html page there is a javascript function.  In JQuery-mobile $(document).on() is the equivalent of assigning a listener for an event which is mobileinit in this case.  Once the mobileinit event is triggered the function is run clear the default page transition and the default dialog transtions for faster transitioning between panels.
                    </p>
<pre>&lt;script type="text/javascript" id="jqm-trans-disable"&gt;
    /* For having a faster transition */
    $(document).on("mobileinit", function() {
        $.mobile.defaultPageTransition = "none";
        $.mobile.defaultDialogTransition = "none";
    });
  &lt;/script&gt;</pre>
                  </section>
                </section>
                <section id="indexcss">
                  <h3>CSS - custom.css</h3>
                  <p>
                    The additional styling for the app provides some padding to ui-content, ui-listview and scroller items on the customer detail page.
                  </p>
                  <pre><code class="css">.ui-content {
    padding: 0 !important;
}
  
.ui-listview {
    margin: 0 !important;
}
  
.example-wrapper, .example-wrapper div.iscroll-scroller {
    width: 100% !important;
}</code></pre>
                </section>
                <section id="indexjs">
                  <h3>JAVASCRIPT - custom.js</h3>
                  <p>
                    The javascript file should be labeled custom.js and put into the myApiApp/www/js folder.  Once created the below can be copied in.  The next section will provide an explanation of what the code is accomplishing.  The icon was downloaded from <a href="http://www.iconarchive.com/show/pretty-office-8-icons-by-custom-icon-design/Users-icon.html" target="_blank">www.iconarchive.com</a> and saved inside the myApiApp/www/img folder.
                  </p>
                  <pre><code class="javascript">$(document).on('pagecreate', '#customers', function(){  

    var url = 'https://api-assignment3b.appspot.com/customers/';     
    runAjax(url, 'GET', customerSuccess);
});

$(document).on('pagebeforeshow', '#headline', function(){  
    $('#customer-data').empty();        
    $.each(customerInfo.result, function(i, row) {
        if(row == customerInfo.id) {
            $('#customer-data').append('&lt;li&gt;Customer ID: '+ row +'&lt;/li&gt;');
            url = 'https://api-assignment3b.appspot.com/customers/' + row + '/';
            runAjax(url, 'GET', custIndSuccess);         
        }
    });    
});

$(document).on('vclick', '#customer-single li a', function(){  
    customerInfo.id = $(this).attr('data-id');
    $.mobile.changePage( "#headline", { transition: "slide", changeHash: false });
});
 
var customerInfo = {
    id : null,
    result : null
}
 
var ajax = {  
    parseJSONP:function(result){ 
        $('#customer-single').empty();
        customerInfo.result = result.keys;
        $.each(result.keys, function(i, row) {
            console.log(JSON.stringify(row));
            console.log(row.id);
            $('#customer-single').append('&lt;li&gt;&lt;a href="" data-id="' + row + '"&gt;&lt;img src="img/Users-icon.png"/&gt;&lt;h3&gt;' + row + '&lt;/h3&gt;&lt;/a&gt;&lt;/li&gt;');
        });
        $('#customer-single').listview('refresh');
    }
}; 

function runAjax(url, actionType, successFunction){
    $.ajax({
        url: url ,
        dataType: "json",
        async: true,
        type: actionType,
        contentType: 'application/json',
        success: function (result) {
            successFunction(result);
        },
        error: function (request,error) {
            $('#customer-data').append('ERROR');
            alert('Network error has occurred please try again!');
        }
    }); 
}

function customerSuccess(result){
    ajax.parseJSONP(result);
}

function custIndSuccess(result){
    $('#customer-data').append('&lt;li&gt;Name: ' + result.firstName + ' ' + result.lastName + '&lt;/li&gt;');
    $('#customer-data').append('&lt;li&gt;Email: ' + result.email + '&lt;/li&gt;');
    $('#customer-data').append('&lt;li&gt;Created: ' + result.created + '&lt;/li&gt;');
    $('#customer-data').listview('refresh');

}</code></pre>
                </section><!-- GOOD TO HERE -->
                <section id="java-step">
                  <h3>Javascript step through</h3>
                  <p>
                    As we already learned during the breakdown of index.html $(document).on() listens for an event and runs a function when the event is encountered.  Our first function is listening for the creation of the page and sending the ajax request by calling the function runAjax.  When the ajax callback successfully returns it parses the information into a JSON object (var ajax) and creates the listitem in the customer-single element on the first page.
                  </p>
                  <p>
                    The third function above is set to listen for a virtual click on anchors in list items in the customer-single listview id.  As the listitems are generated on the first page as mentioned in the first paragraph, this function is now waiting for the virtual click event.
                  </p>
                  <p>
                    If we click on an item in the list it 'slides' to page 3 and triggers the second function below which is listening for the pagebeforeshow event on #headline.  Once the event is triggered it sends a second ajax request to get the user information using the id that was clicked on the last page.
                  </p>
                </section>
              </section>
            </section>
            <section id="paydirt">
              <h2><span class="fa fa-edit"></span> Try it out!</h2>
              <p>
                Now for the fun part!  We get to try it out!  Type:
                <p class="text-center"><kbd>cordova -d run android</kbd></p>
                Be prepared to wait a few minutes while the emulator initializes.  Do not panic if you see the black screen for a few minutes - it can sometimes take up to 10 minutes to load the emulator fully.  
                <p>You should see somthing similar to this:</p>
                <div class="row">
                  <p class="text-center">
                  <img src="images/testd1b.png" class="screenshot2" /><img src="images/testd2b.png" class="screenshot2" /><img src="images/testd3b.png" class="screenshot2"/></p> 
                </div>
              </p>
            </section>
          </div>   
        </div><!--end of .row-->
      </div><!--end of .container-->
      <footer>
        <p class="text-center">HowTo CS496 ammj@oregonstate.edu Jeannine Amm</p>
      </footer>


    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js'></script>
    <script src='js/custom.js'></script>
  </body>
</html>
