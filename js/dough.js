/*
* Dough, A Cookie Plugin for jQuery
* By: Nathan Searles, http://nathansearles.com
* Example: http://nathansearles.com/plugin/dough
* Version: 1.3
* Updated: June 14th, 2011
*
* Licensed under the Apache License, Version 2.0 (the 'License');
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an 'AS IS' BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
	
/*
* Create cookie
*		$.dough("cookieName", "cookieValue");
*
* Read cookie
*		$.dough("cookieName");
*
* Delete cookie
*		$.dough("cookieName", "remove");
*	
*	Note: If setting the path to "current", you must also define that when removing the cookie.
*		$.dough("cookieName", "remove", { path: "current" });
*	
* Set full cookie
*		$.dough("cookieName", "cookieValue", { expires: 365, path: "current", domain: "auto", secure: true });
*
*	Example cookie has a name of "cookieName", a value of "cookieValue", will expire in 1 year, have path of current page, domain will be autodetected and is set to secure for a use under https://.
*
* Definition
*	$.dough([name], [value], { [options] });
*
* Options Definition
*	expires: Days "til cookie expires
*	path: Default is root "/", set to "current" to use the path of current page
*	domain: Auto detect and set domain with subdomain prefix
*	secure: Set to true if you"re using https://
*/
		
(function($){
	$.dough = function( name, value, option ) {
		// Override options if specified
		option = $.extend( {}, $.dough.option, option );
		
		// We"ll need this later on
		var days = option.expires;

		// Get cookie value
		if (value === undefined) {
			var results = document.cookie.match( name + "=([^;]*)(;|$)" );
			if ( results != null ) {
				if ( results[1][0] === "{" ) {
					// Parse as JSON
					return $.parseJSON(results[1]);
				} else {
					return results[1];
				}
			} else {
				return;
			}
		}
		
		// Remove cookie
		if (value == "remove") {
			days = -1;
			value = "";
		}

		// Start the baking
		var bake = name + "=" + value;

		// Set the date
		if (days) {
			var date = new Date();
			// Get current date add/remove days "til expired
			date.setTime(date.getTime()+(days*24*60*60*1000));
			// Convert to UTC string.
			bake += "; expires=" + date.toUTCString();
		}

		// Set the path
		if (option.path == "current") {
			bake += ";";
		} else {
			bake += "; path=" + option.path + ";";
		}
		
		// Set the domain
		if (option.domain) {
			if (option.domain == "auto") {
				// Get domain name or IP address. Returns 192.168.1.1 or .example.com for use with subdomains
				var ipAddress = window.location.hostname.match(/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/g),
					domainName = "." + window.location.hostname;
				// Is locaiton an IP address or domain name?
				var currentLocation = ipAddress ? ipAddress.toString() : domainName.toString();
				bake += "; domain=" + currentLocation + ";";
			} else {
				// If domain specified
				bake += "; domain=" +  option.domain + ";";
			}
		}
		
		// If secure connection required
		if (option.secure) {
			bake += "; secure";
		}

		// Cookie is baked.
		document.cookie = bake;
	};

	// default options
	$.dough.option = {
		expires: false,
		path: "/",
		domain: false,
		secure: false
	};
	
})(jQuery);