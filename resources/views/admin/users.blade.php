<x-layout title="Manage Users">
  <div class="pt-24 min-h-screen bg-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4 w-full md:w-auto">
          <a href="{{ route('admin.index') }}"
            class="p-2 rounded-full bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
              </path>
            </svg>
          </a>
          <div>
            <h1 class="text-2xl font-bold text-white">Manajemen Pengguna</h1>
            <p class="text-slate-400 text-sm">Total User Terdaftar: {{ $users->total() }}</p>
          </div>
        </div>

        <form action="{{ route('admin.users') }}" method="GET" class="w-full md:w-1/3">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input type="text" name="search" value="{{ request('search') }}"
              class="block w-full p-3 pl-10 text-sm text-white border border-slate-700 rounded-xl bg-slate-800 focus:ring-indigo-500 focus:border-indigo-500 placeholder-slate-500 transition-all shadow-lg"
              placeholder="Cari nama, username, atau email...">
          </div>
        </form>
      </div>

      <div class="bg-slate-800/50 backdrop-blur-md border border-slate-700/60 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-slate-400">
            <thead class="text-xs text-slate-300 uppercase bg-slate-900/50 border-b border-slate-700">
              <tr>
                <th scope="col" class="px-6 py-4">User Info</th>
                <th scope="col" class="px-6 py-4">Role Saat Ini</th>
                <th scope="col" class="px-6 py-4">Bergabung</th>
                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
              @forelse ($users as $user)
                <tr class="hover:bg-slate-700/30 transition-colors">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <a href="{{ route('user.profile', $user->username) }}" class="shrink-0">
                        <img
                          src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.jpg') }}"
                          class="w-10 h-10 rounded-full object-cover border border-slate-600 hover:border-indigo-500 hover:scale-105 transition-all duration-200"
                          alt="{{ $user->name }}" title="Lihat Profil">
                      </a>
                      <div>
                        <a href="{{ route('user.profile', $user->username) }}" class="group">
                          <div
                            class="font-bold text-white group-hover:text-indigo-400 group-hover:underline transition-colors cursor-pointer">
                            {{ $user->name }}
                          </div>
                        </a>
                        <div class="text-xs text-slate-500">{{ $user->email }}</div>
                        <div class="text-xs text-indigo-400">{{ '@' . $user->username }}</div>
                      </div>
                    </div>
                  </td>

                  {{-- PERBAIKAN DI SINI: Cek berdasarkan 'role', bukan 'is_admin' --}}
                  <td class="px-6 py-4">
                    @if ($user->role === 'super_admin')
                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-500 border border-red-500/20">
                        Super Admin
                      </span>
                    @elseif ($user->role === 'admin')
                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                        Admin
                      </span>
                    @else
                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-700 text-slate-300 border border-slate-600">
                        User Biasa
                      </span>
                    @endif
                  </td>

                  <td class="px-6 py-4">
                    {{ $user->created_at->format('d M Y') }}
                  </td>

                  <td class="px-6 py-4">
                    <div class="flex justify-center items-center gap-3">

                      {{-- LOGIKA TOMBOL ROLE --}}
                      @if (Auth::user()->role === 'super_admin')
                        {{-- Super Admin bisa ubah siapa saja --}}
                        <form action="{{ route('admin.users.role', $user->username) }}" method="POST">
                          @csrf @method('PATCH')
                          @if ($user->role === 'admin')
                            <button
                              class="text-yellow-500 border border-yellow-500/30 px-3 py-1 rounded hover:bg-yellow-500/10 text-xs transition-colors">Demote
                              Admin</button>
                          @elseif($user->role === 'user')
                            <button
                              class="text-indigo-400 border border-indigo-500/30 px-3 py-1 rounded hover:bg-indigo-500/10 text-xs transition-colors">Promote
                              Admin</button>
                          @endif
                        </form>
                      @elseif(Auth::user()->role === 'admin')
                        {{-- Admin Biasa: Hanya bisa promote User, TIDAK BISA sentuh Admin lain/Super Admin --}}
                        @if ($user->role === 'user')
                          <form action="{{ route('admin.users.role', $user->username) }}" method="POST">
                            @csrf @method('PATCH')
                            <button
                              class="text-indigo-400 border border-indigo-500/30 px-3 py-1 rounded hover:bg-indigo-500/10 text-xs transition-colors">Promote
                              Admin</button>
                          </form>
                        @elseif($user->role === 'admin' || $user->role === 'super_admin')
                          <span class="text-xs text-slate-500 italic">No Access</span>
                        @endif
                      @endif

                      {{-- LOGIKA TOMBOL HAPUS (Sudah dirapikan agar tidak duplikat) --}}
                      @if (Auth::user()->role === 'super_admin' || (Auth::user()->role === 'admin' && $user->role === 'user'))
                        <form action="{{ route('admin.users.destroy', $user->username) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus user ini beserta seluruh postingannya?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="p-2 text-slate-500 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-colors"
                            title="Hapus User">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                              </path>
                            </svg>
                          </button>
                        </form>
                      @endif

                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                    Tidak ada user ditemukan dengan kata kunci "{{ request('search') }}"
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="p-4 border-t border-slate-700">
          {{ $users->links() }}
        </div>
      </div>

    </div>
  </div>
</x-layout>
