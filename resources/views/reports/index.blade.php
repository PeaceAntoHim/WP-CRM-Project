@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">CRM Reports</h2>

        <!-- Sales Funnel Chart -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-700">Sales Funnel</h3>
            <canvas id="funnelChart" class="mt-4"></canvas>
        </div>

        <!-- Customer Lifetime Value (LTV) Chart -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-700">Customer Lifetime Value (LTV)</h3>
            <canvas id="ltvChart" class="mt-4"></canvas>
        </div>

        <!-- Customer Segmentation Chart -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-700">Customer Segmentation</h3>
            <canvas id="segmentationChart" class="mt-4"></canvas>
        </div>
    </div>

    <script>
        // Funnel Data
        const funnelData = @json(array_values($funnelData->toArray()));
        const funnelLabels = @json(array_keys($funnelData->toArray()));

        const funnelChart = new Chart(document.getElementById('funnelChart'), {
            type: 'bar',
            data: {
                labels: funnelLabels,
                datasets: [{
                    label: 'Sales Funnel',
                    data: funnelData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                }]
            },
        });

        // Customer LTV Data
        const ltvData = {
            labels: @json($ltvData->pluck('contact.name')),
            datasets: [{
                label: 'Lifetime Value',
                data: @json($ltvData->pluck('lifetime_value')),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
            }]
        };

        const ltvChart = new Chart(document.getElementById('ltvChart'), {
            type: 'horizontalBar',
            data: ltvData,
        });

        // Customer Segmentation Data
        const segmentationData = @json(array_values($segmentationData));
        const segmentationLabels = ['High Value', 'Medium Value', 'Low Value'];

        const segmentationChart = new Chart(document.getElementById('segmentationChart'), {
            type: 'pie',
            data: {
                labels: segmentationLabels,
                datasets: [{
                    data: segmentationData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(201, 203, 207, 0.6)'
                    ],
                }]
            }
        });
    </script>
@endsection
