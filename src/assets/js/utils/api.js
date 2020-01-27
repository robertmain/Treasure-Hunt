import { create } from 'axios';

const api = create({
  baseUrl: `//${window.location.host}/`,
  headers: { ['X-Requested-With']: 'XMLHttpRequest' },
});

export const { get, post } = api; 
