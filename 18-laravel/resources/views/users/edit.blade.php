@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
    @include('layouts.navbar')
    <main class="bg-[#154869] pt-20 bg-cover w-full min-h-[100dvh] flex flex-col justify-center items-center">
        <div class="bg-[#0006] md:w-10/12 w-full text-white p-10 rounded-lg flex flex-col justify-center items-center">
            <h1 class="text-2xl flex gap-2 items-center pb-2 border-b-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="#fff" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path></svg>
                Edit User

            </h1>

            {{-- Breadcrumbs --}}
            <div class="breadcrumbs text-sm mt-6">
                <ul>
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="#fff" viewBox="0 0 256 256"><path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('users') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="#fff" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                            Users Module
                        </a>
                    </li>
                    <li>
                        <span class="inline-flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="#fff" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path></svg>
                            edit User

                        </span>
                    </li>
                </ul>
            </div>

            {{-- Form --}}
            <form action="{{ url('users/'.$user->id) }}" class="my-4 flex flex-col gap-2" method="post" enctype="multipart/form-data" >

                @csrf
                @method('put')
                <div class="avatar mt-6 flex flex-col items-center gap-2">
                    <div id="upload" class="mask mask-squircle w-48 cursor-pointer hover:scale-110 transition-transform">
                        <img id="preview" src="{{ asset("images/".$user->photo) }}" />
                    </div>
                    <small class="font-bold text-gray-500 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z"></path></svg>
                        Uploap Photo
                    </small>
                </div>
                <input type="file" name="photo" id="photo" class="hidden" accept="image/*" />
                <input type="hidden" name="originphoto" value="{{ $user->photo }}"> 

                <div class="mt-4">
                    <label class="mt-4" for="">Document:</label>
                    <input type="text" name="document" placeholder="75678000" class="w-full input bg-[transparent] border-white" value="{{ old('document', $user->document) }}" />
                </div>
                <div>
                    <label class="mt-4" for="">Full Name:</label>
                    <input type="text" name="fullname" placeholder="Jhon Wick" class="w-full input bg-[transparent] border-white" value="{{ old('fullname', $user->fullname) }}"/>
                </div>
                <div>
                    <label class="mt-4" for="">Gender:</label>
                    <select name="gender" class="w-full select bg-[#154869] border-white">
                        <option value="">Select Gender...</option>
                        <option value="Female" @if (old('gender', $user->gender) == 'Female' ) selected @endif>Female</option>
                        <option value="Male" @if (old('gender', $user->gender) == 'Male' ) selected @endif>Male</option>
                    </select>
                </div>
                <div>
                    <label class="mt-4" for="">Birthdate:</label>
                    <input type="date" name="birthdate" placeholder="2000-10-08" class="w-full input bg-[transparent] border-white" value="{{ old('birthdate', $user->birthdate)  }}"/>
                </div>
                <div>
                    <label class="mt-4" for="">Phone Number:</label>
                    <input type="text" name="phone" placeholder="3147895678" class="w-full input bg-[transparent] border-white" value="{{ old('phone', $user->phone)  }}"/>
                </div>
                <div>
                    <label class="mt-4" for="">Email:</label>
                    <input type="text" name="email" placeholder="jonhw@gmail.com" class="w-full input bg-[transparent] border-white" value="{{ old('email', $user->email ) }}"/>
                </div>
                <div>
                    <label class="mt-4" for="">Active:</label>
                    <select name="active" class="w-full select bg-[#154869] border-white">
                        <option value="">Select Status...</option>
                        <option value="0" @if (old('active', $user->active) == 0 ) selected @endif>Inactive</option>
                        <option value="1" @if (old('active', $user->active) == 1 ) selected @endif>Active</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn-outline w-full">
                        Upsate User
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </button>
                </div> 
            </form>

        </div>   
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('#upload').click(function() {
                $('#photo').click();
            });

            $('#photo').change(function() {
                $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]));
            });

            @if (count($errors->all()) > 0)
                @php $content = '<ul class="flex flex-col gap-1">' @endphp
                @foreach ($errors->all() as $msg)
                    @php $content .= '<li class="badge badge-error text-xs w-full">'.$msg.'</li>' @endphp
                @endforeach
                @php $content .= '</ul>' @endphp
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Someting went wrong!",
                    html: `@php echo $content @endphp`,
                    showConfirmButton: true,
                    confirmButtoncColor: "#154869",
                    // timer: 2500
                });
            @endif

        });
    </script>
@endsection