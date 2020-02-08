import { post } from 'js/utils/api';
import { createRow } from 'js/utils/table';

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
        } = await post('admins/create', new FormData(newAdminForm));

        const adminrows = admins.map(
            ({ forename, surname, phone, id }) => adminTableRow({ id, forename, surname, phone })
        );

        document.querySelector('table').appendChild(...adminrows);

        newAdminForm.querySelectorAll('input')
            .forEach(field => field.value = '');

        $(target).parents('.modal').modal('hide');
  });
