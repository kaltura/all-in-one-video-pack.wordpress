=== Kaltura All-in-One Video Plugin for WordPress ===
Contributors: Kaltura
Tags: admin, advertising, audio, camera, collaboration, Encoding, gallery, images, interactive, kaltura, media, media library, photo, picture, player, playlist, plugin, podcast, post, posts, record, rich-media, richmedia cms, transcoding, video, video advertising, video blog, video gallery, video-ads, vlog, webcam, widget, mobile
Requires at least: 2.5.2
Tested up to: 4.6.1
Stable tag: 2.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add full video capabilities to your blog.

== Description ==

This is not just another video embed tool - it includes every functionality you might need for video and rich-media, including the ability to create videos and publish them directly to your post, centrally manage and track your video content. 
You will instantly enhance user engagement on your WordPress site by enriching it with video. Leverage the full power of our Online Video Platform: superb playback, video management, social sharing, monetization, mobile and tablet delivery and more. Kaltura will handle all the heavy lifting in the back-end, including transcoding, storing, and streaming of your video content.

It’s simple to install, use and customize -  [download the Kaltura All-in-One Video Plugin](http://downloads.wordpress.org/plugin/all-in-one-video-pack.2.7.zip) and choose one of two options to host and manage your Kaltura back-end:

**Kaltura Hosted Solution (Kaltura SaaS) - Free Trial and Affordable Packages**
-------------
When you sign up with Kaltura.com you get 10GB free hosting and streaming using Kaltura’s world-class CDNs and hosting facilities. Get started with your free trial today! For more information on our packages beyond 10GB, please contact us and we’ll get right back to you. 

**Self-Hosted Solution**
-------------
You can also connect your Kaltura Video plugin to Kaltura’s Community Edition- the self-hosted, community supported version of Kaltura’s Open Source Online Video Platform - all behind your own firewall and on your own server for free.

**Features and Benefits**
-------------
* Easy video upload - import rich-media directly to your blog post
* Superb viewing experience anywhere, anytime, on any device: automatic transcoding of uploaded videos, adaptive streaming, and delivery via leading CDNs.
* Central media management - through the Kaltura Management Console. Includes video analytics and reports
* Customize and brand your video players: both looks and functionality.
* Support for Advertising & Monetization
* Social Sharing - easily share across social networks, blogs, and sites 
* Support for Wordpress multisite deployments
* Enterprise grade video technology: end-to-end security, reliability, scalability and flexibility.

**What’s New in Version 2.7**
-------------
* Cosmetic fixes to player embed on latest WordPress versions
* HTML (not Flash) upload
* Option for responsive player embed
* Improvements to search and filter in Browse Existing Media
* Ability to filter and choose from content the user is co-editor or co-publisher of
* Removed the additional optional sidebar
* Ability for administrators to choose whether editors see all publisher media or only their own media in Browse Existing Media
* Ability for administrators to define root category (in Kaltura) that all media is uploaded to and that content can be repurposed from
* Ability for administrators to select which players are available for content editors to choose from
* Removed video comments


See release notes [here](http://knowledge.kaltura.com/node/905).

Showcase your blog, see examples and pictures of the plugin and get support in our [forum](https://forum.kaltura.org/).

== Installation ==

If you are installing this plugin for the first time:

1. Download and extract the plugin zip file to your local machine
2. Paste the 'all-in-one-video-pack' directory under the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in the WordPress admin application
4. Go to Settings > All in One Video Pack to setup the plugin

If you are upgrading your current version of the plugin, or if you’re upgrading from the Interactive Video plugin: 

1. Deactivate the plugin through the 'Plugins' menu in the WordPress admin application
2. Download the latest version
3. Follow the installation steps above


== Frequently Asked Questions ==

= I installed the plugin, but installation failed after pressing Complete Installation, showing me a text in a red rectangle? =

Cause: Either curl / curl functions is disabled on your server or your hosting blocks API calls to the Kaltura servers.

Solution 1: Enable curl and its functions on the server (or have the hosting company enable it for you).

Solution 2: Remove any blocking of external calls from the server.

= I can’t activate the plugin, it presents an error message after clicking Activate on the plugin list =
It might be caused due to an old version of PHP.

The Kaltura wp plugin is written for PHP4 and PHP5 with the use of classes and static members, these are not supported on earlier versions of PHP.

Upgrade to PHP5 / later. If upgrading doesn’t solve this issue or you already have PHP5 on your server, post the error information on the forum and we’ll help you. (http://www.kaltura.org/forums/applications-and-cms-extensions/wordpress-kaltura-plugin-all-one-video-pack-forums).

Support for PHP4 was added on version 1.0


== Screenshots ==

1. Blog main page with video posts
2. Add Video Screen
3. Entries Library
4. The plugin settings page

== Join the Kaltura Community and Contribute to Open Source Video! ==

Creative potential, innovation, and competition all correlate directly with the balance of freedoms and constraints we face in sharing, manipulating, finding, and watching video. For instance, to create remixes or mash-ups, video artists need access to the original materials in order to reformulate their new work. In an ideal world, everyday users will be able to easily copy and paste portions of video, as they already can with text. Of course the benefits of a more open system will go far beyond remixing, cutting, and pasting - when open video standards and formats are widely embraced, it will be possible to index, search, and access the medium much as we do text. This will be the real revolution for video. 

Kaltura is a founding member of the Open Video Alliance, a group of organizations, developers, creators, and academics all striving to foster the open-source online video revolution.  We invite the entire community to join us in building the first open-source platform for interactive and collaborative video. We look forward to your input, feedback, time, and support.

Join the community and help us Open Source Video - http://www.kaltura.org/


== Changelog ==

= Version 2.7 =
* Cosmetic fixes to player embed on latest WordPress versions
* HTML (not Flash) upload
* Option for responsive player embed
* Improvements to search and filter in Browse Existing Media
* Ability to filter and choose from content the user is co-editor or co-publisher of
* Removed the additional optional sidebar
* Ability for administrators to choose whether editors see all publisher media or only their own media in Browse Existing Media
* Ability for administrators to define root category (in Kaltura) that all media is uploaded to and that content can be repurposed from
* Ability for administrators to select which players are available for content editors to choose from
* Removed video comments

= Version 2.6 =
* WordPress VIP version inlcuding sanitization, escaping and many other code improvements.

= Version 2.5.1 =
* Fixed PHP notice

= Version 2.5 =
* Full support for WordPress 3.5.2
* MultiUser Support - install the plugin once, use video in multiple WordPress site instances (separate instances with centralized management and administration of all content)
* Mobile playback support – reach anyone on any device (including iOS, Android), web, and set-top boxes.

= Version 2.4.4 =
* Changed registration form. Note that this is only relevant for new users of the plugin.

= Version 2.4.3 =
* Fixed compatibility with WordPress 3.1

= Version 2.4.2 =
* Removed link back to Kaltura for statistics gathering.

= Version 2.4 =
* MultiUser Support
* New default players
* Option to use custom KMC players within WordPress
* Option to automatically generate video posts using categories from within the user’s KMC
* Improved playback performance
* Removed 200MB per upload restriction 

= Version 2.3.1 =
* Fixed PHP4 client throwing warnings when allow_call_time_pass_reference is off

= Version 2.3 =
* Added widescreen support
* Changed video players designs
* Bug fixing and maintenance

= Version 2.2 =
* Added option to update video thumbnail via the Library/Browse view
* Updated registration form
* Several bug fixes
* Enhanced default video quality to 800kbs

= Version 2.1 =
* Added sidebar widget displaying thumbnails of recent videos and video comments
* Fixed compatibility with WordPress 2.7 beta
* Several bug fixes

= Version 2.0 =
* Initial release of All in One Video Pack, the newer version of Kaltura’s Interactive Video plugin.