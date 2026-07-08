@extends('admin.layouts.main')

@section('content')
<div class="space-y-8">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between border-b border-admin pb-6 gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="text-[10px] font-mono tracking-widest uppercase bg-admin-raised px-2 py-0.5 rounded text-[#10b981] border border-admin">Dashboard</span>
                <span class="text-xs font-mono text-admin-muted-soft">System Status: Connected</span>
            </div>
            <h1 class="text-2xl font-black tracking-tight text-admin-fg mt-1">Dashboard Overview</h1>
        </div>

        <div class="text-right font-mono text-xs text-admin-muted">
            Live Data: <span class="text-admin-fg">Active</span>
        </div>
    </div>

    @php
        // 1. Calculate Active Users within past 24 Hours
        $recentRuns = $quizzRuns->filter(function ($attempt) {
            return $attempt->created_at >= now()->subHours(24);
        });
        
        // 2. Compute dynamic Category Distribution Matrix from Database Pool
        $totalQuestionsCount = count($activeQuestions);
        $categoryCounts = $activeQuestions->groupBy('category')->map(fn($group) => count($group));
        
        // 3. Dynamic Success & Completion Ratios Computation
        $totalRunsCount = count($quizzRuns);
        $passedCount = count($passed);
        $failedCount = count($failed);
        $totalEvaluated = $passedCount + $failedCount;
        
        $successRate = $totalEvaluated > 0 ? number_format(($passedCount / $totalEvaluated) * 100, 1) : '0.0';
        $dropRatio = $totalEvaluated > 0 ? number_format(($failedCount / $totalEvaluated) * 100, 1) : '0.0';
    @endphp

    <section class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="p-6 bg-admin-raised border border-admin rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-admin-muted uppercase tracking-wider">Total Users</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-admin-fg">{{ count($totalUsers) }}</p>
                <span class="text-xs font-mono text-[#10b981]">Active</span>
            </div>
            <p class="text-[10px] text-admin-muted-soft mt-2 font-mono">Active within 24hrs: {{ count($recentRuns) }}</p>
        </div>

        <div class="p-6 bg-admin-raised border border-admin rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-admin-muted uppercase tracking-wider">Total Questions</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-admin-fg">{{ $totalQuestionsCount }}</p>
                <span class="text-xs font-mono text-admin-muted-soft">Items</span>
            </div>
            <p class="text-[10px] text-admin-muted-soft mt-2 font-mono">Across {{ $categoryCounts->count() }} Active Categories</p>
        </div>

        <div class="p-6 bg-admin-raised border border-admin rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-admin-muted uppercase tracking-wider">Total Quiz Attempts</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-[#3b82f6]">{{ $totalRunsCount }}</p>
            </div>
            <p class="text-[10px] text-admin-muted-soft mt-2 font-mono">Success Rate: {{ $successRate }}%</p>
        </div>

        <div class="p-6 bg-admin-raised border border-admin rounded-2xl relative overflow-hidden group">
            <p class="text-xs font-mono text-admin-muted uppercase tracking-wider">Average Score</p>
            <div class="flex items-baseline gap-2 mt-2">
                <p class="text-4xl font-black text-[#10b981]">{{ number_format($globalAvrgScore, 1) }}%</p>
                <span class="text-xs font-mono text-admin-muted-soft">Mean</span>
            </div>
            <p class="text-[10px] text-admin-muted-soft mt-2 font-mono">Overall performance</p>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="p-6 bg-admin-secondary border border-admin rounded-2xl space-y-4">
            <div>
                <h3 class="text-sm font-bold text-admin-fg">Question Pool Distribution</h3>
                <p class="text-xs text-admin-muted font-mono">Questions grouped by category</p>
            </div>

            <div class="space-y-3.5 pt-2">
                @forelse($categoryCounts as $categoryName => $count)
                    @php
                        $percentage = $totalQuestionsCount > 0 ? ($count / $totalQuestionsCount) * 100 : 0;
                    @endphp
                    <div>
                        <div class="flex justify-between text-xs font-mono mb-1 text-admin-muted">
                            <span class="capitalize">{{ str_replace(['-', '_'], ' ', $categoryName) }}</span>
                            <span class="text-admin-fg font-bold">{{ $count }} {{ Str::plural('Question', $count) }} ({{ number_format($percentage, 0) }}%)</span>
                        </div>
                        <div class="w-full h-1 bg-admin-raised rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#3b82f6] to-indigo-500 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs font-mono text-admin-muted-soft">No distribution data available.</p>
                @endforelse
            </div>
        </div>

        <div class="p-6 bg-admin-secondary border border-admin rounded-2xl flex flex-col justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-admin-fg">Global Outcome Metrics</h3>
                <p class="text-xs text-admin-muted font-mono">Pass/fail ratios for all completed quizzes</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 bg-admin-raised border border-admin rounded-xl text-center">
                    <p class="text-[10px] font-mono text-admin-muted uppercase tracking-wider">Passed</p>
                    <p class="text-2xl font-black text-[#10b981] mt-1">{{ $passedCount }}</p>
                    <span class="text-[10px] font-mono text-admin-muted-soft block mt-1">{{ $successRate }}% Success Rate</span>
                </div>

                <div class="p-4 bg-admin-raised border border-admin rounded-xl text-center">
                    <p class="text-[10px] font-mono text-admin-muted uppercase tracking-wider">Failed</p>
                    <p class="text-2xl font-black text-rose-500 mt-1">{{ $failedCount }}</p>
                    <span class="text-[10px] font-mono text-admin-muted-soft block mt-1">{{ $dropRatio }}% Failure Rate</span>
                </div>
            </div>

            <div class="p-3 bg-admin-raised border border-admin rounded-xl text-[11px] font-mono text-admin-muted flex items-center gap-2">
                <span class="w-2 h-2 rounded-full @if($dropRatio > 25) bg-rose-500 animate-pulse @else bg-[#3b82f6] @endif"></span>
                <span>
                    @if($dropRatio > 25)
                        Failure rate is above normal. Review quiz settings.
                    @else
                        System is running normally.
                    @endif
                </span>
            </div>
        </div>

    </section>

</div>
@endsection