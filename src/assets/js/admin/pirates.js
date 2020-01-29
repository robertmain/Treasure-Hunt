import { post } from '@/utils/api';

const update = async (id, data = {}) => post(`/admin/pirates/update/${id}`, data);

export const toggleAuthorization = (id, authorize = true) => update(id, {
    authorised: (authorize) ? '1' : '0',
});

export const updateDetails = (id, data) => update(
    id,
    Object.fromEntries(
        Object.entries(data).filter(([, value]) => `${value}`.length > 0)
    )
)
