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
|  1. Plugins
|  2. Components
*/

/*
|--------------------------------------------------------------------------
| Plugins
|--------------------------------------------------------------------------
| 1. Bootstrap
|
| 2. Toastr:
|    https://www.npmjs.com/package/toastr
|    * npm install --save toastr
|    * npm remove toastr
|
| 3. Select2:
|    https://www.npmjs.com/package/select2
|    * npm i select2
|    * npm remove select2
|
| 4. Croppie:
|    https://www.npmjs.com/package/croppie
|    * npm install croppie
|    * npm remove croppie
*/
window.bootstrap = require('bootstrap');
window.toastr = require('toastr');
// window.select2 = require('select2');
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
