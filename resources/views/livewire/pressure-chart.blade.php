<div class="flex relative w-full border-2 border-blue-600 rounded-lg h-60">
    @php
        $graphDataPressures = $pressureRecords->where('pressure_type', 'P1');
        $pressureValues = [];
        foreach ($graphDataPressures as $value) {
            $pressureValues[] = $value->pressure_value;
        }
    @endphp

    <div class="absolute left-4 -top-4 font-medium text-sm text-white bg-blue-600 px-3 py-1 rounded-lg">
        {{ __('Pressure') }}
    </div>
    <div class="flex flex-col w-1/2 lg:flex-row items-center gap-4 p-4">
        <div class="w-full flex justify-center">
            <div id="chartdiv" class="chart"></div>
        </div>
        <div class="w-full flex justify-center">
            <div id="chartdiv2" class="chart"></div>
        </div>
        <div class="w-full flex justify-center">
            <div id="chartdiv3" class="chart"></div>
        </div>
        <div class="w-full flex justify-center">
            <div id="chartdiv4" class="chart"></div>
        </div>
    </div>

    <div class="flex flex-col w-1/2 lg:flex-row justify-center items-center gap-4 p-4">
        <div class="w-full flex justify-center">
            <div id="lineChartPressure" class="chart"></div>
        </div>
    </div>

    @push('scripts')
        {{-- For pressure1 --}}
        <script>
            // Create root and chart
            var root = am5.Root.new("chartdiv");

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
                text: "Pressure 1",
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
            var handDataItem = axis.makeDataItem({
                value: 0
            });

            var hand = handDataItem.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: am5radar.ClockHand.new(root, {
                    radius: am5.percent(99),
                    innerRadius: am5.percent(0),
                    topWidth: 0,
                    bottomWidth: 5,
                    pinRadius: 5,
                })
            }));

            axis.createAxisRange(handDataItem);

            handDataItem.get("grid").set("visible", false);
            handDataItem.get("tick").set("visible", false);

            setInterval(() => {
                handDataItem.animate({
                    key: "value",
                    to: {{ $pressureRecords->where('pressure_type', 'P1')->last()->pressure_value }},
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
                html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $pressureRecords->where('pressure_type', 'P1')->last()->pressure_value }}</b></p></div>",
                x: am5.percent(50),
                centerX: am5.percent(50),
                paddingTop: 70,
                paddingBottom: 0
            }));
        </script>

        {{-- For pressure2 --}}
        <script>
            // Create root and chart
            var root = am5.Root.new("chartdiv2");

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
                text: "Pressure 2",
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
            var handDataItemPressure2 = axis.makeDataItem({
                value: 0
            });

            var hand = handDataItemPressure2.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: am5radar.ClockHand.new(root, {
                    radius: am5.percent(99),
                    innerRadius: am5.percent(0),
                    topWidth: 0,
                    bottomWidth: 5,
                    pinRadius: 5,
                })
            }));

            axis.createAxisRange(handDataItemPressure2);

            handDataItemPressure2.get("grid").set("visible", false);
            handDataItemPressure2.get("tick").set("visible", false);

            setInterval(() => {
                handDataItemPressure2.animate({
                    key: "value",
                    to: {{ $pressureRecords->where('pressure_type', 'P2')->last()->pressure_value }},
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
                html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $pressureRecords->where('pressure_type', 'P2')->last()->pressure_value }}</b></p></div>",
                x: am5.percent(50),
                centerX: am5.percent(50),
                paddingTop: 70,
                paddingBottom: 0
            }));
        </script>

        {{-- For pressure3 --}}
        <script>
            // Create root and chart
            var root = am5.Root.new("chartdiv3");

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
                text: "Pressure 3",
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
            var handDataItemPressure3 = axis.makeDataItem({
                value: 0
            });

            var hand = handDataItemPressure3.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: am5radar.ClockHand.new(root, {
                    radius: am5.percent(99),
                    innerRadius: am5.percent(0),
                    topWidth: 0,
                    bottomWidth: 5,
                    pinRadius: 5,
                })
            }));

            axis.createAxisRange(handDataItemPressure3);

            handDataItemPressure3.get("grid").set("visible", false);
            handDataItemPressure3.get("tick").set("visible", false);

            setInterval(() => {
                handDataItemPressure3.animate({
                    key: "value",
                    to: {{ $pressureRecords->where('pressure_type', 'P3')->last()->pressure_value }},
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
                html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $pressureRecords->where('pressure_type', 'P3')->last()->pressure_value }}</b></p></div>",
                x: am5.percent(50),
                centerX: am5.percent(50),
                paddingTop: 70,
                paddingBottom: 0
            }));
        </script>

        {{-- For pressure4 --}}
        <script>
            // Create root and chart
            var root = am5.Root.new("chartdiv4");

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
                text: "Pressure 4",
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
            var handDataItemPressure4 = axis.makeDataItem({
                value: 0
            });

            var hand = handDataItemPressure4.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: am5radar.ClockHand.new(root, {
                    radius: am5.percent(99),
                    innerRadius: am5.percent(0),
                    topWidth: 0,
                    bottomWidth: 5,
                    pinRadius: 5,
                })
            }));

            axis.createAxisRange(handDataItemPressure4);

            handDataItemPressure4.get("grid").set("visible", false);
            handDataItemPressure4.get("tick").set("visible", false);

            setInterval(() => {
                handDataItemPressure4.animate({
                    key: "value",
                    to: {{ $pressureRecords->where('pressure_type', 'P4')->last()->pressure_value }},
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
                html: "<div style=\"text-align: center;\"><p style=\"font-size: 14px;\"><b>{{ $pressureRecords->where('pressure_type', 'P4')->last()->pressure_value }}</b></p></div>",
                x: am5.percent(50),
                centerX: am5.percent(50),
                paddingTop: 70,
                paddingBottom: 0
            }));
        </script>

        {{-- lineChartPressure --}}
        <script>

            var pressureValues = {!! json_encode($pressureValues) !!};
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("lineChartPressure");


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
                max: 100,
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
                dateFormat: "m",
                dateFields: ["valueX"]
            });


            // Set data
            var data = [{
                date: new Date(2019, 4, 12).getTime() + 5 * 60 * 1000,

                value1: 76,
                value2: 54,
                value3: 39,
                value4: 100,
            }, {
                date: new Date(2019, 4, 12).getTime() + 10 * 60 * 1000,
                value1: 25,
                value2: 86,
                value3: 80,
                value4: 34,
            }, {
                date: new Date(2019, 4, 12).getTime() + 15 * 60 * 1000,
                value1: 64,
                value2: 35,
                value3: 10,
                value4: 57,
            }, {
                date: new Date(2019, 4, 12).getTime() + 20 * 60 * 1000,
                value1: 42,
                value2: 10,
                value3: 83,
                value4: 69,
            }, {
                date: new Date(2019, 4, 12).getTime() + 25 * 60 * 1000,
                value1: 90,
                value2: 90,
                value3: 47,
                value4: 91,
            }, {
                date: new Date(2019, 4, 12).getTime() + 30 * 60 * 1000,
                value1: 87,
                value2: 36,
                value3: 58,
                value4: 79,
            }, {
                date: new Date(2019, 4, 12).getTime() + 35 * 60 * 1000,
                value1: 45,
                value2: 98,
                value3: 36,
                value4: 87,
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
</div>

