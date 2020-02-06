import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';

import * as cookie from 'js/utils/cookie';
Object.assign(window, cookie);
