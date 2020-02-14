import { create } from 'axios';

const api = create({
  baseUrl: `//${window.location.host}/`,
  headers: { ['X-Requested-With']: 'XMLHttpRequest' },
  transformRequest: [
    (data) => Object.fromEntries(
        Object.entries(data).filter(([, value]) => `${value}`.length > 0)
    ),
    JSON.stringify,
  ]
});

export const { get, post } = api;
