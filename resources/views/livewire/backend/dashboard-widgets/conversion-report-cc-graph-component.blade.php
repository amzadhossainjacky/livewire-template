<main>
    @if ($is_loading)
        <livewire:backend.placeholders.skeleton bars="10" />
    @endif
    <div id="admin_conversion_report_cc_by_booking_types_graph" wire:ignore></div>

    @push('dynamic_js')
        <script type="module">
            document.addEventListener("livewire:initialized", () => {

                Livewire.on("conversion_report_cc_graph_event_js", (event) => {
                    get_conversion_report_cc_graph_data(event[0]);
                });

                get_conversion_report_cc_graph_data();

                async function get_conversion_report_cc_graph_data(inputs = []) {

                    try {
                        let chart_container = document.querySelector(
                            "#admin_conversion_report_cc_by_booking_types_graph");

                        if (!chart_container)
                            throw 'Chart container not found in this page for conversion report CC'

                        let url = "{{ route('admin.dashboard.graphs.conversion_report_cc_graph') }}";

                        /** Append parameters to the URL */
                        if (inputs.start_date && inputs.end_date) {
                            const queryString = new URLSearchParams(inputs).toString();
                            url = `${url}?${queryString}`;
                        }

                        /** Api request options */
                        const options = {
                            method: "get",
                            mode: "cors",
                            headers: {
                                "Content-Type": "application/json",
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        };

                        const response = await fetch(url, options);
                        const result = await response.json();

                        if (result.success) {

                            Livewire.dispatch("conversion_report_cc_graph_component_event", [{
                                'is_loading': false
                            }]);



                            /** Generate Chart **/

                            var graph_options = {
                                series: result.data.counter,

                                xaxis: {
                                    type: 'category',
                                    categories: result.data.call_type,
                                },
                                chart: {
                                    type: 'bar',
                                    height: 365,
                                    stacked: true,
                                    toolbar: {
                                        show: true
                                    },
                                    zoom: {
                                        enabled: true
                                    }
                                },
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0
                                        }
                                    }
                                }],
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        borderRadius: 0,

                                    },
                                },

                                legend: {
                                    position: 'right',
                                    offsetY: 40
                                },
                                fill: {
                                    opacity: 1
                                }
                            };

                            var chart = new ApexCharts(chart_container, graph_options);
                            chart.render();

                            /** End: Generate Chart **/

                        }

                    } catch (error) {
                        console.log(error);
                    }


                }

            });
        </script>
    @endpush
</main>
