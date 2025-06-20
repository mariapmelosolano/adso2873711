<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-red-500 min-h-[100dvh] flex flex-col gap-4 justify-center items-center">

    <h1 class="text-4x1 text-white pb-4 border-b-2">list all pets</h1>
    <div class="overflow-x-auto">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th>Name</th>
                    <th>Job</th>
                    <th>Favorite Color</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-[30px]">
                                        <img src="{{ asset('images/' . $pet->image) }}" alt="{{ $pet->name }}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $pet->name }}</div>
                                    <div class="text-sm opacity-50">{{ $pet->location }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$pet->kind}}
                            <br />
                            <span class="badge badge-ghost badge-sm">{{$pet->breed}}</span>
                        </td>
                        <th>
                            <a href="{{ url('petsview/'.$pet->id) }}" class="btn btn-ghost btn-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </a>
                        </th>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</body>

</html>