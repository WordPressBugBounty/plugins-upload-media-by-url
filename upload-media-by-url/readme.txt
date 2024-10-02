=== Upload Media By URL ===
Contributors: NoteToServices
Link: https://notetoservices.com
Author website: https://notetoservices.com
Tags: upload, url, multiple, files, media, library, attachment
Requires at least: 6.3
Tested up to: 6.3
Stable tag: 1.0.10
Requires PHP: 7.4
Plugin URI: http://wordpress.org/plugins/upload-media-by-url/
Donate link: https://paypal.me/andbenice

== Description ==
Upload your files to the WordPress Media Library by URL.

== Installation ==

1. Install and activate the Upload Media By URL plugin
2. Navigate to WordPress Media Library
3. Click on the Upload Media By URL button
4. Enter in any amount of URLs separated by a new line and they will be inserted into your media library

== Frequently Asked Questions ==
Q: Is this plugin free?
A: Yes, there is no charge to use this plugin.

Q: Does UMBU change the way files are uploaded? 
A: The plugin does not alter images in any way and only uses the natural functions built into WordPress to download files and insert them into the media gallery.

Q: How many URLs can I add? 
A: You could probably add as many URLs as you wish, but it is best to keep the limits of about 20 URLs at a time.

Q: Why did you create this plugin?
A: To save time. While you can go to a post and add your media by a URL, you can only do a single URL and it will be inserted "as is" into your post meaning it will use whatever URL you copied. 

With this plugin, you can go directly to the media library and add as many URLs as you want to add them into the media library.

Q: How do I use this plugin?
A: The location of the button is on the Media Library screen.

Q: Why are some images not added into the media gallery?
A: UMBU uses a WordPress native download function and may not allow or recognize the file is an image file.

== Screenshots ==
1. Upload Media By URL functionality
2. Upload Media By URL button on Media Library screen
3. Upload Media By URL button below Upload New Media

== Changelog ==
= 1.0.10 = 
$post_type and read property error fix for PHP 8.2
 
= 1.0.9 =
Patched Throw Type Error (admin_footer_text) found by Roy Orbitson
Implemented additional CSS updates
Re-added nonce check

= 1.0.8 = 
Fixed issue with CSRF vulnerability found by Dmitrii Ignatiev

= 1.0.7 = 
Fixed issue with $this in umbu_mediaButton function

= 1.0.6 =
Fixed issue with $this in umbu_mediaButton function
Fixed issue with $pagenow to only load on the Media library page
Fixed issue with WooCommerce plugin conflict
Fixed issue with URL modal not showing in mobile

= 1.0.5 = 
Fixed issue with media upload always attaching to the first post. Will now appear unattached.

= 1.0.4 = 
Fixed issue where CSS file was showing on non-admin pages

= 1.0.3 = 
Updated for WordPress 5.6.0
Fixed an error regarding $this within umbumedia class.
Updated Known Issues with plugin conflicts.
Updated compatibility notes.

= 1.0.2 = 
Tested up to WordPress 5.5.1.

= 1.0.1 =
Bug fix: compatibility issue with PHP 7.4.

= 1.0.0 =
Basic functionality.

== Known Issues ==

This plugin may conflict with anything that alters the WordPress Media Library page.
If the URL has a signature verification or lacks a file extension, WordPress does not seem to import these types of files, 
common when pulling images off private CDNs.
If the URL is lacking an extension for the filename, WordPress may not be able to download it.

Plugin conflicts:
-FileBird (tested and confirmed)
-WooCommerce Add New Product page (patched)

== Technical Details ==
Once you add in your URL(s), the plugin will download and add them to the media library.
Compatible file extensions:
jpg, gif, png, pdf, txt, mp3, mp4, ogg, wav, wmv, mov, webm, avi, doc, docx, ppt, pptx, xls, xlsx, html, csv, zip

== Additional Info ==

This plugin does not alter any aspect of the image or your website and uses the natural WordPress functions to download and insert media into your library.
If a URL does not exist or there is an issue with a URL, you will not receive any error, and nothing will happen.

== Copyright Info ==

Copyright (C) 2015-2020 [NoteToServices](https://www.notetoservices.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
