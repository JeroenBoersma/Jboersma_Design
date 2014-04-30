Magento Design dependencies
============================

Add depencies on packages you have downloaded from the internet.
It will automaticly add the Enterprise package if you use the Enterprise version of Magento.

Other dependencies you can configure in the Magento Configuration.
Add these dependencies in System / Design / Dependencies in the backend of Magento.

The problem
-----------

You normally would need to copy everything from your downloaded or Enterprise package
to your site package.

*Enterprise example*

Install store package
- /app/design/frontend/store/default
- /app/design/frontend/base/default

With this module, enterprise will be added
- /app/design/frontend/store/default
- /app/design/frontend/enterprise/default
- /app/design/frontend/base/default


*External package example*

Download a external package(for example from Themeforest), install that package.
Normally you would need to copy the full package if you don't want to touch the original code.

With this module, you can just copy the files needed and add a dependency on the external package.

The result could be:
- /app/design/frontend/store/view
- /app/design/frontend/store/default
- /app/design/frontend/external/default <-- Read in the downloaded package
- /app/design/frontend/enterprise/default <-- when running Enterprise
- /app/design/frontend/base/default

*Module package example*

If you are creating modules, people move this into base/default.
Now you can create a package "modules" and add the dependency.

The result could be:
- /app/design/frontend/store/default
- /app/design/frontend/modules/default
- /app/design/frontend/base/default

Or:
- /app/design/frontend/store/default
- /app/design/frontend/external/default <-- External package
- /app/design/frontend/modules/default <-- modules
- /app/design/frontend/enterprise/default <-- If you are using Enterprise
- /app/design/frontend/base/default




