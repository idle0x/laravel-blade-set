<div class="container-fluid py-5">
  <h2 class="border-bottom">{{ $article->title ?? 'Create article' }}</h2>
  <form action="{{ !empty($article) ? route('article.update', $article->id) : route('article.store') }}" method="post">
    @csrf
    @if(!empty($article))
      @method('PUT')
    @endif
    @if (!empty($article))
        <input type="hidden" name="id" value="{{ $article->id }}">
    @endif
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ !empty($article) ? $article->title : '' }}" placeholder="Print title">
    </div>

    <div class="mb-3">
      <label class="form-label">Content</label>
      <textarea  id="editor" name="content">
        {{ !empty($article) ? $article->content : '' }}
      </textarea>
    </div>

    <input type="submit" id="editorjsSave" class="btn btn-primary" value="Submit">
  </form>
</div>

@push('js')
    <script src="{{ mix('js/ckeditor.js') }}"></script>
@endpush
