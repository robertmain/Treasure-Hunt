import { post } from 'js/utils/api';

export const update = async (id, data = {}) => post(`/admin/pirates/update/${id}`, data);

export const toggleAuthorization = (id, authorize = true) => update(id, {
    authorised: (authorize) ? '1' : '0',
});

Object.assign(window, { update, toggleAuthorization });
