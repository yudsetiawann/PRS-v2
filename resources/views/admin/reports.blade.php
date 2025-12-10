<x-layout title="Laporan Masuk">
  <div class="pt-24 min-h-screen bg-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- Header Section --}}
      <div class="mb-8 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <a href="{{ route('admin.index') }}"
            class="p-2 rounded-full bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
              </path>
            </svg>
          </a>
          <div>
            <h1 class="text-2xl font-bold text-white">Laporan Pengguna</h1>
            <p class="text-slate-400 text-sm">Menangani laporan konten yang melanggar aturan.</p>
          </div>
        </div>
      </div>

      {{-- Table Card --}}
      <div class="bg-slate-800/50 backdrop-blur-md border border-slate-700/60 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-slate-400">
            <thead class="text-xs text-slate-300 uppercase bg-slate-900/50 border-b border-slate-700">
              <tr>
                <th scope="col" class="px-6 py-4">Pelapor</th>
                <th scope="col" class="px-6 py-4 w-[35%]">Konten Bermasalah</th> {{-- Set width agar proporsional --}}
                <th scope="col" class="px-6 py-4 w-[25%]">Alasan Pelaporan</th>
                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
              @forelse($reports as $report)
                <tr class="hover:bg-slate-700/30 transition-colors">

                  {{-- 1. PELAPOR --}}
                  <td class="px-6 py-4 align-top">
                    <div class="flex items-center gap-3">
                      <a href="/userprof/{{ $report->user->username }}" class="group/avatar flex-shrink-0">
                        <img
                          src="{{ $report->user->avatar ? asset('storage/' . $report->user->avatar) : asset('img/default-avatar.jpg') }}"
                          class="w-10 h-10 rounded-full object-cover border border-slate-600 group-hover/avatar:border-red-500 transition-all">
                      </a>
                      <div>
                        <a href="/userprof/{{ $report->user->username }}"
                          class="font-bold text-white hover:text-red-400 transition-colors block">
                          {{ $report->user->name }}
                        </a>
                        <div class="text-xs text-slate-500">
                          {{ $report->created_at->diffForHumans() }}
                        </div>
                      </div>
                    </div>
                  </td>

                  {{-- 2. KONTEN BERMASALAH (LOGIKA COLLAPSE) --}}
                  <td class="px-6 py-4 align-top">
                    @if ($report->reportable_type === 'App\Models\Post')
                      {{-- Tipe: POSTINGAN --}}
                      <div class="mb-2">
                        <span
                          class="inline-flex items-center self-start px-2 py-1 rounded text-[10px] font-bold uppercase bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 tracking-wide">
                          <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                          </svg>
                          Postingan
                        </span>
                      </div>

                      {{-- Judul Post dengan Toggle --}}
                      <div x-data="{ expanded: false }">
                        <div class="text-white font-medium">
                          {{-- Tampilan Singkat --}}
                          <span x-show="!expanded">
                            <a href="/posts/{{ $report->reportable->slug }}" target="_blank"
                              class="hover:underline hover:text-indigo-400">
                              {{ Str::limit($report->reportable->title, 30) }}
                            </a>
                          </span>

                          {{-- Tampilan Lengkap --}}
                          <span x-show="expanded" style="display: none;">
                            <a href="/posts/{{ $report->reportable->slug }}" target="_blank"
                              class="hover:underline hover:text-indigo-400 block mb-1">
                              {{ $report->reportable->title }}
                            </a>
                          </span>

                          {{-- Tombol Toggle (Hanya muncul jika teks > 30) --}}
                          @if (strlen($report->reportable->title) > 30)
                            <button @click="expanded = !expanded"
                              class="ml-1 text-[10px] text-slate-500 hover:text-white cursor-pointer select-none bg-slate-800 px-1.5 py-0.5 rounded border border-slate-700">
                              <span x-text="expanded ? 'Sembunyikan' : '...Lihat'"></span>
                            </button>
                          @endif
                        </div>
                      </div>
                    @else
                      {{-- Tipe: KOMENTAR --}}
                      <div class="mb-2">
                        <span
                          class="inline-flex items-center self-start px-2 py-1 rounded text-[10px] font-bold uppercase bg-amber-500/10 text-amber-500 border border-amber-500/20 tracking-wide">
                          <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                          </svg>
                          Komentar
                        </span>
                      </div>

                      {{-- Isi Komentar dengan Toggle --}}
                      <div x-data="{ expanded: false }"
                        class="text-slate-300 text-sm italic bg-slate-900/40 p-2 rounded border border-slate-700/50">
                        {{-- Tampilan Singkat --}}
                        <span x-show="!expanded">
                          "{{ Str::limit($report->reportable->body ?? 'Konten dihapus', 30) }}"
                        </span>

                        {{-- Tampilan Lengkap --}}
                        <span x-show="expanded" style="display: none;">
                          "{{ $report->reportable->body ?? 'Konten dihapus' }}"
                        </span>

                        {{-- Tombol Toggle --}}
                        @if (strlen($report->reportable->body ?? '') > 30)
                          <button @click="expanded = !expanded"
                            class="block mt-1 text-[10px] text-amber-500/70 hover:text-amber-400 cursor-pointer font-not-italic">
                            <span x-text="expanded ? '(Sembunyikan)' : '(Baca Selengkapnya)'"></span>
                          </button>
                        @endif
                      </div>
                    @endif
                  </td>

                  {{-- 3. ALASAN PELAPORAN (LOGIKA COLLAPSE) --}}
                  <td class="px-6 py-4 align-top">
                    <div x-data="{ expanded: false }">
                      <div class="text-red-400/90 text-sm">
                        {{-- Tampilan Singkat --}}
                        <span x-show="!expanded">
                          {{ Str::limit($report->reason, 30) }}
                        </span>

                        {{-- Tampilan Lengkap --}}
                        <div x-show="expanded" style="display: none;"
                          class="bg-red-500/10 p-2 rounded mt-1 border border-red-500/20 text-xs text-red-300">
                          {{ $report->reason }}
                        </div>

                        {{-- Tombol Toggle --}}
                        @if (strlen($report->reason) > 30)
                          <button @click="expanded = !expanded"
                            class="ml-1 text-[10px] font-bold cursor-pointer select-none text-slate-500 hover:text-slate-300">
                            <span x-text="expanded ? 'Minimize' : '...Expand'"></span>
                          </button>
                        @endif
                      </div>
                    </div>
                  </td>

                  {{-- 4. AKSI --}}
                  <td class="px-6 py-4 align-top">
                    <div class="flex flex-col gap-2 items-center justify-center">
                      {{-- Keep --}}
                      <form action="{{ route('admin.reports.solve', $report->id) }}" method="POST" class="w-full">
                        @csrf @method('PATCH')
                        <button
                          class="w-full flex justify-center items-center gap-1 px-3 py-1.5 bg-slate-800 hover:bg-green-600 text-slate-400 hover:text-white border border-slate-600 hover:border-green-500 rounded text-xs transition-all">
                          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                          </svg>
                          Keep
                        </button>
                      </form>

                      {{-- Hapus --}}
                      <form action="{{ route('admin.reports.destroy_content', $report->id) }}" method="POST"
                        class="w-full" onsubmit="return confirm('Hapus konten ini secara permanen?');">
                        @csrf @method('DELETE')
                        <button
                          class="w-full flex justify-center items-center gap-1 px-3 py-1.5 bg-slate-800 hover:bg-red-600 text-slate-400 hover:text-white border border-slate-600 hover:border-red-500 rounded text-xs transition-all">
                          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                          </svg>
                          Hapus
                        </button>
                      </form>
                    </div>
                  </td>

                </tr>
              @empty
                <tr>
                  <td colspan="4" class="px-6 py-16 text-center text-slate-500">
                    Tidak ada laporan baru.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="p-4 border-t border-slate-700">
          {{ $reports->links() }}
        </div>
      </div>

    </div>
  </div>
</x-layout>
