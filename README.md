# Google Calendar App

### Technology Stack Backend: (LAMP) 

* Ubuntu 18.04
* php7.2
* php7.2-fpm
* php7.2-mysql
* mysql 5.7
* apache2 2.4.29

### Technology Stack Frontend:

* AngularJs 1.5.x
* Angular Material 1.1.4

### About App:
> User can login to **Google Calendar App** using google credentials, this will take them to Google sign in oAuth flow. On successful login user can see all the calendar events created in google account, on **add/delete/change** in any events will also effect in this app, to see the changes user can refresh the page.

### API's, Webhook & Framework:
1. Google oAuth2: https://developers.google.com/identity/protocols/OAuth2
2. Google People API: https://developers.google.com/people/
3. Google Calendar API: https://developers.google.com/calendar/v3/reference/
4. Google Calendar Webhook (Push Notification): https://developers.google.com/calendar/v3/push
5. kohana (PHP MVC Framework): https://docs.koseven.ga/guide/kohana

### Note:
> The oAuth credentials (client_id, and client_secret) are loding from the .ini file, *Location: /etc/g-calendar/config.ini*
