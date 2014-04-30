Magento Design dependencies
============================

This module adds depencies on other packages you have downloaded from the internet.
It will automaticly add the Enterprise package if you use the Enterprise version of Magento.

Other dependencies you can configure in Magento itself.
Add these dependencies in System / Design / Dependencies in the backend of Magento.

The problem
-----------

You normally would need to copy everything else from Enterprise directory
to re-enable Enterprise code.

*Enterprise example*

Install own package blah
- /app/design/frontend/blah/default
- /app/design/frontend/base/default

With this module, enterprise is readded again.
- /app/design/frontend/blah/default
- /app/design/frontend/enterprise/default
- /app/design/frontend/base/default


*External package example*

Download a external package(for example Themeforest), install that package.
Normally you would need to copy the full package if you don't want to touch the original code.

With this module, you can just copy the files you need and add a dependency on the external package.

The result could be:
- /app/design/frontend/site/view
- /app/design/frontend/site/default
- /app/design/frontend/external/default
- /app/design/frontend/default/default
- /app/design/frontend/base/default




