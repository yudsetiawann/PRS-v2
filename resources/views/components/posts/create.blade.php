@push('style')
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
  <style>
    /* Kustomisasi Quill Editor untuk Dark Mode */
    .ql-toolbar.ql-snow {
      background-color: #1e293b;
      /* Slate-800 */
      border-color: #334155;
      /* Slate-700 */
      border-radius: 0.75rem 0.75rem 0 0;
      color: #e2e8f0;
      /* Slate-200 */
    }

    .ql-container.ql-snow {
      background-color: #0f172a;
      /* Slate-900 */
      border-color: #334155;
      /* Slate-700 */
      border-radius: 0 0 0.75rem 0.75rem;
      color: #f1f5f9;
      /* Slate-100 */
      font-family: 'Inter', sans-serif;
      /* Sesuaikan dengan font website */
      font-size: 1rem;
    }

    /* Mengubah warna icon toolbar menjadi putih/terang */
    .ql-snow .ql-stroke {
      stroke: #94a3b8 !important;
      /* Slate-400 */
    }

    .ql-snow .ql-fill {
      fill: #94a3b8 !important;
    }

    .ql-snow .ql-picker {
      color: #94a3b8 !important;
    }

    /* Hover effect pada toolbar items */
    .ql-snow .ql-picker-label:hover,
    .ql-snow .ql-picker-item:hover {
      color: #fff !important;
    }

    .ql-snow button:hover .ql-stroke {
      stroke: #fff !important;
    }

    /* Placeholder color */
    .ql-editor.ql-blank::before {
      color: #64748b;
      /* Slate-500 */
      font-style: normal;
    }
  </style>
@endpush

<div class="mx-auto max-w-4xl px-4 py-8">

  <div class="mb-6">
    <h2 class="text-2xl font-bold text-white tracking-tight">Buat Postingan Baru</h2>
    <p class="text-slate-400 text-sm mt-1">Bagikan ide dan wawasanmu kepada komunitas.</p>
  </div>

  <div class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-xl p-6 sm:p-8">

    <form action="/dashboard" method="POST" id="post-form" class="space-y-6">
      @csrf

      <div>
        <label for="title" class="block mb-2 text-sm font-medium text-slate-300">Judul Post</label>
        <input type="text" name="title" id="title"
          class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors @error('title') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
          placeholder="Contoh: Cara Menggunakan Laravel Livewire" autocomplete="off" autofocus
          value="{{ old('title') }}">
        @error('title')
          <p class="mt-2 text-xs text-red-400 flex items-center gap-1">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                clip-rule="evenodd"></path>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label for="category" class="block mb-2 text-sm font-medium text-slate-300">Kategori</label>
        <div class="relative">
          <select name="category_id" id="category"
            class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm appearance-none transition-colors @error('category_id') border-red-500 @enderror">
            <option selected="" value="" class="text-slate-500">Pilih kategori...</option>
            @foreach (App\Models\Category::get() as $category)
              <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
        @error('category_id')
          <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="body" class="block mb-2 text-sm font-medium text-slate-300">Konten</label>

        <textarea id="body" name="body" class="hidden">{{ old('body') }}</textarea>

        <div class="relative">
          <div id="editor" class="min-h-[300px] @error('body') border border-red-500 rounded-b-xl @enderror">
            {!! old('body') !!}
          </div>
        </div>

        @error('body')
          <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center gap-4 pt-4 border-t border-slate-700/50">
        <button type="submit"
          class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition-all hover:bg-indigo-700 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-800">
          <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
          </svg>
          Publish Post
        </button>

        <a href="/dashboard"
          class="inline-flex items-center justify-center rounded-xl border border-slate-600 bg-transparent px-6 py-3 text-sm font-medium text-slate-300 transition-all hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 focus:ring-offset-slate-800">
          Batal
        </a>
      </div>

    </form>
  </div>
</div>

@push('script')
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
  <script>
    // Initialize Quill
    const quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: 'Tulis ide brilianmu di sini...',
      modules: {
        toolbar: [
          [{
            'header': [1, 2, 3, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [{
            'list': 'ordered'
          }, {
            'list': 'bullet'
          }],
          [{
            'color': []
          }, {
            'background': []
          }],
          ['link', 'clean']
        ]
      }
    });

    const postForm = document.querySelector('#post-form');
    const postBody = document.querySelector('#body');

    // Handle Form Submit
    postForm.addEventListener('submit', function(e) {
      // Ambil HTML content dari Quill
      const content = quill.root.innerHTML;

      // Masukkan ke textarea hidden
      postBody.value = content;

      // Jika kosong atau hanya berisi tag p kosong, set value jadi empty string
      if (quill.getText().trim().length === 0) {
        // Optional: prevent submit if empty
        // e.preventDefault();
        // alert('Konten tidak boleh kosong!');
      }
    });

    // Jika ada old data (saat error validasi), Quill akan merender isinya dari div#editor secara otomatis
    // karena kita menaruh {!! old('body') !!} di dalam div tersebut.
  </script>
@endpush
