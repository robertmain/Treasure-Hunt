import { post } from 'axios';
import { createRow } from '@/utils/table';

export const adminTableRow = ({ id, forename, surname, phone }) => createRow([
    `${forename} ${surname}`,
    phone,
    `<div class="btn-group">
        <a
            class="btn dropdown-toggle"
            data-toggle="dropdown" href="#"
        >
            <i class="icon-user"></i>
            Admin <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="/admin/admins/edit/${id}">
                    <i class="icon-pencil" ></i> Edit
                </a>
            </li>
            <li>
                <a href="/admin/admins/delete/${id}" >
                    <i class="icon-trash"></i> Delete
                </a>
            </li>
        </ul>
    </div>`,
]);

document.querySelector('#addadmin')
    .addEventListener('click', async ({ target }) => {
        const newAdminForm = document.querySelector('#newAdmin form');

        const {
            data: admins,
        } = await post('/admin/admins/create', new FormData(newAdminForm), {
            headers: { ['X-Requested-With']: 'XMLHttpRequest' },
            responseType: 'json',
        });

        const adminrows = admins.map(
            ({ forename, surname, phone, id }) => adminTableRow({ id, forename, surname, phone })
        );

        document.querySelector('table').appendChild(...adminrows);

        newAdminForm.querySelectorAll('input')
            .forEach(field => field.value = '');

        $(target).parents('.modal').modal('hide');
  });
