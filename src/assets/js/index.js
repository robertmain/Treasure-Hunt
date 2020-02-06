import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';

import * as cookie from '@/utils/cookie';
Object.assign(window, cookie);
