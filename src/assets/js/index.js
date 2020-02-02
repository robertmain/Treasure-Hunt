import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';

import { getCookie, setCookie, delCookie } from '@/utils/cookie';
window.getCookie = getCookie;
window.setCookie = setCookie;
window.delCookie = delCookie;
