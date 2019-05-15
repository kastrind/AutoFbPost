# AutoFbPost

This Processwire module can publish content of a Processwire page on a Facebook page, triggered by saving the Processwire page.

To set it up, configure the module with a Facebook app ID, secret and a Page ID. Following is additional configuration on Facebook for developers: 

**Minimum Required Facebook App configuration:**
- on Settings -> Basics,
  - provide the App Domains,
  - provide the Site URL,
- on Settings -> Advanced, set the API version (has been tested up to v3.3),
- add Product: Facebook Login,
- on Facebook Login -> Settings,
  - set Client OAuth Login: Yes,
  - set Web OAuth Login: Yes,
  - set Enforce HTTPS: Yes,
  - add *"http:<i></i>//www<i></i>.example.com/processwire/page/"* to field Valid OAuth Redirect URIs.

This module provides additional control over the posts:
- Templates: posts can take place only for pages with the defined templates.
- On/Off switch: specify a checkbox field that will not allow the post if checked.
- Specify a message and/or an image for the post.
