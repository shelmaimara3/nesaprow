@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Manage Students</p>
                    </div>
                    <a href="{{ route('dashboard.students.create') }}" class="h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Add New Student</a>
                </div>
            </div>

            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                    <div class="flex shrink-0 w-[300px]">
                        <p class="text-[#7F8190]">Name</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Date Created</p>
                    </div>
                    <div class="flex shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Action</p>
                    </div>
                </div>

                @forelse($students as $student)
                <div class="list-items flex flex-nowrap justify-between pr-10">
                    <div class="flex shrink-0 w-[300px]">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                                <img src="{{ Storage::url($student->user->avatar) }}" class="object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">{{ $student->user->name }}</p>
                                <p class="font-bold text-lg">{{ $student->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($student->created_at)->format('F j, Y') }}
                        </p>
                    </div>

                    <div class="flex shrink-0 w-[120px] items-center">
                        <div class="relative h-[41px]">
                                <form method="POST" action="{{ route('dashboard.students.destroy', $student) }}">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="flex items-center justify-between font-bold text-sm w-full text-[#FD445E]">
                                    Delete
                                </button>
                                </form>
                        </div>
                    </div>
                </div>
                @empty
                <p>
                    Murid belum tersedia.
                </p>
                @endforelse
                <div id="pagination" class="flex gap-4 items-center mt-[37px] px-5">
                    @if ($students->lastPage() > 1)
                        @for ($i = 1; $i <= $students->lastPage(); $i++)
                            <a href="{{ $students->url($i) }}" class="flex items-center justify-center border border-[#EEEEEE] rounded-full w-10 h-10 font-semibold transition-all duration-300 hover:text-white hover:bg-[#0A090B] text-[#7F8190] {{ $students->currentPage() == $i ? 'text-white bg-[#0A090B]' : '' }}">{{ $i }}</a>
                        @endfor
                    @endif
                </div>
            </div>

        </div>
@endsection

