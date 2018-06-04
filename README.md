# AutoFbPost
A Processwire module that posts on behalf of a Facebook profile/page whenever a PW page is saved.

To work, this module requires a Facebook app ID and secret.

If a Facebook page ID is also provided, posts will be made on behalf of that Facebook page.

**IMPORTANT:** to login with strict mode for redirect URIs, go to login settings in facebook for developers and add *http://www.example.com/processwire/page/* to your list of allowed redirect URIs.

This module provides additional control over the posts:
- Templates: posts can take place only for pages with the defined templates 
- On/Off switch: specify a checkbox field that will not allow the post if checked
- Specify a message and/or  an image for the post.
