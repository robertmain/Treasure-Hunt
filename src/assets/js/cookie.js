function setCookie(name, cvalue, exdays = 30){
    const epiry = new Date();
    epiry.setDate(epiry.getDate() + exdays);
    var value = escape(cvalue) + ((exdays) ? `; expires=${epiry.toUTCString()}` : '');
    document.cookie = `${name}=${value}`;
}

const getCookie = (cname) =>
    decodeURIComponent(document.cookie).split(';')
    .map((cookie) => cookie.trim().match(/((?:'|")[^*]*(?:'|"))|[^=]+/g))
    .filter(([name]) => name === cname)[0][1];

function delCookie(name){
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
