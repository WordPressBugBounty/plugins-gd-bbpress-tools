=== GD bbPress Tools ===
Contributors: GDragoN
Donate link: https://www.dev4press.com/plugins/gd-bbpress-tools/
Version: 4.0
Tags: dev4press, bbpress, signature, quote, bbcodes
Requires at least: 6.2
Requires PHP: 8.0
Tested up to: 7.0
Stable tag: trunk
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Adds different expansions and tools to the bbPress plugin powered forums: BBCode support, signatures, various tweaks, custom views, quote...

== Description ==
Adds various expansions and tools to the bbPress plugin implemented forums. Currently, included features:

* Quote Reply or Topic
* Change allowed HTML tags and attributes
* User signature with BBCode and HTML support
* Signature field in BuddyPress profile edit
* Toolbar menu integration
* BBCode shortcodes with 30 BBCodes
* Limit bbPress admin side access
* Tweak: Disable bbPress breadcrumbs
* Tweak: Topic tags field in reply form for author only
* Tweak: Show lead topic
* Tweak: Show search form for all forums and topics
* Tweak: Disable 'private' title prefix
* Topics View: Topics with most replies
* Topics View: Latest Topics
* Topics View: Topics by freshness

= bbPress Plugin Versions =
GD bbPress Tools 3.5.3 supports bbPress 2.6.2 or newer. Older bbPress versions are no longer supported!

= More free dev4Press.com plugins for bbPress =
* [GD Forum Manager](https://wordpress.org/plugins/gd-forum-manager-for-bbpress/) - quick and bulk forums and topics edit
* [GD Members Directory](https://wordpress.org/plugins/gd-members-directory-for-bbpress/) - show filterable list of all forum members
* [GD Power Search](https://wordpress.org/plugins/gd-power-search-for-bbpress/) - add advanced search to the bbPress topics
* [GD bbPress Attachments](https://wordpress.org/plugins/gd-bbpress-attachments/) - attachments for topics and replies
* [GD Topic Polls](https://wordpress.org/plugins/gd-topic-polls/) - add polls to the bbPress topics

= Upgrade to GD bbPress Toolbox Pro =
The Pro version contains many more great features:

* Enhanced attachments features
* Limit file types attachments upload
* Add custom file types for upload
* BBCodes editor toolbar
* Report topics and replies
* Say thanks to forum members
* Query Performance Booster
* Various SEO features
* Various privacy features
* Enable TinyMCE editor
* Private topics and replies
* Auto closing of inactive topics
* Notification email control
* Show user stats in topics and replies
* Track new and unread topics
* Mute Forums and Users
* Great new responsive admin UI
* Setup Wizard
* Forum based settings overrides
* Improved BuddyPress support
* 40 BBCodes (including Hide and Spoiler)
* 19 more Topics Views
* 9 additional widgets
* Many great tweaks
* And much, much more

With more features on the roadmap exclusively for Pro version.

* More information about [GD bbPress Toolbox Pro](https://www.dev4press.com/plugins/gd-bbpress-toolbox/)
* More Premium plugins for bbPress [bbPress Plugins Club](https://www.dev4press.com/bbpress-club/)

== Installation ==
= General Requirements =
* PHP: 8.0 or newer

= WordPress Requirements =
* WordPress: 6.2 or newer

= bbPress Requirements =
* bbPress Plugin: 2.6.2 or newer

= Basic Installation =
* Plugin folder in the WordPress plugins folder must be `gd-bbpress-tools`
* Upload folder `gd-bbpress-tools` to the `/wp-content/plugins/` directory
* Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==
= Where can I configure the plugin? =
Open the Forums menu, and you will see Tools item there. This will open a panel with global plugin settings.

= Will this plugin work with old, standalone bbPress (versions 1.x) installation? =
No. This plugin requires the plugin versions of bbPress 2.6.2 or higher.

= Click on Quote button doesn't add quoted content? =
This happens if the plugin's JavaScript is not loaded. Make sure that both CSS and JavaScript options are enabled. If that doesn't help, make sure to enable 'Always Include' option too.

= Sometimes quoted content when saved appears broken? =
The quote itself doesn't strip HTML, but bbPress does. If the quoted section contains HTML tags or tag attributes that bbPress doesn't allow, it will strip them when the reply is saved. To solve that, you need to use the option to control allowed HTML tags in topics and replies.

= Some features not working with BuddyPress group forums? =
This happens if the plugin's JavaScript is not loaded. Make sure that both CSS and JavaScript options are enabled and 'Always Include' option is also enabled.

= Does this plugin work with bbPress and BuddyPress groups? =
GD bbPress Tools 3.1 is tested with BuddyPress 6.0 using bbPress for Groups forums. Make sure you enable JavaScript and CSS Settings Always Include option in the plugin settings.

= Some BuddyPress features break when I use BuddyPress Nuovo templates? =
The problem is caused by the Italic BBCode due to the conflict with the Underscore templates system BuddyPress uses. You can disable Italic BBCode, or you can limit BBCodes to the bbPress content only (highly recommended).

= When the quote is used on the formatted content, formatting will be gone inside displayed quote? =
This happens because quoting can only take rendered HTML as is, and when saved, bbPress will remove some HTML elements based on the user role. [GD bbPress Toolbox Pro](https://www.dev4press.com/plugins/gd-bbpress-toolbox/) plugin includes additional features that expand the allowed HTML elements for all roles, and that solves this quote problem.

== Upgrade Notice ==
= 4.0 =
Various security-related updates, improvements and fixes.

= 3.5 =
Few updates and improvements.

== Changelog ==
= 4.0 (2026.04.21) =
* New: system requirements: PHP 8.0 or newer
* New: system requirements: WordPress 6.2 or newer
* Edit: various security-related updates and improvements
* Edit: improvements to the main JavaScript code
* Fix: XSS vulnerability related to BBCodes processing
* Fix: the issue with Quote object initialization

= 3.5.3 (2024.08.19) =
* Edit: updated links to the Dev4Press website
* Edit: various PHP code changes and improvements
* Fix: fatal error on one of the admin panel tabs

= 3.5.2 (2024.05.15) =
* Edit: few more tweaks to the main JavaScript code
* Fix: problems with the Quote not working with TinyMCE editor

= 3.5.1 (2024.05.14) =
* Edit: few more tweaks to the main JavaScript code
* Edit: various small updates to readme file
* Fix: missing semicolon in the JavaScript code

= 3.5 (2024.04.28) =
* New: directive `Requires Plugin` added into main plugin file
* New: System requirements: PHP 7.4 or newer
* New: System requirements: WordPress 5.8 or newer
* New: plugin fully tested with WordPress up to 6.5
* New: plugin fully tested with PHP 8.3
* Updated: code style and translation formatting
* Updated: main plugin JavaScript library

Full changelog: [GD bbPress Tools Changelog](https://www.dev4press.com/plugins/gd-bbpress-tools/changelog/)

== Screenshots ==
1. Main settings panel
2. Tweaks panel
3. BBCodes panel
4. Topics Views panel
5. Toolbar bbPress forums menu
6. Setting up signature
