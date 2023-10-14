<x-base>
    <div id="chart"></div>
    <script
        src="{{ asset('js/extensions/apexcharts/apexcharts.min.js') }}">
    </script>
    <script>
        var optionsProfileVisit = {
            annotations: { position: "back", },
            dataLabels: {
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#fff']
                    },
                    formatter: function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    },
                    offsetX: 0,
                    }
                },
                chart: { type: "bar", height: 300, },
                fill: { opacity: 1, },
                plotOptions: {
                    bar: {
                        horizontal: true,
                    },
                },
                series: [{
                    name: "hasil",
                    data: [
                        @foreach ($votes as $vote)
                            {{ $vote->hasil }},
                        @endforeach
                    ],

                },],
                colors: "#435ebe",
                xaxis: {
                    categories: [
                        @foreach ($votes as $vote)
                            "{{ $vote->name }}",
                        @endforeach
                    ],
                },
            }

            var chartProfileVisit = new ApexCharts(
                document.querySelector("#chart"),
                optionsProfileVisit
            )

            chartProfileVisit.render()

    </script>
</x-base>
