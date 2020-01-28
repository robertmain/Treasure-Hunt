import { post } from '@/utils/api';

export const updateSettings = (key, value) => post('settings/update', { key, value });

$('.authorisation').click(({ target }) => updateSettings('authorisation', target.getAttribute('data-status')));

$('.updatemessage').click(() => Promise.all([
    updateSettings('completetitle', $('.completetitle').val()),
    updateSettings('completemessage', $('.completemessage').html()),
]))

$('.eucookielaw').click(({ target }) =>
    updateSettings('cookielaw', target.getAttribute('data-status')));

$('.completetitle, .completemessage').keyup(() => $('.updatemessage').removeAttr('disabled'));
