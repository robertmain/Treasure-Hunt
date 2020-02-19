import { get } from 'js/utils/api';
import Chart from 'chart.js';
import { format, parseISO } from 'date-fns';

const foundChart = new Chart(
    document.getElementById('found_treasure').getContext('2d'),
    {
        type: 'line',
        data: {
            datasets: []
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'hour',
                    },
                    distribution: 'linear'
                }],
            }
        }
    }
);


(async () => {
    const { data } = await get('/admin/live/socket');
    const treasure = data.reduce((acc, { treasure, ...value}) => {
        if(!acc[treasure.id]){
            acc[treasure.id] = [];
        }
        acc[treasure.id].push({ treasure, ...value });
        return acc;
    }, {});

    foundChart.data.datasets.push(...Object.entries(treasure).map(([,treasureGroup]) => ({
        label: treasureGroup[0].treasure.title,
        data: treasureGroup.map(({ created_at }) => ({
            t: parseISO(created_at),
            y: Object.entries(treasureGroup.reduce((acc, val) => {
                const timestamp = format(parseISO(val.created_at), 't')
                const groupKey = timestamp - (timestamp % 3600);
                if(!acc[groupKey]){
                    acc[groupKey] = [];
                }
                acc[groupKey].push({ treasure, ...val });
                return acc;
            }, {})).length,
        })),
        borderWidth: 1,
    })));
    foundChart.update();
})();
