import { get } from '@/utils/api';

let lastId;
const treasure = [];

setInterval(async() => {
    const { data: body } = await get('live/socket', {
        params: (lastId > 0) ? { since: lastId } : {},
    });

    const newTreasure = body.filter(({ f_id }) =>
        !treasure.map((existing) => existing.f_id).includes(f_id));

    treasure.push(...newTreasure);

    ([{f_id: lastId}] = treasure.slice(-1));

    newTreasure.forEach(({ phone, title }) => {
        $(`<div><h4 class="alert-heading">
            Treasure Found</h4><p>User: ${phone}<br />
            Found Treasure: ${title}</p></div>`)
            .addClass('alert alert-info span3')
            .hide()
            .prependTo('.alertcontainer')
            .fadeIn(1500);
    });
}, 2000);
