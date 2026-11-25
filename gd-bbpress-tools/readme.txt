=== forumTools for bbPress ===
Contributors: GDragoN
Donate link: https://www.dev4press.com/plugins/gd-bbpress-tools/
Stable tag: 4.1
Tags: dev4press, bbpress, signature, quote, bbcodes
Requires at least: 6.4
Requires PHP: 8.0
Tested up to: 7.2
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Add quoting, signatures, BBCode formatting, and extra topic views to your bbPress forums.

== Description ==
forumTools for bbPress adds features for forum members and administrators.

* Quote topics and replies directly from a discussion.
* Add forum signatures with plain text, BBCode, HTML, or a combination of BBCode and HTML. Control access and signature length in the settings.
* Edit signatures from WordPress or bbPress profiles, or from a selected BuddyPress profile field group.
* Format topics and replies with BBCode, and choose which HTML tags and attributes bbPress accepts in posts.
* Add forum links to the WordPress toolbar and restrict access to the bbPress admin area by role.
* Adjust breadcrumbs, topic tags in reply forms, lead topics, search forms, and the private title prefix.
* Add topic views for the most replies, latest topics, and recent activity.

= More free Dev4Press plugins for bbPress =
* [forumManager for bbPress](https://wordpress.org/plugins/gd-forum-manager-for-bbpress/) - quick and bulk forums and topics edit
* [membersDirectory for bbPress](https://wordpress.org/plugins/gd-members-directory-for-bbpress/) - show filterable list of all forum members
* [powerSearch for bbPress](https://wordpress.org/plugins/gd-power-search-for-bbpress/) - add advanced search to the bbPress topics
* [forumAttachments for bbPress](https://wordpress.org/plugins/gd-bbpress-attachments/) - attachments for topics and replies
* [topicPolls for bbPress](https://wordpress.org/plugins/gd-topic-polls/) - add polls to the bbPress topics

= Upgrade to forumToolbox Pro for bbPress =

* **Attachments** with controls to restrict allowed upload types and define custom file types.
* **Editing** with TinyMCE, a BBCode toolbar, and 40+ BBCodes including Hide and Spoiler.
* **Moderation and privacy** with topic and reply reporting, private topics and replies, automatic closing of inactive topics, and additional privacy controls.
* **Member features** with thanks, user stats in topics and replies, new and unread topic tracking, forum and user muting, and notification email controls.
* **Forum tools** with 23 topic views (20 more than the free plugin), nine additional widgets, per-forum settings overrides, and expanded BuddyPress support.
* **Administration** with a Setup Wizard, a responsive admin interface, the query performance Booster, SEO tools, and additional forum tweaks.

Learn more about [forumToolbox Pro for bbPress](https://www.dev4press.com/plugins/gd-bbpress-toolbox/) and the [bbPress Plugins Club](https://www.dev4press.com/bbpress-club/).

== Installation ==
= Requirements =

* WordPress 6.4 or newer
* PHP 8.0 or newer
* bbPress 2.6.2 or newer, installed as a WordPress plugin

BuddyPress is optional. Enable its Extended Profiles component to edit forum signatures in BuddyPress member profiles.

= Setup =

1. Install and activate bbPress.
2. In **Plugins → Add New Plugin**, search for **forumTools for bbPress**, then install and activate it.
3. Open **Forums → Tools** to configure the plugin.

For a manual installation, upload the `gd-bbpress-tools` directory to `/wp-content/plugins/` and activate the plugin from **Plugins**.

== Frequently Asked Questions ==
= Where can I configure the plugin? =
In the WordPress dashboard, open **Forums → Tools**. The **Settings** tab includes signatures, quoting, and allowed HTML. Use the **Tweaks**, **BBCodes**, and **Views** tabs for their respective settings.

= Where do members edit their forum signatures? =
Members with permission to use signatures can edit the **Forum Signature** field in their WordPress profile or on their bbPress profile edit screen. In **Forums → Tools → Settings**, the **User Signature** and **User Signature: HTML / BBCodes Enhanced** sections control who can edit signatures, the maximum length, and which formats members can use.

= Why does my signature look different after upgrading to 4.1? =
Version 4.1 filters both new and existing signatures when displaying them. Common formatting, links, images, smileys, and standard BBCode still work when enabled. The default allowlist strips custom CSS classes, HTML IDs, and iframe embeds. Use a regular link to share a video.

= Where is the signature field in BuddyPress? =
With **Extended Profiles** active, the field appears when a member edits the profile group selected under **User Signature: BuddyPress Profile Field Group** in **Forums → Tools → Settings**. Check that the signature feature is active and that the member's role can use it.

= Why does the Quote button do nothing? =
The plugin may be missing its JavaScript on that page. This can happen when forums are embedded with shortcodes or displayed in BuddyPress groups. In **Forums → Tools → Settings**, enable **Always Include** under **JavaScript and CSS Settings** to load the plugin's assets on all public pages.

= Why does a quote lose formatting after I save my reply? =
bbPress filters the saved reply according to the HTML the reply author can use. Review **Allowed HTML** under **Forums → Tools → Settings** if you need to change the tags or attributes allowed in replies. Signatures use a separate HTML allowlist.

= What if the Italic BBCode interferes with BuddyPress Nouveau? =
On the **BBCodes** tab, limit BBCodes to bbPress content or disable the **Italic** BBCode. The conflict can occur when BuddyPress's Underscore templates are processed as BBCode.

== Upgrade Notice ==
= 4.1 =
Security update for forum signatures. Existing signatures are filtered when displayed. Common formatting remains supported. Custom classes, IDs, and embedded players are removed.

= 4.0 =
Various security-related updates, improvements and fixes.

= 3.5 =
Few updates and improvements.

== Changelog ==
= 4.1 (2026.11.25) =
* New: renamed the plugin to forumTools for bbPress.
* New: filter for the signature HTML allowlist
* Edit: use the HTML `<s>` element for strikethrough BBCode
* Edit: document plugin actions and filters in the source code
* Fix: stored cross-site scripting vulnerability in forum signatures
* Fix: verify signature saves with a nonce
* Fix: signature saving preserve literal backslashes

= 4.0.1 (2026.05.24) =
* Fix: using the wrong constant to load the template

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

Full changelog: [forumTools for bbPress Changelog](https://www.dev4press.com/plugins/gd-bbpress-tools/changelog/)

== Screenshots ==
1. Main settings panel
2. Tweaks panel
3. BBCodes panel
4. Topics Views panel
5. Toolbar bbPress forums menu
6. Setting up signature
