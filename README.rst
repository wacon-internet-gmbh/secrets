==================================================
WACON Secrets
==================================================


The TYPO3 extension secrets developed by us is used to encrypt messages and pass them on as a unique link. The extension is suitable for organizations that attach particular importance to security and trustworthiness. Since all communication takes place via your own web server, no third-party tools from servers whose location is unknown (GDPR) are necessary. Your own domain name in the link is more trustworthy and makes a more professional impression.

Translated with DeepL.com (free version)

Minimal Dependencies
====================
* TYPO3 CMS 12.4 or 13.4 for Secrets 2.x


Quick Install Guide
===================

Installation 
--------------------------------------------

1.1. Download the extension secrets from the TYPO3 Repository or gitHub. Install the extension and activate it with the extension manager.

1.2 Installation with composer
composer req wacon/secrets

Configuration
--------------------------------------------

2.1. Include the template "Secrets" in your root template
2.2. Use a separate storage folder and set the id inside TypoScript (plugin.tx_secrets.settings), see TypoScript Browser
2.3. Insert the Plugin "Create Secret" and set the ID of the page inside TypoScript
2.4. Insert the Plugin "Show Secret" and set the ID of the page inside TypoScript
2.4. Set your own Secret Key inside TypoScript


License
-------

This project is released under the terms of the `MIT license <https://en.wikipedia.org/wiki/MIT_License>`_.

Find more information on our website
-------

https://www.wacon.de/typo3-service/secrets.html