import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';
import '@openfonts/open-sans_all';

import * as cookie from 'js/utils/cookie';
Object.assign(window, cookie);

import 'css/style.scss';
