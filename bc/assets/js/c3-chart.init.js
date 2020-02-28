$(function () {
    var chart = c3.generate({

        bindto: '#chart',

        data: {
        columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
        ],
        types: {
        data1: 'line',
        data2: 'line'
        }
    },

    axis: {
        x: {
        type: 'categorized'
        }
    }

    });
});


$(function () {
    var chart = c3.generate({
        bindto: '#combine-chart',
        data: {
            columns: [
                ['data1', 30, 20, 50, 40, 60, 50],
                ['Rata-rata', 200, 130, 90, 240, 130, 220],
            ],
            types: {
                data1: 'bar',
                data2: 'line',
                data3: 'spline',
                
                data5: 'bar'
            },
            groups: [
                ['data1','data2']
            ]
        },
        axis: {
            x: {
                type: 'categorized'
            }
        }
    });
});

$(function () {
    var chart = c3.generate({
        bindto: '#roated-chart',
        data: {
        columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
        ],
        types: {
        data1: 'bar'
        }
        },
        axis: {
            rotated: true,
            x: {
            type: 'categorized'
            }
        }
    });
});