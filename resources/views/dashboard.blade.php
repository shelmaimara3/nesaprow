@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px]">
                    <input type="hidden" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none">
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center">
                        </a>
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Hello</p>
                            <p class="font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        
                        <p class="font-extrabold text-[30px] leading-[45px]">{{ Auth::user()->hasRole('teacher') ? __('Teacher Dashboard') : __('Dashboard') }}</p>
                        
                    </div>
                </div>

                <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                    
                @role('teacher')
                <div class="item-card flex flex-col gap-y-10 md:flex-row justify-between items-center">
                    <div class="flex flex-col gap-y-3">
                        <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M22 7.81V16.19C22 19.83 19.83 22 16.19 22H7.81C4.17 22 2 19.83 2 16.19V7.81C2 7.3 2.04 6.81 2.13 6.36C2.64 3.61 4.67 2.01 7.77 2H16.23C19.33 2.01 21.36 3.61 21.87 6.36C21.96 6.81 22 7.3 22 7.81Z" fill="#292D32"/>
                            <path d="M22 7.81V7.86H2V7.81C2 7.3 2.04 6.81 2.13 6.36H7.77V2H9.27V6.36H14.73V2H16.23V6.36H21.87C21.96 6.81 22 7.3 22 7.81Z" fill="#292D32"/>
                            <path d="M14.4391 12.7198L12.3591 11.5198C11.5891 11.0798 10.8491 11.0198 10.2691 11.3498C9.68914 11.6798 9.36914 12.3598 9.36914 13.2398V15.6398C9.36914 16.5198 9.68914 17.1998 10.2691 17.5298C10.5191 17.6698 10.7991 17.7398 11.0891 17.7398C11.4891 17.7398 11.9191 17.6098 12.3591 17.3598L14.4391 16.1598C15.2091 15.7198 15.6291 15.0998 15.6291 14.4298C15.6291 13.7598 15.1991 13.1698 14.4391 12.7198Z" fill="#292D32"/>
                            </svg>
                            
                        <div>
                            <p class="text-slate-500 text-sm">Courses</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$courses}}</h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-3">
                        <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M21.9897 6.01996C22.0097 6.25996 21.9897 6.50995 21.9297 6.75995L18.5597 20.2899C18.3197 21.2999 17.4198 21.9999 16.3798 21.9999H3.23974C1.72974 21.9999 0.659755 20.5199 1.09976 19.0699L5.30975 5.53992C5.59975 4.59992 6.46976 3.95996 7.44976 3.95996H19.7498C20.7097 3.95996 21.4898 4.52996 21.8198 5.32996C21.9198 5.53996 21.9697 5.77996 21.9897 6.01996Z" fill="#292D32"/>
                            <path d="M22.9908 19.62C23.0908 20.91 22.0709 22 20.7809 22H16.3809C17.4209 22 18.3209 21.3 18.5609 20.29L21.9308 6.76001C21.9908 6.51001 22.0108 6.26002 21.9908 6.02002L22.0009 6L22.9908 19.62Z" fill="#292D32"/>
                            <path d="M9.67977 7.12989C9.61977 7.12989 9.55977 7.11987 9.49977 7.10987C9.09977 7.00987 8.84979 6.6099 8.94979 6.1999L9.98976 1.87989C10.0898 1.47989 10.4898 1.2399 10.8998 1.3299C11.2998 1.4299 11.5498 1.82987 11.4498 2.23987L10.4098 6.55988C10.3298 6.89988 10.0198 7.12989 9.67977 7.12989Z" fill="#292D32"/>
                            <path d="M16.3795 7.1398C16.3295 7.1398 16.2694 7.13978 16.2194 7.11978C15.8194 7.02978 15.5595 6.62977 15.6395 6.22977L16.5794 1.8898C16.6694 1.4798 17.0694 1.22978 17.4694 1.30978C17.8694 1.39978 18.1294 1.7998 18.0494 2.1998L17.1094 6.53976C17.0394 6.89977 16.7295 7.1398 16.3795 7.1398Z" fill="#292D32"/>
                            <path d="M15.6992 12.75H7.69922C7.28922 12.75 6.94922 12.41 6.94922 12C6.94922 11.59 7.28922 11.25 7.69922 11.25H15.6992C16.1092 11.25 16.4492 11.59 16.4492 12C16.4492 12.41 16.1092 12.75 15.6992 12.75Z" fill="#292D32"/>
                            <path d="M14.6992 16.75H6.69922C6.28922 16.75 5.94922 16.41 5.94922 16C5.94922 15.59 6.28922 15.25 6.69922 15.25H14.6992C15.1092 15.25 15.4492 15.59 15.4492 16C15.4492 16.41 15.1092 16.75 14.6992 16.75Z" fill="#292D32"/>
                            </svg>
                            
                        <div>
                            <p class="text-slate-500 text-sm">Categories</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$categories}}</h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-3">
                        <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z" fill="#292D32"/>
                            <path d="M14.0809 14.1499C11.2909 12.2899 6.74094 12.2899 3.93094 14.1499C2.66094 14.9999 1.96094 16.1499 1.96094 17.3799C1.96094 18.6099 2.66094 19.7499 3.92094 20.5899C5.32094 21.5299 7.16094 21.9999 9.00094 21.9999C10.8409 21.9999 12.6809 21.5299 14.0809 20.5899C15.3409 19.7399 16.0409 18.5999 16.0409 17.3599C16.0309 16.1299 15.3409 14.9899 14.0809 14.1499Z" fill="#292D32"/>
                            <path opacity="0.4" d="M19.9894 7.3401C20.1494 9.2801 18.7694 10.9801 16.8594 11.2101C16.8494 11.2101 16.8494 11.2101 16.8394 11.2101H16.8094C16.7494 11.2101 16.6894 11.2101 16.6394 11.2301C15.6694 11.2801 14.7794 10.9701 14.1094 10.4001C15.1394 9.4801 15.7294 8.1001 15.6094 6.6001C15.5394 5.7901 15.2594 5.0501 14.8394 4.4201C15.2194 4.2301 15.6594 4.1101 16.1094 4.0701C18.0694 3.9001 19.8194 5.3601 19.9894 7.3401Z" fill="#292D32"/>
                            <path d="M21.9902 16.5899C21.9102 17.5599 21.2902 18.3999 20.2502 18.9699C19.2502 19.5199 17.9902 19.7799 16.7402 19.7499C17.4602 19.0999 17.8802 18.2899 17.9602 17.4299C18.0602 16.1899 17.4702 14.9999 16.2902 14.0499C15.6202 13.5199 14.8402 13.0999 13.9902 12.7899C16.2002 12.1499 18.9802 12.5799 20.6902 13.9599C21.6102 14.6999 22.0802 15.6299 21.9902 16.5899Z" fill="#292D32"/>
                        </svg>
                        <div>
                            <p class="text-slate-500 text-sm">Students</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$students}}</h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-3">
                        <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 13C17.06 13 16.19 13.33 15.5 13.88C14.58 14.61 14 15.74 14 17C14 17.75 14.21 18.46 14.58 19.06C15.27 20.22 16.54 21 18 21C19.01 21 19.93 20.63 20.63 20C20.94 19.74 21.21 19.42 21.42 19.06C21.79 18.46 22 17.75 22 17C22 14.79 20.21 13 18 13ZM20.07 16.57L17.94 18.54C17.8 18.67 17.61 18.74 17.43 18.74C17.24 18.74 17.05 18.67 16.9 18.52L15.91 17.53C15.62 17.24 15.62 16.76 15.91 16.47C16.2 16.18 16.68 16.18 16.97 16.47L17.45 16.95L19.05 15.47C19.35 15.19 19.83 15.21 20.11 15.51C20.39 15.81 20.37 16.28 20.07 16.57Z" fill="#292D32"/>
                            <path opacity="0.4" d="M21.0901 21.5C21.0901 21.78 20.8701 22 20.5901 22H3.41016C3.13016 22 2.91016 21.78 2.91016 21.5C2.91016 17.36 6.99015 14 12.0002 14C13.0302 14 14.0302 14.14 14.9502 14.41C14.3602 15.11 14.0002 16.02 14.0002 17C14.0002 17.75 14.2101 18.46 14.5801 19.06C14.7801 19.4 15.0401 19.71 15.3401 19.97C16.0401 20.61 16.9702 21 18.0002 21C19.1202 21 20.1302 20.54 20.8502 19.8C21.0102 20.34 21.0901 20.91 21.0901 21.5Z" fill="#292D32"/>
                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="#292D32"/>
                            </svg>
                            
                        <div>
                            <p class="text-slate-500 text-sm">Teachers</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$teachers}}</h3>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="flex flex-col gap-1 mt-3 mb-auto">
                <p class="font-extrabold text-[30px] leading-[45px]">Riwayat Akses User</p>
            </div>
                <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                    <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                        <div class="flex shrink-0 w-[200px]">
                            <p class="text-[#7F8190]">Nama</p>
                        </div>
                        <div class="flex shrink-0 w-[150px]">
                            <p class="text-[#7F8190]">Waktu Login</p>
                        </div>
                        <div class="flex shrink-0 w-[150px]">
                            <p class="text-[#7F8190]">Waktu Logout</p>
                        </div>
                        <div class="flex shrink-0 w-[120px]">
                            <p class="text-[#7F8190]">Durasi</p>
                        </div>
                    </div>
                    @forelse($userLoginTimes as $userLoginTime)
                    <div class="list-items flex flex-nowrap justify-between pr-10">
                        <div class="flex shrink-0 w-[200px]">
                            
                        <div class="flex items-center gap-4">
                                <div class="flex flex-col gap-[2px]">
                                    <p class="font-bold text-lg">{{ $userLoginTime->user->name }}</p>
                                    <p class="font-bold text-sm">{{ $userLoginTime->user->email }}</p>
                                </div>
                        </div>
                        </div>
                        <div class="flex shrink-0 w-[150px] items-center justify-center">
                                    <p class="font-semibold">{{ \Carbon\Carbon::parse($userLoginTime->login_time)->setTimezone('Asia/Jakarta')->format('j F Y, H:i:s') }}</p>
                        </div>

                        <div class="flex shrink-0 w-[150px] items-center justify-center">
                                <p class="font-semibold">{{ \Carbon\Carbon::parse($userLoginTime->logout_time)->setTimezone('Asia/Jakarta')->format('j F Y, H:i:s') }}
                                </p>
                        </div>
                        <div class="flex shrink-0 w-[120px] items-center">
                            <div class="relative h-[30px]">
                                <div class="flex flex-col gap-[2px]">
                                    @php
                                        $loginTime = \Carbon\Carbon::parse($userLoginTime->login_time)->setTimezone('Asia/Jakarta');
                                        $logoutTime = \Carbon\Carbon::parse($userLoginTime->logout_time)->setTimezone('Asia/Jakarta');
                                        $duration = $loginTime->diffInMinutes($logoutTime);
                                        $hours = floor($duration / 60); // Menghitung jam
                                        $minutes = $duration % 60; // Menghitung sisa menit
                                        $formattedDuration = sprintf('%02d:%02d', $hours, $minutes);
                                    @endphp
                                    <p class="font-semibold">{{ $formattedDuration }} menit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>
                            belum ada riwayat login.
                        </p>
                    @endforelse
                    <div id="pagination" class="flex gap-4 items-center mt-[37px] px-5">
                        @if ($userLoginTimes->lastPage() > 1)
                            @for ($i = 1; $i <= $userLoginTimes->lastPage(); $i++)
                                <a href="{{ $userLoginTimes->url($i) }}" class="flex items-center justify-center border border-[#EEEEEE] rounded-full w-10 h-10 font-semibold transition-all duration-300 hover:text-white hover:bg-[#0A090B] text-[#7F8190] {{ $userLoginTimes->currentPage() == $i ? 'text-white bg-[#0A090B]' : '' }}">{{ $i }}</a>
                            @endfor
                        @endif
                    </div>
                </div>
                @endrole
            </div>
            
        </div>
@endsection

