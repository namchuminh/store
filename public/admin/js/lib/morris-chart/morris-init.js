// Dashboard 1 Morris-chart
$(function () {
    "use strict";
    // Extra chart
    Morris.Area({
        element: 'extra-area-chart',
        data: [{
            period: '2001',
            smartphone: 0,
        }, {
            period: '2002',
            smartphone: 90,
        }, {
            period: '2003',
            smartphone: 40,
        }, {
            period: '2004',
            smartphone: 30,
        }, {
            period: '2005',
            smartphone: 150,
        }, {
            period: '2006',
            smartphone: 25,
        }, {
            period: '2007',
            smartphone: 10,
        }


        ],
        lineColors: ['#55ce63', '#8b67c9', '#009efb'],
        xkey: 'period',
        ykeys: ['smartphone', 'windows', 'mac'],
        labels: ['Phone', 'Windows', 'Mac'],
        pointSize: 0,
        lineWidth: 0,
        resize:true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'

    });

 });    