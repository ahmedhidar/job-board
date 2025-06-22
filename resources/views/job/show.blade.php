<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job->id)]"/>
    <x-job-card :$job>
    <p class="mb-4 text-sm text-slate-500">
      {!! nl2br(e($job->description)) !!}
    </p>
  </x-job-card>
        
   
</x-layout>