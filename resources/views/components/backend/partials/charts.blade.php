<script type="module">
    Highcharts.chart("container", {
        title: {
            text: "Month Call Progress",
        },

        xAxis: {
            tickInterval: 1,
            type: "logarithmic",
            accessibility: {
                rangeDescription: "Range: 1 to 10",
            },
        },

        yAxis: {
            type: "logarithmic",
            minorTickInterval: 0.1,
            accessibility: {
                rangeDescription: "Range: 0.1 to 1000",
            },
        },

        tooltip: {
            headerFormat: "<b>{series.name}</b><br />",
            pointFormat: "x = {point.x}, y = {point.y}",
        },

        series: [{
            data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
            pointStart: 1,
        }, ],
    });

    Highcharts.chart("bar_line_chart_container", {
        chart: {
            zoomType: "xy",
        },
        title: {
            text: "Bar Line Chart Mixed",
            align: "left",
        },
        subtitle: {
            text: "",
            align: "left",
        },
        xAxis: [{
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            crosshair: true,
        }, ],
        yAxis: [{
                // Primary yAxis
                labels: {
                    format: "{value}°C",
                    style: {
                        color: Highcharts.getOptions().colors[1],
                    },
                },
                title: {
                    text: "Temperature",
                    style: {
                        color: Highcharts.getOptions().colors[1],
                    },
                },
            },
            {
                // Secondary yAxis
                title: {
                    text: "Precipitation",
                    style: {
                        color: Highcharts.getOptions().colors[0],
                    },
                },
                labels: {
                    format: "{value} mm",
                    style: {
                        color: Highcharts.getOptions().colors[0],
                    },
                },
                opposite: true,
            },
        ],
        tooltip: {
            shared: true,
        },
        legend: {
            align: "left",
            x: 80,
            verticalAlign: "top",
            y: 60,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor ||
                "rgba(255,255,255,0.25)",
        },
        series: [{
                name: "Precipitation",
                type: "column",
                yAxis: 1,
                data: [
                    27.6, 28.8, 21.7, 34.1, 29.0, 28.4, 45.6, 51.7, 39.0, 60.0,
                    28.6, 32.1,
                ],
                tooltip: {
                    valueSuffix: " mm",
                },
            },
            {
                name: "Temperature",
                type: "spline",
                data: [
                    -13.6, -14.9, -5.8, -0.7, 3.1, 13.0, 14.5, 10.8, 5.8, -0.7,
                    -11.0, -16.4,
                ],
                tooltip: {
                    valueSuffix: "°C",
                },
            },
        ],
    });

    // Data retrieved from https://www.vikjavev.no/ver/#2022-06-13,2022-06-14

    Highcharts.chart("comparison_chart_container", {
        chart: {
            type: "spline",
            scrollablePlotArea: {
                minWidth: 600,
                scrollPositionX: 1,
            },
        },
        title: {
            text: "Comparison Chart",
            align: "left",
        },
        subtitle: {
            text: "13th & 14th of June, 2022 at two locations in Vik i Sogn, Norway",
            align: "left",
        },
        xAxis: {
            type: "datetime",
            labels: {
                overflow: "justify",
            },
        },
        yAxis: {
            title: {
                text: "Wind speed (m/s)",
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{
                    // Light air
                    from: 0.3,
                    to: 1.5,
                    color: "rgba(68, 170, 213, 0.1)",
                    label: {
                        text: "Light air",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // Light breeze
                    from: 1.5,
                    to: 3.3,
                    color: "rgba(0, 0, 0, 0)",
                    label: {
                        text: "Light breeze",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // Gentle breeze
                    from: 3.3,
                    to: 5.5,
                    color: "rgba(68, 170, 213, 0.1)",
                    label: {
                        text: "Gentle breeze",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // Moderate breeze
                    from: 5.5,
                    to: 8,
                    color: "rgba(0, 0, 0, 0)",
                    label: {
                        text: "Moderate breeze",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // Fresh breeze
                    from: 8,
                    to: 11,
                    color: "rgba(68, 170, 213, 0.1)",
                    label: {
                        text: "Fresh breeze",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // Strong breeze
                    from: 11,
                    to: 14,
                    color: "rgba(0, 0, 0, 0)",
                    label: {
                        text: "Strong breeze",
                        style: {
                            color: "#606060",
                        },
                    },
                },
                {
                    // High wind
                    from: 14,
                    to: 15,
                    color: "rgba(68, 170, 213, 0.1)",
                    label: {
                        text: "High wind",
                        style: {
                            color: "#606060",
                        },
                    },
                },
            ],
        },
        tooltip: {
            valueSuffix: " m/s",
        },
        plotOptions: {
            spline: {
                lineWidth: 4,
                states: {
                    hover: {
                        lineWidth: 5,
                    },
                },
                marker: {
                    enabled: false,
                },
                pointInterval: 3600000, // one hour
                pointStart: Date.UTC(2022, 5, 13, 0, 0, 0),
            },
        },
        series: [{
                name: "Hestavollane",
                data: [
                    4.5, 5.1, 4.4, 3.7, 4.2, 3.7, 4.3, 4, 5, 4.9, 4.8, 4.6, 3.9,
                    3.8, 2.7, 3.1, 2.6, 3.3, 3.8, 4.1, 1, 1.9, 3.2, 3.8, 4.2,
                ],
            },
            {
                name: "Vik",
                data: [
                    0.1, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.4, 0.1, 0, 0.2, 0.3, 0, 0,
                    0, 0, 0, 0.1, 0.1, 0.1, 0, 0.1, 0, 0, 0,
                ],
            },
        ],
        navigation: {
            menuItemStyle: {
                fontSize: "10px",
            },
        },
    });

    Highcharts.chart("basic_bar_chart", {
        chart: {
            type: "column",
        },
        title: {
            text: "Basic Bar Chart",
        },
        subtitle: {
            text: "Source: iHelpBD.com",
        },
        xAxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: "Rainfall (mm)",
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: "</table>",
            shared: true,
            useHTML: true,
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            },
        },
        series: [{
                name: "Tokyo",
                data: [
                    49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
                    194.1, 95.6, 54.4,
                ],
            },
            {
                name: "New York",
                data: [
                    83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
                    106.6, 92.3,
                ],
            },
            {
                name: "London",
                data: [
                    48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2,
                    59.3, 51.2,
                ],
            },
            {
                name: "Berlin",
                data: [
                    42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1,
                    46.8, 51.1,
                ],
            },
        ],
    });

    // Data retrieved from https://netmarketshare.com
    Highcharts.chart("pie_chart", {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: "pie",
        },
        title: {
            text: "Inbound Outbound Call Count",
            align: "left",
        },
        tooltip: {
            pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>",
        },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    format: "<b>{point.name}</b>: {point.percentage:.1f} %",
                },
            },
        },
        series: [{
            name: "Brands",
            colorByPoint: true,
            data: [{
                    name: "Inbound",
                    y: 40.0,
                    sliced: true,
                    selected: true,
                },
                {
                    name: "Outbound",
                    y: 50.0,
                },
                {
                    name: "Others",
                    y: 10.0,
                },
            ],
        }, ],
    });

    var colors = Highcharts.getOptions().colors,
        categories = ["Chrome", "Safari", "Edge", "Firefox", "Other"],
        data = [{
                y: 61.04,
                color: colors[2],
                drilldown: {
                    name: "Chrome",
                    categories: [
                        "Chrome v97.0",
                        "Chrome v96.0",
                        "Chrome v95.0",
                        "Chrome v94.0",
                        "Chrome v93.0",
                        "Chrome v92.0",
                        "Chrome v91.0",
                        "Chrome v90.0",
                        "Chrome v89.0",
                        "Chrome v88.0",
                        "Chrome v87.0",
                        "Chrome v86.0",
                        "Chrome v85.0",
                        "Chrome v84.0",
                        "Chrome v83.0",
                        "Chrome v81.0",
                        "Chrome v89.0",
                        "Chrome v79.0",
                        "Chrome v78.0",
                        "Chrome v76.0",
                        "Chrome v75.0",
                        "Chrome v72.0",
                        "Chrome v70.0",
                        "Chrome v69.0",
                        "Chrome v56.0",
                        "Chrome v49.0",
                    ],
                    data: [
                        36.89, 18.16, 0.54, 0.7, 0.8, 0.41, 0.31, 0.13, 0.14, 0.1,
                        0.35, 0.17, 0.18, 0.17, 0.21, 0.1, 0.16, 0.43, 0.11, 0.16,
                        0.15, 0.14, 0.11, 0.13, 0.12,
                    ],
                },
            },
            {
                y: 9.47,
                color: colors[3],
                drilldown: {
                    name: "Safari",
                    categories: [
                        "Safari v15.3",
                        "Safari v15.2",
                        "Safari v15.1",
                        "Safari v15.0",
                        "Safari v14.1",
                        "Safari v14.0",
                        "Safari v13.1",
                        "Safari v13.0",
                        "Safari v12.1",
                    ],
                    data: [0.1, 2.01, 2.29, 0.49, 2.48, 0.64, 1.17, 0.13, 0.16],
                },
            },
            {
                y: 9.32,
                color: colors[5],
                drilldown: {
                    name: "Edge",
                    categories: ["Edge v97", "Edge v96", "Edge v95"],
                    data: [6.62, 2.55, 0.15],
                },
            },
            {
                y: 8.15,
                color: colors[1],
                drilldown: {
                    name: "Firefox",
                    categories: [
                        "Firefox v96.0",
                        "Firefox v95.0",
                        "Firefox v94.0",
                        "Firefox v91.0",
                        "Firefox v78.0",
                        "Firefox v52.0",
                    ],
                    data: [4.17, 3.33, 0.11, 0.23, 0.16, 0.15],
                },
            },
            {
                y: 11.02,
                color: colors[6],
                drilldown: {
                    name: "Other",
                    categories: ["Other"],
                    data: [11.02],
                },
            },
        ],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;

    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {
        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color,
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - j / drillDataLen / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.color(data[i].color).brighten(brightness).get(),
            });
        }
    }

    // Create the chart
    Highcharts.chart("donut_chart", {
        chart: {
            type: "pie",
        },
        title: {
            text: "Donut Chart",
            align: "right",
        },
        subtitle: {
            text: "",
            align: "left",
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ["50%", "50%"],
            },
        },
        tooltip: {
            valueSuffix: "%",
        },
        series: [{
                name: "Browsers",
                data: browserData,
                size: "60%",
                dataLabels: {
                    color: "#ffffff",
                    distance: -30,
                },
            },
            {
                name: "Versions",
                data: versionsData,
                size: "80%",
                innerSize: "60%",
                dataLabels: {
                    format: '<b>{point.name}:</b> <span style="opacity: 0.5">{y}%</span>',
                    filter: {
                        property: "y",
                        operator: ">",
                        value: 1,
                    },
                    style: {
                        fontWeight: "normal",
                    },
                },
                id: "versions",
            },
        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400,
                },
                chartOptions: {
                    series: [{},
                        {
                            id: "versions",
                            dataLabels: {
                                enabled: false,
                            },
                        },
                    ],
                },
            }, ],
        },
    });
</script>