<div class="flex relative w-1/2 h-full border-2 border-blue-600 rounded-lg">
    <div class="absolute left-4 -top-4 font-medium text-sm text-white bg-blue-600 px-3 py-1 rounded-lg">
        {{ __('Temperature') }}
    </div>
    <div class="flex w-1/2 h-full justify-center items-center gap-4 p-4">
        <div class="w-full flex justify-center">
            <div id="chartTemp1" class="chart"></div>
        </div>
        <div class="w-full flex justify-center">
            <div id="chartTemp2" class="chart"></div>
        </div>
    </div>
    <div class="flex flex-col w-1/2 lg:flex-row justify-center items-center gap-4 p-4">
        <div class="w-full flex justify-center">
            <div id="lineChartTemperature" class="chart"></div>
        </div>
    </div>
</div>
@push('scripts')
    {{-- For temp1 --}}
    <script>
        // Create root and chart
        var root = am5.Root.new("chartTemp1");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(
            am5radar.RadarChart.new(root, {
                panX: false,
                panY: false,
                startAngle: -210,
                endAngle: 30,
                radius: am5.percent(90),
                innerRadius: 80
            })
        );

        var axisRenderer = am5radar.AxisRendererCircular.new(root, {
            strokeOpacity: 1,
            minGridDistance: 30
        });

        axisRenderer.ticks.template.setAll({
            visible: true,
            strokeOpacity: 0.5
        });

        axisRenderer.grid.template.setAll({
            visible: false
        });

        var axis = chart.xAxes.push(
            am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,
                max: 100,
                strictMinMax: true,
                renderer: axisRenderer
            })
        );

        chart.children.unshift(am5.Label.new(root, {
            text: "Temperature 1",
            fontSize: 14,
            fontWeight: "400",
            textAlign: "center",
            x: am5.percent(50),
            centerX: am5.percent(50),
            paddingTop: 10,
            paddingBottom: 0,
            fill: am5.color(0x000000)
        }));

        // Add clock hand
        var handDataItemTemp1 = axis.makeDataItem({
            value: 0
        });

        var hand = handDataItemTemp1.set("bullet", am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
                innerRadius: am5.percent(0),
                topWidth: 0,
                bottomWidth: 5,
                pinRadius: 5,
            })
        }));

        axis.createAxisRange(handDataItemTemp1);

        handDataItemTemp1.get("grid").set("visible", false);
        handDataItemTemp1.get("tick").set("visible", false);

        setInterval(() => {
            handDataItemTemp1.animate({
                key: "value",
                to: {{ $temperatureRecords->where('temperature_type', 'T1')->last()->temperature_value }},
                duration: 1500,
                easing: am5.ease.out(am5.ease.cubic)
            });
        }, 2000);
        // Create label for clock hand value
        // var labelClockHandValue = am5.Label.new(root, {
        //     text: '90', // Initial value
        //     fontSize: 16,
        //     fontWeight: "500",
        //     textAlign: "center",
        //     x: am5.percent(50),
        //     centerX: am5.percent(50),
        //     paddingTop: 110,
        //     paddingBottom: 0
        // });
        // chart.children.unshift(labelClockHandValue);
        // Add an HTML-enabled title
        chart.children.unshift(am5.Label.new(root, {
            html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $temperatureRecords->where('temperature_type', 'T1')->last()->temperature_value }}</b></p></div>",
            x: am5.percent(50),
            centerX: am5.percent(50),
            paddingTop: 70,
            paddingBottom: 0
        }));
    </script>

    {{-- For temp2 --}}
    <script>
        // Create root and chart
        var root = am5.Root.new("chartTemp2");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(
            am5radar.RadarChart.new(root, {
                panX: false,
                panY: false,
                startAngle: -210,
                endAngle: 30,
                radius: am5.percent(90),
                innerRadius: 80
            })
        );

        var axisRenderer = am5radar.AxisRendererCircular.new(root, {
            strokeOpacity: 1,
            minGridDistance: 30
        });

        axisRenderer.ticks.template.setAll({
            visible: true,
            strokeOpacity: 0.5
        });

        axisRenderer.grid.template.setAll({
            visible: false
        });

        var axis = chart.xAxes.push(
            am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,
                max: 100,
                strictMinMax: true,
                renderer: axisRenderer
            })
        );

        chart.children.unshift(am5.Label.new(root, {
            text: "Temperature 2",
            fontSize: 14,
            fontWeight: "400",
            textAlign: "center",
            x: am5.percent(50),
            centerX: am5.percent(50),
            paddingTop: 10,
            paddingBottom: 0,
            fill: am5.color(0x000000)
        }));

        // Add clock hand
        var handDataItemTemp2 = axis.makeDataItem({
            value: 0
        });

        var hand = handDataItemTemp2.set("bullet", am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
                innerRadius: am5.percent(0),
                topWidth: 0,
                bottomWidth: 5,
                pinRadius: 5,
            })
        }));

        axis.createAxisRange(handDataItemTemp2);

        handDataItemTemp2.get("grid").set("visible", false);
        handDataItemTemp2.get("tick").set("visible", false);

        setInterval(() => {
            handDataItemTemp2.animate({
                key: "value",
                to: {{ $temperatureRecords->where('temperature_type', 'T2')->last()->temperature_value }},
                duration: 1500,
                easing: am5.ease.out(am5.ease.cubic)
            });
        }, 2000);
        // Create label for clock hand value
        // var labelClockHandValue = am5.Label.new(root, {
        //     text: '90', // Initial value
        //     fontSize: 16,
        //     fontWeight: "500",
        //     textAlign: "center",
        //     x: am5.percent(50),
        //     centerX: am5.percent(50),
        //     paddingTop: 110,
        //     paddingBottom: 0
        // });
        // chart.children.unshift(labelClockHandValue);
        // Add an HTML-enabled title
        chart.children.unshift(am5.Label.new(root, {
            html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $temperatureRecords->where('temperature_type', 'T2')->last()->temperature_value }}</b></p></div>",
            x: am5.percent(50),
            centerX: am5.percent(50),
            paddingTop: 70,
            paddingBottom: 0
        }));
    </script>

    {{-- lineChartTemperature --}}
    <script>
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("lineChartTemperature");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true
        }));

        chart.get("colors").set("step", 3);


        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
            maxDeviation: 0.3,
            baseInterval: {
                timeUnit: "minute",
                count: 5,
            },
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 80, // Adjust this value based on your chart's size
                labelRotation: 45, // Adjust label rotation angle as needed
            }),
            tooltip: am5.Tooltip.new(root, {}),
            stacked: true
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 1,
            min: 0,
            max: 200,
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value1",
            valueXField: "date",
            fill: am5.color(0xFFB200),
            stroke: am5.color(0xFFB200),
            tooltip: am5.Tooltip.new(root, {
                labelText: "{value1}"
            })
        }));
        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));

        series.strokes.template.setAll({
            strokeWidth: 2
        });

        series.get("tooltip").get("background").set("fillOpacity", 0.5);

        var series2 = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value2",
            valueXField: "date",
            fill: am5.color(0x0CFF00),
            stroke: am5.color(0x0CFF00),
            tooltip: am5.Tooltip.new(root, {
                labelText: "{value2}"
            })
        }));

        series2.strokes.template.setAll({
            strokeWidth: 2
        });

        series2.get("tooltip").get("background").set("fillOpacity", 0.5);

        var series3 = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series 3",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value3",
            valueXField: "date",
            fill: am5.color(0x00FFF3),
            stroke: am5.color(0x00FFF3),
            tooltip: am5.Tooltip.new(root, {
                labelText: "{value3}"
            })
        }));

        series3.strokes.template.setAll({
            strokeWidth: 2
        });

        series3.get("tooltip").get("background").set("fillOpacity", 0.5);

        // series3.get("tooltip").get("background").set("fillOpacity", 0.5);

        var series4 = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series 4",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value4",
            valueXField: "date",
            fill: am5.color(0xFB00FF),
            stroke: am5.color(0xFB00FF),
            tooltip: am5.Tooltip.new(root, {
                labelText: "{value4}"
            })
        }));

        series4.strokes.template.setAll({
            strokeWidth: 1.5
        });

        series4.get("tooltip").get("background").set("fillOpacity", 0.5);

        // series4.get("tooltip").get("background").set("fillOpacity", 0.5);

        // Set date fields
        // https://www.amcharts.com/docs/v5/concepts/data/#Parsing_dates
        root.dateFormatter.setAll({
            dateFormat: "yyyy-MM-dd",
            dateFields: ["valueX"]
        });


        // Set data
        var data = [{
            date: new Date(2019, 4, 12).getTime() + 5 * 60 * 1000,
            value1: 9,
            value2: 54,
            value3: 39,
            value4: 100,
            previousDate: new Date(2019, 5, 5)
        }, {
            date: new Date(2019, 4, 12).getTime() + 10 * 60 * 1000,
            value1: 25,
            value2: 86,
            value3: 80,
            value4: 134,
            previousDate: "2019-05-06"
        }, {
            date: new Date(2019, 4, 12).getTime() + 15 * 60 * 1000,
            value1: 64,
            value2: 135,
            value3: 110,
            value4: 157,
            previousDate: "2019-05-07"
        }, {
            date: new Date(2019, 4, 12).getTime() + 20 * 60 * 1000,
            value1: 42,
            value2: 100,
            value3: 183,
            value4: 169,
            previousDate: "2019-05-08"
        }, {
            date: new Date(2019, 4, 12).getTime() + 25 * 60 * 1000,
            value1: 90,
            value2: 90,
            value3: 147,
            value4: 191,
            previousDate: "2019-05-09"
        }, {
            date: new Date(2019, 4, 12).getTime() + 30 * 60 * 1000,
            value1: 87,
            value2: 36,
            value3: 158,
            value4: 179,
            previousDate: "2019-05-10"
        }, {
            date: new Date(2019, 4, 12).getTime() + 35 * 60 * 1000,
            value1: 59,
            value2: 98,
            value3: 136,
            value4: 187,
            previousDate: "2019-05-11"
        }]

        series.data.setAll(data);
        series2.data.setAll(data);
        series3.data.setAll(data);
        series4.data.setAll(data);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        series2.appear(1000);
        series3.appear(1000);
        series4.appear(1000);
        // chart.appear(1000, 100);
    </script>
@endpush

