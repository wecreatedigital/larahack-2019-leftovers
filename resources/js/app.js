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
| 1. jQuery
|
| 2. Bootstrap
|
| 3. Toastr:
|    https://www.npmjs.com/package/toastr
|    * npm install --save toastr
|    * npm remove toastr
|
| 4. Select2:
|    https://www.npmjs.com/package/select2
|    * npm i select2
|    * npm remove select2
|
| 5. Croppie:
|    https://www.npmjs.com/package/croppie
|    * npm install croppie
|    * npm remove croppie
*/
import jquery from 'jquery';
window.$ = window.jQuery=jquery;

require('bootstrap');
require('toastr');
require('select2')
require('croppie');

/*
|--------------------------------------------------------------------------
| Components
|--------------------------------------------------------------------------
| 1. Global
| 2. Profile Settings
| 3. Recipes Adding
| 4. Search
| 5. Hearting/Liking
*/
require('./components/global.js');
require('./components/settings-funtionality.js');
require('./components/recipes-add.js');
require('./components/search.js');
require('./components/hearting.js');
