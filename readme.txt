=== Job Board Manager - Locations ===
	Contributors: pickplugins
	Donate link: http://paratheme.com
	Tags:  Company Location, Job Location, Job city,  Job, Job Poster, job manager, job, job list, job listing, Job Listings, job lists, job management, job manager,
	Requires at least: 4.1
	Tested up to: 4.2.4
	Stable tag: 1.0.2
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Ajax location list on job posting for Job Board Manager.

== Description ==

"Job Board Manager - Locations" allowes you to display ajax list of predefined location on job edit page and available job list under any location for "Job Board Manager" plugin.


### Job Board Manager - Locations by http://pickplugins.com
* [Live Demo &raquo;](http://www.pickplugins.com/demo/job-board-manager/single-location/)
* [Get Job Board Manager &raquo;](https://wordpress.org/plugins/job-board-manager/)

<strong>Location Single page</strong>

If you want to display Location on single page like default post, you need to copy your theme single.php and rename to single-location.php

you need to replace content section by following short-code

`<?php echo do_shortcode('[location_single id="'.get_the_ID().'"]'); ?>`

Also you can display any location with static id like this inside post or page content.

`[location_single id="1234"]`

<strong>Job Count by Location</strong>

you can display job count by locations as widget via short-codes on sidebar or page content

`[job_count_by_location max_item="10"]`

Parameter:

themes => flat
max_item => any interger value.




== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>Job Board Manager</strong>" activate it.<br />




== Screenshots ==

1. screenshot-1
2. screenshot-2
3. screenshot-3
4. screenshot-4
5. screenshot-5


== Changelog ==


	= 1.0.2 =
    * 04/09/2015 - add - front-end ajax locations suggest.

	= 1.0.1 =
    * 04/09/2015 - add - display job count by locations.
    
	= 1.0.0 =
    * 11/08/2015 Initial release.
