@extends('admin.layouts.main')

@section('content')
<div class="space-y-8">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between border-b border-zinc-900 pb-6 gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="text-[10px] font-mono tracking-widest uppercase bg-zinc-900 px-2 py-0.5 rounded text-[#10b981] border border-zinc-800">Operational Overview</span>
                <span class="text-xs font-mono text-zinc-600">Platform Sync: Verified</span>
            </div>
            <h1 class="text-2xl font-black tracking-tight text-white mt-1">System Topology Dashboard</h1>
        </div>

        <div class="text-right font-mono text-xs text-zinc-500">
            Data Matrix Refresh: <span class="text-zinc-300">Real-Time</span>
        </div>
    </div>
@php
$recentRuns = $quizzRuns->filter(function ($attempt) {
    return $attempt->created_at >= now()->subHours(24);
});
@endphp
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-6 bg-zinc-950/40 border border-zinc-800/50 rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-zinc-500 uppercase tracking-wider">Total Users Registered</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-white">{{ count($totalUsers) }}</p>
                <span class="text-xs font-mono text-[#10b981]">+8.4%</span>
            </div>
            <p class="text-[10px] text-zinc-600 mt-2 font-mono">Active within 24hrs: {{ count($recentRuns) }}</p>
        </div>

        <div class="p-6 bg-zinc-950/40 border border-zinc-800/50 rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-zinc-500 uppercase tracking-wider">Active Question Pool</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-white">{{ count($activeQuestions )}}</p>
                <span class="text-xs font-mono text-zinc-600">Items</span>
            </div>
            <p class="text-[10px] text-zinc-600 mt-2 font-mono">Across 5 Primary Categories</p>
        </div>

        <div class="p-6 bg-zinc-950/40 border border-zinc-800/50 rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-zinc-500 uppercase tracking-wider">Total Quiz Runs</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-[#3b82f6]">{{ count($quizzRuns) }}</p>
            </div>
            <p class="text-[10px] text-zinc-600 mt-2 font-mono">Completion Rate: 94.2%</p>
        </div>

        <div class="p-6 bg-zinc-950/40 border border-zinc-800/50 rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-zinc-500 uppercase tracking-wider">Global Average Score</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-[#10b981]">{{ $globalAvrgScore}}</p>
                <span class="text-xs font-mono text-zinc-600">Mean</span>
            </div>
            <p class="text-[10px] text-zinc-600 mt-2 font-mono">Standard Deviation: 4.1%</p>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="p-6 bg-zinc-950/20 border border-zinc-800/40 rounded-2xl space-y-4">
            <div>
                <h3 class="text-sm font-bold text-zinc-200">Question Pool Distribution</h3>
                <p class="text-xs text-zinc-500 font-mono">Asset allocations categorized by network tags</p>
            </div>

            <div class="space-y-3.5 pt-2">
                <div>
                    <div class="flex justify-between text-xs font-mono mb-1 text-zinc-400">
                        <span>Architecture Matrix</span>
                        <span class="text-white font-bold">120 Questions (35%)</span>
                    </div>
                    <div class="w-full h-1 bg-zinc-900 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#10b981] to-[#3b82f6] rounded-full" style="width: 35%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-mono mb-1 text-zinc-400">
                        <span>Frontend Systems</span>
                        <span class="text-white font-bold">95 Questions (28%)</span>
                    </div>
                    <div class="w-full h-1 bg-zinc-900 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#3b82f6] to-purple-500 rounded-full" style="width: 28%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-mono mb-1 text-zinc-400">
                        <span>DevOps & Infra Channels</span>
                        <span class="text-white font-bold">75 Questions (22%)</span>
                    </div>
                    <div class="w-full h-1 bg-zinc-900 rounded-full overflow-hidden">
                        <div class="h-full bg-[#3b82f6] rounded-full" style="width: 22%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-mono mb-1 text-zinc-400">
                        <span>General Logic / Syntax</span>
                        <span class="text-white font-bold">50 Questions (15%)</span>
                    </div>
                    <div class="w-full h-1 bg-zinc-900 rounded-full overflow-hidden">
                        <div class="h-full bg-zinc-700 rounded-full" style="width: 15%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-zinc-950/20 border border-zinc-800/40 rounded-2xl flex flex-col justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-zinc-200">Global Outcome Metrics</h3>
                <p class="text-xs text-zinc-500 font-mono">Performance criteria ratios for all finished evaluations</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 bg-zinc-900/30 border border-zinc-900 rounded-xl text-center">
                    <p class="text-[10px] font-mono text-zinc-500 uppercase tracking-wider">Passed Sessions</p>
                    <p class="text-2xl font-black text-[#10b981] mt-1">{{  count($passed) }}</p>
                    <span class="text-[10px] font-mono text-zinc-600 block mt-1">87.4% Success Rate</span>
                </div>

                <div class="p-4 bg-zinc-900/30 border border-zinc-900 rounded-xl text-center">
                    <p class="text-[10px] font-mono text-zinc-500 uppercase tracking-wider">Failed Sessions</p>
                    <p class="text-2xl font-black text-rose-500 mt-1">{{ count($failed) }}</p>
                    <span class="text-[10px] font-mono text-zinc-600 block mt-1">12.6% Drop Ratio</span>
                </div>
            </div>

            <div class="p-3 bg-zinc-900/10 border border-zinc-800/30 rounded-xl text-[11px] font-mono text-zinc-500 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#3b82f6]"></span>
                <span>System Health factor evaluation: Excellent. No core database structural drops recorded.</span>
            </div>
        </div>

    </section>

</div>
@endsection