/*
|--------------------------------------------------------------------------
| [Master Scripts]
|--------------------------------------------------------------------------
|  Project:    Food/Recipe web app
|  Version:    1.1
|  Last change:    27/02/19
|  Assigned to:    Christopher Kelker (ck)
|
| [Table of contents]
|  1. Primary
|  2. Plugins
|  3. Components
*/

/*
|--------------------------------------------------------------------------
| Primary
|--------------------------------------------------------------------------
| Laravel Bootstrap:
*/
require('./bootstrap');

/*
|--------------------------------------------------------------------------
| Plugins
|--------------------------------------------------------------------------
| 1. Toastr:
|    https://www.npmjs.com/package/toastr
|    * npm install --save toastr
|    * npm remove toastr
|
| 2. Select2
|
| 3. Croppie
*/
window.toastr = require('toastr');
require('./plugins/select2');
window.croppie = require('croppie');

/*
|--------------------------------------------------------------------------
| Components
|--------------------------------------------------------------------------
| 1. Profile Settings
| 2. Recipes Adding
| 3. Search
*/
require('./components/settings-funtionality.js');
require('./components/recipes-add.js');
require('./components/search.js');
