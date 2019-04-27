=== WPSSO Ratings and Reviews / Replies with Schema Aggregate Ratings (Including WooCommerce) ===
Plugin Name: WPSSO Ratings and Reviews
Plugin Slug: wpsso-ratings-and-reviews
Text Domain: wpsso-ratings-and-reviews
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-ratings-and-reviews/assets/
Tags: star rating, aggregate rating, review, google, schema, comment, knowledge graph, product rating, product review, meta tags, schema review, schema markup, woocommerce
Contributors: jsmoriss
Requires At Least: 3.8
Tested Up To: 5.2
WC Tested Up To: 3.6
Stable Tag: 1.5.5

WPSSO Core add-on provides ratings and reviews for WordPress comments with Aggregate Rating meta tags, and optional Schema Review markup.

== Description ==

<p style="margin:0;"><img class="readme-icon" src="https://surniaulula.github.io/wpsso-ratings-and-reviews/assets/icon-256x256.png"></p>

**Extends the WordPress comment system with ratings and reviews:**

* Star ratings can be enabled/disabled by post type or individual post.

* A rating value can be required (or not) before reviews are accepted.

* The review form is correctly labeled as a "Review".

* The review reply form is correctly labeled as a "Reply".

* The color of star ratings can be customized from the settings page.

**Does not conflict with WooCommerce ratings and reviews:**

The [WooCommerce](https://wordpress.org/plugins/woocommerce/) plugin settings are checked, and if WooCommerce product reviews are enabled (or the [Yotpo Reviews for Woocommerce](https://wordpress.org/plugins/yotpo-social-reviews-for-woocommerce/) plugin is active), the original WooCommerce product review feature is left as-is.

**Provides [Schema Aggregate Rating](https://schema.org/aggregateRating) meta tags and JSON-LD markup:**

Google reads aggregate rating meta tags (or the optional Schema JSON-LD markup) to add star ratings to search results ([WPSSO JSON Pro add-on](https://wpsso.com/extend/plugins/wpsso-schema-json-ld/) required for JSON-LD markup). WooCommerce product ratings and reviews are also included in the aggregate rating meta tags and JSON-LD markup.

**Includes complete [Schema Review](https://schema.org/Review) as optional JSON-LD markup:**

Including information about the review (author name, creation time, excerpt, rating), along with the threaded replies / comments for each review ([WPSSO JSON Pro add-on](https://wpsso.com/extend/plugins/wpsso-schema-json-ld/) required for JSON-LD markup).

<h3>No templates to modify or update!</h3>

Simply activate / deactivate the plugin to enable / disable the addition of ratings and reviews.

<h3>WPSSO Core Plugin Prerequisite</h3>

WPSSO Ratings and Reviews (aka WPSSO RAR) is an add-on for the [WPSSO Core Plugin](https://wordpress.org/plugins/wpsso/) (Free or Pro version).

== Installation ==

<h3 class="top">Install and Uninstall</h3>

* [Install the WPSSO RAR Add-on](https://wpsso.com/docs/plugins/wpsso-ratings-and-reviews/installation/install-the-plugin/)
* [Uninstall the WPSSO RAR Add-on](https://wpsso.com/docs/plugins/wpsso-ratings-and-reviews/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

<h3 class="top">Frequently Asked Questions</h3>

* None.

<h3>Advanced Documentation and Notes</h3>

* [Developer Resources](https://wpsso.com/docs/plugins/wpsso-ratings-and-reviews/notes/developer/)
	* [Get Average Rating](https://wpsso.com/docs/plugins/wpsso-ratings-and-reviews/notes/developer/get-average-rating/)

== Screenshots ==

01. WPSSO RAR settings page to enable ratings by post type, optionally force star ratings for reviews, and select colors for the star ratings. 
02. WPSSO RAR editing page showing an option to enable / disable ratings per post, reviews with star ratings, and a reply to a review (no star rating).
03. WPSSO RAR showing the submission of a review &mdash; note the themed labels (Your Rating, Your Review, etc.) and the customized star colors.

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Free / Standard Version Repositories</h3>

* [GitHub](https://surniaulula.github.io/wpsso-ratings-and-reviews/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/wpsso-ratings-and-reviews/)

<h3>Changelog / Release Notes</h3>

**Version 1.5.5 (2019/04/27)**

* *New Features*
	* None.
* *Improvements*
	* Added a new "Add 5 Star Rating If No Rating" option in the SSO &gt; Rating / Review settings page (WPSSO JSON add-on required).
* *Bugfixes*
	* None.
* *Developer Notes*
	* None.

**Version 1.5.4 (2019/04/21)**

* *New Features*
	* None.
* *Improvements*
	* None.
* *Bugfixes*
	* None.
* *Developer Notes*
	* Added more debug logging in the WpssoRarFilters class.

== Upgrade Notice ==

= 1.5.5 =

(2019/04/27) Added a new "Add 5 Star Rating If No Rating" option in the SSO &gt; Rating / Review settings page (WPSSO JSON add-on required).

