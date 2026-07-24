@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('title', 'Laporan Transaksi')

@section('content')

    <div class="order-page">

        <div class="page-header">

            <div>

                <h1>Laporan Transaksi</h1>

                <p>
                    Kelola seluruh transaksi penjualan toko.
                </p>

            </div>

            <div>

                <a href="#" class="btn-primary">

                    <i data-lucide="download"></i>

                    Export

                </a>

            </div>

        </div>
        <form method="GET" class="filter-card">

            <div class="filter-grid">

                <div class="form-group">

                    <label>Periode</label>

                    <select name="range" onchange="this.form.submit()">

                        <option value="1" {{ $range == 1 ? 'selected' : '' }}>
                            Hari Ini
                        </option>

                        <option value="2" {{ $range == 2 ? 'selected' : '' }}>
                            2 Hari
                        </option>

                        <option value="7" {{ $range == 7 ? 'selected' : '' }}>
                            7 Hari
                        </option>

                        <option value="14" {{ $range == 14 ? 'selected' : '' }}>
                            14 Hari
                        </option>

                        <option value="30" {{ $range == 30 ? 'selected' : '' }}>
                            30 Hari
                        </option>

                        <option value="90" {{ $range == 90 ? 'selected' : '' }}>
                            90 Hari
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Dari</label>

                    <input type="date" name="start_date" value="{{ $start_date }}">

                </div>

                <div class="form-group">

                    <label>Sampai</label>

                    <input type="date" name="end_date" value="{{ $end_date }}">

                </div>

                <div class="form-group">

                    <button class="btn-primary">

                        Terapkan

                    </button>

                </div>

            </div>

        </form>
        <div class="summary-grid">

            <div class="summary-card">

                <div class="summary-icon emerald">

                    <i data-lucide="wallet"></i>

                </div>

                <div>

                    <small>Total Pendapatan</small>

                    <h3>

                        Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}

                    </h3>

                </div>

            </div>

            <div class="summary-card">

                <div class="summary-icon green">

                    <i data-lucide="banknote"></i>

                </div>

                <div>

                    <small>Cash</small>

                    <h3>

                        Rp {{ number_format($summary['total_cash'], 0, ',', '.') }}

                    </h3>

                </div>

            </div>

            <div class="summary-card">

                <div class="summary-icon blue">

                    <i data-lucide="landmark"></i>

                </div>

                <div>

                    <small>Transfer</small>

                    <h3>

                        Rp {{ number_format($summary['total_transfer'], 0, ',', '.') }}

                    </h3>

                </div>

            </div>

            <div class="summary-card">

                <div class="summary-icon orange">

                    <i data-lucide="receipt"></i>

                </div>

                <div>

                    <small>Transaksi</small>

                    <h3>

                        {{ number_format($summary['total_order']) }}

                    </h3>

                </div>

            </div>

            <div class="summary-card">

                <div class="summary-icon purple">

                    <i data-lucide="shopping-cart"></i>

                </div>

                <div>
                    <small>Item Terjual</small>
                    <h3>
                        {{ number_format($summary['total_item']) }}
                    </h3>
                </div>



            </div>
            <div class="summary-card">

                <div class="summary-icon red">

                    <i data-lucide="chart-column"></i>

                </div>

                <div>

                    <small>Rata-rata Transaksi</small>

                    <h3>

                        Rp {{ number_format($summary['average_order'], 0, ',', '.') }}

                    </h3>

                </div>

            </div>

        </div>
    </div>

    {{-- =========================
    CHART
========================= --}}
    <div class="report-grid">

        <div class="report-card">

            <div class="card-header">

                <div>

                    <h3>Grafik Pendapatan</h3>

                    <small>{{ $range }} Hari Terakhir</small>

                </div>

            </div>

            <canvas id="salesChart" height="120"></canvas>

        </div>

        <div class="report-card">

            <div class="card-header">

                <div>

                    <h3>Metode Pembayaran</h3>

                    <small>Cash vs Transfer</small>

                </div>

            </div>

            <canvas id="paymentChart" height="240"></canvas>

        </div>

    </div>

    {{-- =========================
    TABLE
========================= --}}

    <div class="table-card">

        <div class="table-header">

            <h3>Riwayat Transaksi</h3>

            <span>

                {{ $orders->total() }} transaksi

            </span>

        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Invoice</th>

                        <th>Tanggal</th>

                        <th>Kasir</th>

                        <th>Customer</th>

                        <th>Pembayaran</th>

                        <th>Item</th>

                        <th>Total</th>

                        <th></th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)
                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                INV{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($order->transaction_time)->format('d M Y H:i') }}

                            </td>

                            <td>

                                {{ $order->nama_kasir }}

                            </td>

                            <td>

                                {{ $order->customer_name ?: '-' }}

                            </td>

                            <td>

                                @if (strtolower($order->payment_method) == 'cash')
                                    <span class="badge badge-cash">

                                        Cash

                                    </span>
                                @else
                                    <span class="badge badge-transfer">

                                        Transfer

                                    </span>
                                @endif

                            </td>

                            <td>

                                {{ $order->total_item }}

                            </td>

                            <td>

                                <strong>

                                    Rp {{ number_format($order->payment_amount, 0, ',', '.') }}

                                </strong>

                            </td>

                            <td>

                                <button class="btn-icon" data-id="{{ $order->id }}">

                                    <i data-lucide="eye"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" style="text-align:center;padding:40px">

                                Belum ada transaksi.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="table-footer">

            {{ $orders->links() }}

        </div>

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            new Chart(document.getElementById('paymentChart'), {

                type: 'doughnut',

                data: {

                    labels: ['Cash', 'Transfer'],

                    datasets: [{

                        data: [
                            {{ $summary['total_cash'] }},
                            {{ $summary['total_transfer'] }}
                        ],

                        backgroundColor: [
                            '#16a34a',
                            '#2563eb'
                        ],

                        borderWidth: 0

                    }]

                },

                options: {
                    

                    plugins: {

                        legend: {
                            position: 'bottom'
                        }

                    }

                }

            });

            new Chart(document.getElementById('salesChart'), {

                type: 'bar',

                data: {

                    labels: @json($chartData->pluck('trx_date')),

                    datasets: [{

                        data: @json($chartData->pluck('total')),

                    }]

                },

                options: {

                    plugins: {

                        legend: {

                            display: false

                        }

                    },

                    responsive: true

                }

            });

            lucide.createIcons();
        </script>
    @endpush

@endsection
