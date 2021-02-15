@csrf

<label class="block mb-3">
    <span class="text-gray-700">Title</span>
    <x-input name="title" type="text" class="block w-full" value="{{ old('title') ?? $post->title }}"></x-input>
    @error('title')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</label>

<label class="block mb-3">
    <span class="text-gray-700">Body</span>
    <x-textarea name="body" id="sample" class="">{!! old('body') ?? $post->body !!}</x-textarea>
    @error('body')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</label>

<label class="block mb-3">
    <span class="text-gray-700">Status</span>

    <x-select name="status" class="capitalize">
        @foreach ($postOption as $key => $item)
        <option {{ in_array($post->status, $item) ? 'selected' : '' }} value="{{ $key }}">{{ $key }}</option>
        @endforeach
    </x-select>
    @error('status')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</label>

<x-button>{{ $submit }}</x-button>

@push('css')
<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/lib/codemirror.min.css">
@endpush


@push('js')
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<!-- languages (Basic Language: English/en) -->
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/lib/codemirror.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/xml/xml.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/css/css.js"></script>
<script>
    const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
        codeMirror:CodeMirror,

        lang: SUNEDITOR_LANG['en'],
        height : '300px',
        buttonList: [
        ['undo', 'redo'],
        ['font', 'fontSize', 'formatBlock'],
        ['paragraphStyle', 'blockquote'],
        ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
        ['fontColor', 'hiliteColor', 'textStyle'],
        ['removeFormat'],
        '/', // Line break
        ['outdent', 'indent'],
        ['align', 'horizontalRule', 'list', 'lineHeight'],
        ['table', 'link', 'image', 'video', 'audio' /** ,'math' */], // You must add the 'katex' library at options to use the 'math' plugin.
        /** ['imageGallery'] */ // You must add the "imageGalleryUrl".
        ['fullScreen', 'showBlocks', 'codeView'],
        ['preview', 'print'],
        ['save', 'template']
    ]
    });
</script>
@endpush
