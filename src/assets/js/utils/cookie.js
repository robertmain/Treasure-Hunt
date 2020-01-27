export function setCookie(name, value, exdays = 30)
{
    const expiry = new Date();
    expiry.setDate(expiry.getDate() + exdays);
    var value = escape(value) + ((exdays) ? `; expires=${expiry.toUTCString()}` : '');
    document.cookie = `${name}=${value}`;
}

export const getCookie = (cname) =>
    decodeURIComponent(document.cookie).split(';')
    .map((cookie) => [].concat(cookie.trim().match(/((?:'|")[^*]*(?:'|"))|[^=]+/g)))
    .filter(([name]) => name === cname)
    .reduce((acc, val) => acc.concat(val), [])
    .slice(1)[0] || null;

export function delCookie(name)
{
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
