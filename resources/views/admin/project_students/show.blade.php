@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Details Project</p>
                    </div>
                   </div>
                </div>
            
                <div class="py-12">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-[#e3e2de] overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                            <div class="flex flex-row gap-x-10">
                                <img src="{{asset('images/icons/job.svg')}}" alt="icon">
                                <div class="flex flex-col gap-y-10">
                                    
                                    <div>
                                        <p class="text-slate-500 text-sm">Student</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->user->name }}</h3>
                                    </div>    
                                    <div>
                                        <p class="text-slate-500 text-sm">Nama Kelompok</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->name_team }}</h3>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">Jabatan dalam Tim</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->occupation->name }}</h3>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">Tema Proyek</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->title_project }}</h3>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">Deskripsi</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->desc_project }}</h3>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">File Proyek</p>
                                        @if($projectStudent)
                                            <h3 class="text-indigo-950 text-xl font-bold"><a href="{{ Storage::url($projectStudent->proof_project) }}" target="_blank">Unduh Proyek</a></h3>
                                        @else
                                            <h3 class="text-indigo-950 text-xl font-bold">Belum ada file yang diunggah.</h3>
                                        @endif
                                        
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">Deadline</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($projectStudent->deadline)->format('F j, Y') }}</h3>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 text-sm">Created At</p>
                                        <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($projectStudent->created_at)->format('F j, Y') }}</h3>
                                    </div>

                                    <p class="text-slate-500 text-sm">Status</p>
                                    @if($projectStudent->is_done)
                                        <h3 class="text-[#39A611] text-xl font-bold">Sudah Direview</h3>
                                    @else
                                        <h3 class="text-[#F60B0B] text-xl font-bold">Pending</h3>
                        
                                    <form action="{{ route('dashboard.project_students.update', $projectStudent) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                            Approve Project
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>        
        </div>
@endsection