@extends('layouts.app')

@section('title','Dashboard')

@section('styles')
    @vite(['resources/css/views/dashboard.css'])
@endsection

@section('content')
    <div class="stack">
        <div class="cards-grid">
            <div class="stat-card">
                <div class="text-sm" style="color:var(--muted)">Total Documents</div>
                <div style="font-size:1.5rem;font-weight:600;margin-top:8px">24</div>
            </div>
            <div class="stat-card">
                <div class="text-sm" style="color:var(--muted)">Translations This Month</div>
                <div style="font-size:1.5rem;font-weight:600;margin-top:8px">12</div>
            </div>
            <div class="stat-card">
                <div class="text-sm" style="color:var(--muted)">Words Translated</div>
                <div style="font-size:1.5rem;font-weight:600;margin-top:8px">45,280</div>
            </div>
        </div>

        <div class="table-card">
            <h2 class="card-title">Recent Translations</h2>
            <div style="margin-top:8px;color:var(--muted);font-size:0.95rem">(Sample list)</div>
            <div style="margin-top:12px;overflow-x:auto">
                <table class="table">
                    <thead style="color:var(--muted);font-size:0.78rem;text-transform:uppercase">
                        <tr>
                            <th>Document</th>
                            <th>Languages</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-top">
                            <td>Mother Tongue-Based</td>
                            <td>Ceb -> Tgl, Eng</td>
                            <td>Mar 8, 2026</td>
                            <td class="text-success">Completed</td>
                        </tr>
                        <tr class="border-top">
                            <td>Comparative Study</td>
                            <td>Ceb -> Eng</td>
                            <td>Mar 6, 2026</td>
                            <td class="text-warning">In Progress</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
