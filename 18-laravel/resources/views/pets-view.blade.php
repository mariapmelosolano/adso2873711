<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-rose-800 min-h-[100dvh] flex-col flex gap-4 justify-center items-center">

    <h1 class="text-4x1 text-white pb-4 border-b-2">
        List All Pets
    </h1>

    <div class="overflow-x-auto">
        <table class="table text-white">
            <!-- head -->
            <thead>
            <tr>
                <th class="text-white">Name</th>
                <th class="text-white">Kind</th>
                <th class="text-white">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <td>
                    <div class="flex items-center gap-3">
                        <div class="avatar">
                        <div class="mask bg-gray-50 mask-squircle h-12 w-12">
                            <img
                            src="{{ asset('images/' .$pet->image) }}"
                            alt="{{ $pet->name }}" />
                        </div>
                        </div>
                        <div>
                        <div class="font-bold">{{ $pet->name }}</div>
                        <div class="text-sm opacity-50">{{ $pet->location }}</div>
                        </div>
                    </div>
                    </td>
                    <td>
                    {{ $pet->kind }}
                    <br />
                    <span class="badge badge-ghost badge-sm">{{ $pet->breed }}</span>
                    </td>
                    <td>Purple</td>
                    <td>
                        <a href="{{ url('petview/'.$pet->id) }}" class="btn btn-outline py-4 btn-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>