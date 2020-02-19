import { get } from 'js/utils/api';
import 'css/live.scss';
import { formatDistanceToNow, parseISO } from 'date-fns';

let since;
const treasure = [];

setInterval(async() => {
    const { data: body } = await get('live/socket', {
        params: (!!since) ? { since } : {},
    });

    const newTreasure = body.filter(({ f_id }) =>
        !treasure.map((existing) => existing.f_id).includes(f_id));

    treasure.push(...newTreasure);

    ([{created_at: since}] = treasure.slice(-1));

    newTreasure.forEach(({ nickname, title, created_at }) => {
        $(`<div class="card text-white bg-info mb-3" style="max-width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-white">Treasure Found</h5>
                <p class="card-text">
                    <strong>User:</strong> ${nickname}<br />
                    <strong>Found Treasure:</strong> ${title}
                </p>
            </div>
            <div class="card-footer">
                ${formatDistanceToNow(parseISO(created_at), {
                    addSuffix: true,
                    includeSeconds: true,
                })}
            </div>
        </div>`).prependTo('.card-columns');
    });
}, 2000);
