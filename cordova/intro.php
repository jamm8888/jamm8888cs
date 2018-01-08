<?php
?><div>
<!-- Creating a portable android phone app with cordova -->
<h1>HOWTO: Creating a Portable Phone App with Cordova, jquery-mobile and Ajax</h1>

<p>In this How-to we will be focusing on building a hybrid application which capitalizes on the portability of a web app but can be installed as a native phone application.  There is an abundance of information with respect to building phone apps using their native platforms and how to build web apps that are portable and while we found a lot of tutorials for building cordova/cordova-jquery/ajax applications we did not find an abundance of tutorials that worked right away without a great deal of further digging on the android platform.</p>
<p>The goal of this tutorial is to fill that hole.  To have a complete fully functional application that works when you are finished.</p>
<h2>Assumed Knowledge</h2>
<p>
	This tutorial assumes:
	<ul>
		<li>you have either:
			<ul>
				<li>a PC running 64 bit Windows 8.1 or 10 professional version or higher</li>
				<li>a MAC running OS X lion or better</li>
			</ul>
		</li>
		<li>you have a good working knowledge in:
			<ul>
				<li>HTML and css</li>
				<li>Javascript</li>
				<li>Command Line Interpreter for your Operating System of Choice</li>
				<li>Android Studio</li>
			</ul>
		</li>
	</ul>
</p>
<h2>System Requirements for this Tutorial</h2>

<p>Minimum Requirements:

<ul>
	<li>Windows 7/8/10 ro Mac OS X 10.8.5 or higher (Android Studio)</li>
	<li>2GB Minimum RAM (4GB Recommended) (Android Studio)</li>
	<li>1280 x 800 minimum Screen Resolution (Android Studio)</li>
	<li>Java Development Kit (JDK 8) (Android Studio)</li>
	<li>If you are not using your own phone to run the programs and plan to use the Android Studio Emulator
	<ul>
		<li>64-bit Operating System</li>
		<li>Intel Processor with Support for VT-x, EM64T and Execute Disable (XD Bit functionality)</li>
	</ul>
	</li>
</ul>
<a href="https://developer.android.com/studio/index.html">See System Requirements for Android Studio</a>
<a href="https://cordova.apache.org/docs/en/latest/guide/support/index.html">See Supported Platforms for Cordova</a>
<p>Software required for this tutorial:
	<ul>
		<li>Java JDK <a href="http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html" target="_blank">Install</a>
			<ul>
				<li><a href="https://docs.oracle.com/javase/8/docs/technotes/guides/install/windows_system_requirements.html" target="_blank">Windows Requirements</a></li>
				<li><a href="https://docs.oracle.com/javase/8/docs/technotes/guides/install/mac_jdk.html" target="_blank">OS X Requirements</a></li>
				<li><a href="https://docs.oracle.com/javase/8/docs/technotes/guides/install/linux_jdk.html" target="_blank">Linux Requirements</a></li>
			</ul>
		</li>
		<li><a href="https://nodejs.org/en/" target="_blank">Nodejs (for npm)</a></li>
		<li><a href="https://cordova.apache.org/" target="_blank">Cordova</a></li>
		<li>cordova-jquery</li>
		<li><a href="https://developer.android.com/studio/index.html" target="_blank">Android Studio</a></li>
	</ul>
</p>
<p>If you plan to run the code on your own android you will need to make sure you have enabled Developer Options.  If you are not sure how to enable Developer Options on your device please read "Enabling On-device Developer Options" <a href="https://developer.android.com/studio/run/device.html">here</a>.</p>

<!-- What is Cordova?  -->
<h3><a name="wcordova">What is Cordova and why use it?</a></h3>
<p>
	Cordova is a well documented utility that you can read more about <a href="https://cordova.apache.org/">here</a>. so we won't go into too much detail but unlike Android Studio, Cordova allows you to create what is known as a hybrid application.  A hybrid applicaiton makes use of a native code wrapper around your application so it can become portable across multiple platforms.  If you are working on a PC, you can create apps that can be natively installed on Android, Windows OS, and Windows Phone (to name a few) or if you are working on a Mac you can create apps that can be natively installed on Android, iOS and OSX (to name a few) if installed on a Mac.
</p>

<!-- what is cordova-query -->
<h3>What is cordova-jquery</h3>
<p>
	cordova-jquery is a utility that can be used with Cordova to facilitate html5 and jquery-mobile in your android app.  If you want to read more about jquery-mobile <a href="https://jquerymobile.com/">Click here</a>.
</p>

<!-- Installation -->
<h3>Installation</h3>

<!-- Java JDK -->
<h5>1. Java JDK</h5>
<p>
	Most of the tools and libraries that will be used are based on the Java Development Kit so our first and probably the most important step is to ensure we have Java JDK installed and are using a current version.
</p>
<p class="text-center">
	<a href="http://www.oracle.com/technetwork/java/javase/downloads/index.html">Get the latest Java JDK</a>
</p>

<!-- Node js and NPM -->
<h5>2. Nodejs and NPM</h5>
<p>
	NPM allows developers to share code.  A number of the libraries we want to install are shared via NPM so this will be our second most important piece of software to install.  It is second as it relies on the Java JDK.
</p>
<p class="text-center">
	<a href="https://docs.npmjs.com/getting-started/installing-node">Obtain and Install Nodejs and NPM</a>
</p>

<!-- Install Cordova -->
<h5>3. Cordova</h5>
<p>Cordova is installed using the command line using npm.
<p><code>npm install -g cordova</code></p>
<p>
If you come across issues you can find futher installation information here: <a href="https://cordova.apache.org/docs/en/latest/guide/cli/#installing-the-cordova-cli">Installing Cordova</a>.  
</p>

<!-- Install cordova-jquery -->
<h5>3. cordova-jquery</h5>
<p>cordova-jquery is added to cordova by pulling the code via npm.</p>
<p class="text-center"><code>npm install -g cordova-jquery</code></p>
<p>NOTE:  Each project that we want to use cordova-jquery will need to be identified but we will cover that later in the tutorial</p>
</p>

<!-- install android studio -->
<h5>4. Android Studio (or alternative command adb command line installation link)</h5>
<p>In our example we want to be able to utilize the emulators that come packaged with android studio and we will also make use of Android Monitor, specifically Android Debug Bridge (adb) and logcat.  This is not the only way to view adb and logcat but since we are making use of the emulators it also makes sense to use the logging capabilities.</p>
<p>If you are using your own device for running your project, do not need to use the emulator capability of android studio and would prefer to use adb and logcat from the command line interface you can get further information for installing it <a href="http://esausilva.com/2010/10/02/how-to-set-up-adb-android-debug-bridge-in-mac-osx/">here</a>.  This tutorial will assume you are using Android Studio's android Monitor and does not include information for the command line version.</p>

<!-- setting up a project in Cordova -->
<h3>Setting up a Project in Cordova</h3>

<p>Now that we have the software setup we can create a project in Cordova.  Cordova is a Commnad Line Tool and we will be typing our commands.</p>
<p>
<code>cordova create myFirstJQueryApi com.example.myfirstjqueryapi "My First API"</code>
</p>
<p><code>cd myFirstJQueryApi</code></p>
<p><code>cordova-jquery</code></p>
<p>Would you like to add jQuery mobile to the current Apache Cordova Project? <code>Y</code></p>
<p>What would you like to do now that jQuery is enabled? <code>> applyTemplate</code></p>
<p>Which jQuery mobile template would you like to apply to your Apache Cordova project? <code>>multipage</code></p>
<p>Would you like to keep the current code?  ...it could get ugly! <code>Y</code></p>
<p> </p>
<p>Now we need to add a wrapper for the project so we can build and run it on android.  We do this by choosing a platform.  For this tutorial we will use android as this works nicely on both Mac and PC.  To set the platform we make sure we are in the root of the myFirstJQueryApi directory and type:</p>
<code>cordova platforma add android</code>.</p>
<p>It may take a minute or two to setup the platform and you should see something like this image:</p>
<p class="text-center"><img src="images/cordovaplatformadd.png" /></p>
<h5>Verify Setup</h5>
<p>It is always good to double check along the way if things have been setup correctly.  This is one of those good moments since everything going forward will be very painful to troubleshoot if the setup did not go well.  Let's run the program on either the emulator or your actual phone and see how it works.  You can choose a target device but for now we will just use the default setup.  To read more about choosing a target device please read <a href="">here</a>.<p>
<p>To run the emulator type: <code>cordova emulate android</code></p>

<!-- Security Policy - the big hangup -->
<p><a href="http://www.html5rocks.com/en/tutorials/security/content-security-policy/#policy-applies-to-a-wide-variety-of-resources">Introduction to Security Policies</a></p>
<p>
Now you have everything setup and it looks great right?  Everything should run fabulous and work fine!.... Well it didn't did it?  So what went wrong?  When you program a phone in android using Cordova with HTML5 and javascript there is a security feature that disables the ability to allow other sites to be ported into your app.  Why is this needed?  One of the ways hackers can attack your site is called Cross site Scripting or XSS.  How does this affect our app?  We are trying to get data from outside our 'site' or app and get data from another site - our api url - and import that data into our app.  So how do we fix it?</p>
<p>We need to adjust the security policies for HTML5.</p>
<p>The second is in the meta Content-Security-Policy tag in index.html.</p>
<code><meta http-equiv="Content-Security-Policy" content="default-src &apos;self&apos; &apos;unsafe-inline&apos; data: gap: https://ssl.gstatic.com &apos;unsafe-eval&apos;; style-src &apos;self&apos; &apos;unsafe-inline&apos;; media-src *; script-src &apos;self&apos; https://api-assignment3b.appspot.com/cusotmers &apos;unsafe-inline&apos; &apos;unsafe-eval&apos;; connect-src *;"></code></p>
</div>
