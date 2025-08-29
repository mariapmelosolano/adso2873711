@forelse ($users as $user)
 <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle h-12 w-12">
                                                <img src="{{ asset('images/' . $user->photo) }}" alt="Photo" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $user->fullname }}</div>
                                            <div class="text-sm opacity-50">{{ $user->document }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden sm:table-cell">
                                    <span class="badge badge-ghost badge-sm">{{ $user->role }}</span>
                                </td>
                                <td class="hidden md:table-cell">{{ $user->email }}</td>
                                <th>
                                    <a href="{{ url('users/' . $user->id) }}"
                                        class="btn btn-ghost hover:bg-[transparent] btn-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="#fff"
                                            viewBox="0 0 256 256">
                                            <path
                                                d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ url('users/' . $user->id . '/edit') }}"
                                        class="btn btn-ghost hover:bg-[transparent] btn-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg"  class="size-4" fill="#fff" viewBox="0 0 256 256"><path d="M253.66,106.34a8,8,0,0,0-11.32,0L192,156.69,107.31,72l50.35-50.34a8,8,0,1,0-11.32-11.32L96,60.69A16,16,0,0,0,93.18,79.5L72,100.69a16,16,0,0,0,0,22.62L76.69,128,18.34,186.34a8,8,0,0,0,3.13,13.25l72,24A7.88,7.88,0,0,0,96,224a8,8,0,0,0,5.66-2.34L136,187.31l4.69,4.69a16,16,0,0,0,22.62,0l21.19-21.18A16,16,0,0,0,203.31,168l50.35-50.34A8,8,0,0,0,253.66,106.34ZM93.84,206.85l-55-18.35L88,139.31,124.69,176ZM152,180.69,83.31,112,104,91.31,172.69,160Z"></path></svg>
                                    </a>
                                    <a href="javascript:;" class="btn btn-ghost hover:bg-[transparent] btn-xs btn-delete" data-id="{{ $user->id }}" data-fullname="{{ $user->fullname }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="#fa627a"viewBox="0 0 256 256">
                                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                        </svg>
                                    </a>

                                    <form id="delete-form-{{ $user->id }}" method="post" action="{{ url('users/' . $user->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </th>
                            </tr>
@empty
<tr>
    <td colspan="4" class="text-center font-bold text-lg">  
    no resultados
 </td>
@endforelse