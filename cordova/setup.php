<?php
?><!DOCTYPE html>
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
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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


  	<div class="navbar navbar-fixed-top navbar-default">
  	<div class="container">
      <div class="navbar-header"><a class="navbar-brand" href="#">HowTo</a><a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="glyphicon glyphicon-bar"></span>
          <span class="glyphicon glyphicon-bar"></span>
          <span class="glyphicon glyphicon-bar"></span>
        </a>
      </div>
        <div class="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a>
                </li>
                <li><a href="#about">About</a>
                </li>
                <li><a href="#contact">Contact</a>
                </li>
            </ul>
        
        </div>
        <!--/.navbar-collapse -->
    </div>
</div>
  <div class="jumbotron">
    <div class="container">
      <h1 class="font-effect-3d-float heading">Portable Phone App with Ajax APIs</h1>
      <h2 class="font-effect-3d-float">Using Cordova, HTML5 and jquery-mobile</h2>
      <h3><span class="fa fa-pencil"></span> Cordova = Portability.</h3>
      <h3><span class="fa fa-pencil"></span> jquery-mobile = HTML5 and javascript.</h3>
      
      <!--<a href="http://www.sitepoint.com/understanding-bootstraps-affix-scrollspy-plugins" class="btn btn-primary btn-lg">Learn More</a>-->
    </div>
  </div><!--end of .jumbotron-->

  <div class="container">
    <div class="row">

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
                    </ul>
                </li>
                <li><a href="#nodejs">NodeJS and NPM</a>
                    <ul>
                        <li><a href="#nodejsgotcha">NodeJS and NPM Potential Gotcha!</a></li>
                    </ul>
                </li>
                <li><a href="#androidsdk">Android SDK and Android Studio</a>
                    <ul>
                        <li><a href="#nodejsgotcha">Android SDK Potential Gotcha!</a></li>
                    </ul>
                </li>
                <li><a href="#cordova">Cordova</a>
                    <ul>
                        <li><a href="#nodejsgotcha">Cordova Potential Gotcha!</a></li>
                    </ul>
                </li>
                <li><a href="#cordovajquery">cordova-jquery</a>
                    <ul>
                        <li><a href="#nodejsgotcha">cordova-jquery Potential Gotcha!</a></li>
                    </ul>
                </li>
            </ul>
          </li>
          <li><a href="#social">Social</a></li>
          <li><a href="#management">Management</a></li>
          <li><a href="#chemistry">Chemistry</a></li>
          <li><a href="#mobile-development">Mobile Development</a>
            <ul class="nav">
              <li><a href="#android"><span class="fa fa-angle-double-right"></span>Android</a></li>
              <li><a href="#iOS"><span class="fa fa-angle-double-right"></span>iOS</a></li>
            </ul>
          </li>
          <li><a href="#mathematics">Mathematics</a></li>
        </ul>
      </div>

      <div class="col-md-9">
        <section id="introduction">
          <h2><span class="fa fa-edit"></span> Introduction</h2>
          If you tried a lot of the tutorials for portable web applications like I did only to end up with a blank screen on Android while working with APIs - this tutorial is the right one for you!  I found a lot of tutorials covered some of the items to perform the actions but fell short when it came to updating the security policies to get the application to work with a cross site data pull.
          <p>This howto will help you understand how to make a portable hybrid application that pulls information from a cross-site api.  The tricky part is setting up the correct security settings for android to ensure you get more than just a blank page!</p>

          <section id="why-cordova">
          <h3> Why Cordova?</h3>
          A big challenge in writing phone apps is Portability.  Writing a truly native app usually means having to write a different app for every native platform.  Cordova brings the capability to create a hybrid app, an app that can be written once and wrapped with native code to run on more than on platform.
          <p>Cordova = Portability</p>
          </section>
        </section>
        <section id="pre-requisites">
          <h2><span class="fa fa-edit"></span> Pre-Requisites</h2>
          <p>This tutorial was not intended for those users that have never used HTML5, javascript or css prior.  Links are included in the assumptions below to start your journey if you are an absolute beginner.  You will want to bookmark this page and come back to it once you have completed the tutorials as it may take some time to work through the tutorials depending on your learning capacity.</p>
          
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
          <section id="min-requirements">
            <h3>Minimum-Requirements</h3>
            <p>Each piece of software you will install for this tutorial has it's own minimum system requirements and links will be provided for each one in the next section where we will install the software.  Here I will list the consolidated minimum system requirements that will be needed to run all the installed software.</p>
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
          </section><!--end of #php-->
        </section><!--end of #web-devlopment-->

        <section id="software-install">
          <h2><span class="fa fa-edit"></span> Software Installation</h2>
          <p>If you are missing items from the list below be sure to grab a coffee and get ready.  It is time to install the pre-requisite software.  
          </p>
          <section id="jdk8">
            <h3>Java Development Kit</h3>
            <p>
                Java Development Kit is the core software that allows us to run Cordova, Android SDK, Android Studio and process the javascript.  To check which version you have you will want to open a command line interpreter and type <kbd>java -version</kbd></p>
            <p>
                The output should look something similar to this:
                <p class="text-center"><img src="images/jdkversion.png" class="text-center" /></p>
                You can see it states we have java version "1.<b>8</b>.0_91".  The bolded value is the version number.  Since we have version 8 we are okay to proceed.  If you do not see 8 or get an error message - you will need to install the JDK.
            </p>
            <p>Please Note:  The Java(TM) SE Runtime Environment is not the value we are looking for, as this is the JRE not the JDK.</p>
            <a href="http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html" target="_blank"><button type="button" class="btn btn-primary">Install JDK 8</button></a>
            <section id="jdkgotcha">
                <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> Don't forget to double check if JDK 8 installed correctly.</p>
                <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #2</span> Don't forget to double check if JDK 8 was added to the path.</p>
            </section>
          </section>
          <section id="nodejs">
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
          </section>
        </section>
        <section id="androidsdk">
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
            </section>
          </section>
        </section>
        <section id="cordova">
            <h3>Cordova</h3>
            <p>Now we get to put npm to use.  You will need to open your command line interpreter (Command Prompt on Windows or Terminal on Mac/Linux).</p>
        </section>
        <section id="cordovajquery">
            <h3>cordova-jquery</h3>
        </section>
        <section id="getstarted">
          <h2><span class="fa fa-edit"></span> Building the App</h2>
          <p>It is time to build the app!  First we will use cordova to create the app, then we will install cordova-jquery into the app, add the html5, css and javascript content, update the security policy so it will run nicely on android and finally we will test it all out!
          <section id="generateCordova">
            <h3>Create the app in Cordova</h3>
            <p>To create our app in Cordova we will run the command 
            <p class="text-center"><kbd>cordova -d create myApiApp com.example.myapiapp "My API App"</kbd></p>  It will take a few minutes for cordova to create all the directories and return but since we used the <code>-d</code> option we can watch the progress.</p>
            <p>Once the app returns you will want to type: <kbd>cd myApiApp</kbd> to enter into the root directory of your app.  You should see something like this: 
            <p class="text-center"><img src="images/cordovacreate.png" /></p></p>
            <a href="https://cordova.apache.org/docs/en/4.0.0/guide/cli/index.html#create-the-app" target="_blank"><button tyep="button" class="btn btn-primary">Read More about creating apps</button></a>
          </section>
          <section id="gen-cordova-jquery">
            <h3>Install cordova-jquery</h3>
            <p>From the root directory of our app we want to tell cordova that we want to use jquery with the app.  We are using JQuery mobile for the template for our app and will be using some JQuery as well to perform our ajax calls.  cordova-jquery will give us the capability to do both.</p>
            <p>To install cordova-jquery into our app we will want to be directly in the root of our app; just inside the myApiApp folder.  Type: <kbd>cordova-jquery</kbd>.  You will be given a list of options
            <section id="gen-cordovaj-gotcha">
                <p><span class="label label-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Gotcha #1</span> The one gotcha I found here was that cordova-jquery did not install the image directory for me.  I had to do this myself by going to the jquery-mobile site and downloading the images through the link at the bottom of the page into the myApiApp/js directory.  <a href="http://jquerymobile.com/download-builder/" target="_blank">Download images</a></p>
            </section>
            <a href="https://www.npmjs.com/package/cordova-jquery" target="_blank"><button type="button" class="btn btn-primary">Learn more about cordova-jquery</button></a>
          </section>
          <section id="gen-content">
            <h3>Generate Content</h3>
            <section id="indexhtml">
            <h4>index.html</h4>
            <pre><code class="html">&lt;html&gt;
            &lt;/html&gt;
            </code></pre>
            </section>
            <section id="indexcss">
            <h4>custom.css</h4>
<pre><code class="css">body {
    background: white;
}</code></pre>
            </section>
            <section id="indexjs">
            <h4>custom.js</h4>
            <pre><code class="javascript">onmessage = function(event) {
              importScripts(&#39;&lt;path&gt;/highlight.pack.js&#39;);
              var result = self.hljs.highlightAuto(event.data);
              postMessage(result.value);
            }</code></pre>
            </section>
          </section>
          <section id="gen-security">
            <h3>Update Security Policy</h3>
            <pre><code class="javascript">onmessage = function(event) {
  importScripts(&#39;&lt;path&gt;/highlight.pack.js&#39;);
  var result = self.hljs.highlightAuto(event.data);
  postMessage(result.value);
}</code></pre>
          </section>
          <a href="http://www.html5rocks.com/en/tutorials/security/content-security-policy/" target="_blank"><button type="button" class="btn btn-primary">Read more about Content-Security-Policy</button></a>
        </section><!--end of #graphic-design-->

        <section id="add-platforms">
          <h2><span class="fa fa-edit"></span> Add Platforms</h2>
          <p>Now that we have build the app in cordova we can't yet run it as a native app.  We need to apply the wrappers.  To let the application know which wrappers we want to apply we need to add the platform to the app in cordova.  We do this using the cordova command add platform.  Our first platform to add will be android.  In your Command Line Interpreter type: 
          <p class="text-center"><kbd>cordova platform add android</kbd></p>
          <p>Note:  You can add more than just android.  Available platforms vary depending on the operating system you are using cordova in.  If you are using Cordova in Windows you will have options such as android, windows, wp8 etc.  If you are using OS X you will see options like android, ios, osx, etc.  To get the list of available platforms for your operating system you can type: 
          <p class="text-center"><kbd>cordova platform --list</kbd> or <kbd>cordova platform ls</kbd></p>
          <a href="https://cordova.apache.org/docs/en/4.0.0/guide/cli/index.html#add-platforms" target="_blank"><button tyep="button" class="btn btn-primary">Read More on Platforms</button></a>
          </p>
        </section><!--end of #logistics-->

        <section id="paydirt">
          <h2><span class="fa fa-edit"></span> Try it out!</h2>
          <p>Now for the fun part!  We get to try it out!  Type:
          <p class="text-center"><kbd>cordova -d run android</kbd></p>
          Be prepared to wait a few minutes while the emulator initializes.  Do not panic if you see the black screen for a few minutes - it can sometimes take up to 10 minutes to load the emulator fully.  If you are using your own phone to run the project on and you want to watch what is going on while it is running you can open Android Studio and create a dummy project.
          </p>
          <button type="button" class="btn btn-primary">Learn More</button>
        </section><!--end of #social-->
      </div>   
    </div><!--end of .row-->
  </div><!--end of .container-->
  
  <section class="application">
    <div class="container">
      <h2>Come and Join Us</h2>
      <div class="row">
        <div class="col-sm-6">
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
          Nullam quis ante.
          </p>
          <img class="img-responsive  " src="http://placehold.it/500x250/5fb3ce/000000">
        </div>
        <div class="col-sm-6">
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
          Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
          Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
          Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
          Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
          Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
          Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <button type="button" class="btn btn-primary">Apply Now</button>
        </div>
      </div><!--end of .row-->
    </div><!--end of .container-->
  </section>
  
  <footer>
    <p class="text-center">A demo by George Martsoukos. <a href="http://www.sitepoint.com/understanding-bootstraps-affix-scrollspy-plugins">See article.</a></p>
  </footer> 


    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js'></script>

    <script>
      $('#nav').affix({
            offset: {
                top: $('#nav').offset().top,
                bottom: $('footer').outerHeight(true) + $('.application').outerHeight(true) + 40
            }
        });
      //# sourceURL=pen.js
    </script>
  	</body>
</html>
