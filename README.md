# AutoFbPost
A Processwire module that posts on behalf of a Facebook page whenever a PW page is saved.

To work, this module requires a Facebook app ID, secret and a Page ID.

**Minimum Required Facebook App configuration:**
- on Settings -> Basics,
  - provide the App Domains,
  - provide the Site URL,
- on Settings -> Advanced, set the API version to 2.10
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
