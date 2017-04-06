------------------------------------------------------------------------------------------------------------------------

                                       Practice

------------------------------------------------------------------------------------------------------------------------

                                Author : Kunal Kursija

------------------------------------------------------------------------------------------------------------------------

CONTENTS OF THIS FILE:
---------------------

- Introduction
- Project Files
- References
- Dependencies
- Installation
- Permissions
- User Interface
- Maintainers

------------------------------------------------------------------------------------------------------------------------

INTRODUCTION:
------------

Practice - This is an Drupal 8 module written to practice Drupal 8's Serialization API.

------------------------------------------------------------------------------------------------------------------------

Project Files:
------------

1) README.md: This file contains various instructions about this Project.
2) composer.json: This file contains Schema describing project & related metadata which is user by Composer. 
3) paratice.info.yml: This file contains Project definition & metadata in Drupal's Required Format.
4) practice.module: This file contains Important Hooks along with some helper functions.
5) practice.install: This file contain hook_install which will execute when the module is installed. 
6) practice.routing.yml: This file describes Dynamic URL whose main job is to serialize & display 'Page' nodes. 
7) practice.services.yml: This file contains service responsible for Upcasting 'siteapikey' parameter in our Route.
8) config/practice.settings.yml: This file contains 'siteapikey' configuration.
9) config/schema/practice.schema.yml: This file contains schema mapping for the Project Configurations.
10) src/Controller/NodeSerializer.php: This file contains our URL callback class. This class is our node serializer. 
11) src/ParamConverter/SiteApiKeyConverter.php: This file contains Class upcasting our 'siteapi' URL parameter.

------------------------------------------------------------------------------------------------------------------------

REFERENCES:
------------

1) Core's System Module: For Config Entity Mapping & Definitions.
2) Placeholders: String Placeholders in D8
3) Config Inspector Module: https://www.drupal.org/project/config_inspector
   To verify the created configurations of this module.
4) Core's Node Module for 'paramconverter' services(Example: "node_preview").
5) Using parameters in routes:
   https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes
6) Access Denied in D8: http://drupal.stackexchange.com/questions/211095/
7) Dependency Injections of services defined by other modules: 
   https://code.tutsplus.com/tutorials/drupal-8-properly-injecting-dependencies-using-
   di--cms-26314
8) Serialization API: 
   https://www.drupal.org/docs/8/api/serialization-api/serialization-api-overview

------------------------------------------------------------------------------------------------------------------------

DEPENDENCIES:
------------

1) Node Module
2) Serialization Module

------------------------------------------------------------------------------------------------------------------------

INSTALLATION:
------------

To install this module
1) Go to extend
2) Find 'Practice'
3) Check the box on left and save

------------------------------------------------------------------------------------------------------------------------

PERMISSIONS:
-----------

None

------------------------------------------------------------------------------------------------------------------------

USER INTERFACE:
--------------

1) Admin Site Information: '/admin/config/system/site-information'

- A new form text field named "Site API Key" needs to be added to the "Site 
  Information" form with the default value of “No API Key yet”.
- When this form is submitted, the value that the user entered for this field 
  should be saved as the system variable named "siteapikey".
- A Drupal message should inform the user that the Site API Key has been saved 
  with that value.
- When this form is visited after the "Site API Key" is saved, the field should 
  be populated with the correct value.
- The text of the "Save configuration" button should change to "Update 
  Configuration".

2) Node Serialization: '/page_json/{siteapikey}/{node}'

- This module also provides a URL that responds with a JSON representation of a 
  given node with the content type "page" only if the previously submitted API 
  Key and a node id (nid) of an appropriate node are present, otherwise it will 
  respond with "access denied".

------------------------------------------------------------------------------------------------------------------------

MAINTAINERS:
-----------

Current maintainers:
 * Kunal Kursija - https://www.drupal.org/user/2126548

------------------------------------------------------------------------------------------------------------------------

                                Thank You !
