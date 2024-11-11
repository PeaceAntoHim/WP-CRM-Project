@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold mb-6">CRM Reports</h2>

        <!-- Sales Funnel Chart -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold">Sales Funnel</h3>
            <canvas id="salesFunnelChart"></canvas>
        </div>

        <!-- Customer Lifetime Value Chart -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold">Customer Lifetime Value</h3>
            <canvas id="ltvChart"></canvas>
        </div>

        <!-- Customer Segmentation Chart -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold">Customer Segmentation</h3>
            <canvas id="segmentationChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales Funnel Chart
        const funnelData = @json($funnelData);
        const funnelChartCtx = document.getElementById('salesFunnelChart').getContext('2d');
        new Chart(funnelChartCtx, {
            type: 'bar',
            data: {
                labels: Object.keys(funnelData),
                datasets: [{
                    label: 'Sales Funnel',
                    data: Object.values(funnelData),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)'
                }]
            }
        });



        // Customer Lifetime Value Chart
        const ltvData = @json($ltvData);
        const ltvChartCtx = document.getElementById('ltvChart').getContext('2d');

        function generateRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const colors = ltvData.map(() => generateRandomColor());
        new Chart(ltvChartCtx, {
            type: 'pie',
            data: {
                labels: ltvData.map(l => l.contact.name),
                datasets: [{
                    label: 'Lifetime Value',
                    data: ltvData.map(l => l.lifetime_value),
                    backgroundColor: colors
                }]
            }
        });

        // Customer Segmentation Chart
        const segmentationData = @json($segmentationData);
        const segmentationChartCtx = document.getElementById('segmentationChart').getContext('2d');
        new Chart(segmentationChartCtx, {
            type: 'doughnut',
            data: {
                labels: ['High', 'Medium', 'Low'],
                datasets: [{
                    label: 'Customer Segmentation',
                    data: Object.values(segmentationData),
                    backgroundColor: ['#4BC0C0', '#FF9F40', '#FF6384']
                }]
            }
        });
    </script>
@endsection
