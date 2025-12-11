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
      font-size: 1rem;
    }

    /* Styling Icons */
    .ql-snow .ql-stroke {
      stroke: #94a3b8 !important;
    }

    .ql-snow .ql-fill {
      fill: #94a3b8 !important;
    }

    .ql-snow .ql-picker {
      color: #94a3b8 !important;
    }

    .ql-snow .ql-picker-label:hover,
    .ql-snow .ql-picker-item:hover {
      color: #fff !important;
    }

    .ql-snow button:hover .ql-stroke {
      stroke: #fff !important;
    }

    /* Tambahkan ini di CSS global agar align justify berfungsi saat artikel dibaca */
    .ql-align-justify {
      text-align: justify;
    }

    .ql-align-center {
      text-align: center;
    }

    .ql-align-right {
      text-align: right;
    }

    /* 1. Reset CSS Image agar bisa di-resize */
    #editor img {
      display: inline-block;
      width: auto;
      /* Jangan 100%, biarkan mengikuti atribut width dari resizer */
    }

    /* 2. Style Editor agar gambar responsif tapi tetap ikut resize */
    .ql-editor img {
      max-width: 100%;
      height: auto;
    }

    /* 3. Perbaiki Posisi Overlay (Kotak Resize) */
    .blot-formatter__overlay {
      border: 2px solid #6366f1 !important;
      /* Warna ungu indigo */
      background-color: rgba(99, 102, 241, 0.1);
      /* Sedikit background transparan */
      z-index: 50;
      pointer-events: none;
      /* Penting: agar klik tembus ke gambar */
    }

    /* Agar handle (titik-titik sudut) bisa diklik */
    .blot-formatter__handler {
      pointer-events: auto;
      background-color: #6366f1 !important;
    }

    /* Mencegah layout shift */
    #editor {
      min-height: 300px;
    }
  </style>
@endpush

<div class="mx-auto max-w-4xl px-4 py-8">

  <div class="mb-6">
    <h2 class="text-2xl font-bold text-white tracking-tight">Edit Postingan</h2>
    <p class="text-slate-400 text-sm mt-1">Perbarui konten artikel Anda.</p>
  </div>

  <div class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-xl p-6 sm:p-8">

    <form action="/dashboard/{{ $post->slug }}" method="POST" id="post-form" class="space-y-6">
      @csrf
      @method('PATCH')

      <div>
        <label for="title" class="block mb-2 text-sm font-medium text-slate-300">Judul Post</label>
        <input type="text" name="title" id="title"
          class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors @error('title') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
          placeholder="Ketik judul artikel..." autocomplete="off" value="{{ old('title', $post->title) }}">
        @error('title')
          <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="category" class="block mb-2 text-sm font-medium text-slate-300">Kategori</label>
        <div class="relative">
          <select name="category_id" id="category"
            class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm appearance-none transition-colors @error('category_id') border-red-500 @enderror">
            <option value="" class="text-slate-500">Pilih kategori...</option>
            @foreach (App\Models\Category::get() as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
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

        <textarea id="body" name="body" class="hidden">{!! old('body', $post->body) !!}</textarea>

        <div class="relative">
          <div id="editor" class="min-h-[300px] @error('body') border border-red-500 rounded-b-xl @enderror"></div>
        </div>

        @error('body')
          <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center gap-4 pt-4 border-t border-slate-700/50">
        <button type="submit"
          class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition-all hover:bg-indigo-700 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-800">
          Update Post
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
  <script src="https://unpkg.com/quill-blot-formatter/dist/quill-blot-formatter.min.js"></script>

  <script>
    // --- 1. Register Module BlotFormatter dengan Benar ---
    // Pastikan kita menangkap class-nya dengan benar (Support CDN)
    const BlotFormatter = QuillBlotFormatter.default || QuillBlotFormatter;
    Quill.register('modules/blotFormatter', BlotFormatter);

    // --- 2. Image Handler Custom (Agar upload ke server) ---
    function selectLocalImage() {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.click();

      input.onchange = () => {
        const file = input.files[0];
        if (/^image\//.test(file.type)) {
          saveToServer(file);
        } else {
          console.warn('You could only upload images.');
        }
      };
    }

    function saveToServer(file) {
      const fd = new FormData();
      fd.append('image', file);

      fetch('/upload-image', {
          method: 'POST',
          body: fd,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
          }
        })
        .then(response => response.json())
        .then(result => {
          const url = result.url;
          insertToEditor(url);
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Gagal mengupload gambar.');
        });
    }

    function insertToEditor(url) {
      const range = quill.getSelection();
      quill.insertEmbed(range.index, 'image', url);
      quill.setSelection(range.index + 1);
    }

    // --- 3. Inisialisasi Quill ---
    const quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: 'Tulis ide brilianmu di sini...',
      modules: {
        // HANYA gunakan blotFormatter, JANGAN pakai imageResize
        blotFormatter: {
          overlay: {
            style: {
              border: '2px solid #6366f1', // Warna border saat diklik
            }
          }
        },
        toolbar: {
          container: [
            [{
              'header': [1, 2, 3, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
              'align': []
            }], // Dropdown Align
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
            ['link', 'image', 'clean']
          ],
          handlers: {
            'image': selectLocalImage
          }
        }
      }
    });

    // --- Form Handling ---
    const postForm = document.querySelector('#post-form');
    const postBody = document.querySelector('#body');

    postForm.addEventListener('submit', function(e) {
      postBody.value = quill.root.innerHTML;
    });
  </script>
@endpush
