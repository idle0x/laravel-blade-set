<h2 class="border-bottom">{{ $article->title ?? 'Create category' }}</h2>

<form action="{{ !empty($category) ? route('category.update', $category->id) : route('category.store') }}"
    method="post" novalidate class="@if($errors->count()) was-validated @endif"
  >
  @csrf
  @if(!empty($category))
    @method('PUT')
  @endif
  @if (!empty($category))
      <input type="hidden" name="id" value="{{ $category->id }}">
  @endif

  <div class="mb-3">
    <x-form.label for="name" :value="__('Name')"></x-form.label>
    <x-form.input id="name" type="text" name="name" value="{{ !empty($category) ? $category->name : old('name') }}" required>
    </x-form.input>
  </div>

  <div class="mb-3">
    <x-form.label for="slug" :value="__('Slug')"></x-form.label>
    <x-form.input id="slug" type="text" name="slug" value="{{ !empty($category) ? $category->slug : old('slug') }}" required>
    </x-form.input>
  </div>

  <div class="mb-3">
    <x-form.label for="title" :value="__('Title')"></x-form.label>
    <x-form.input id="title" type="text" name="title" value="{{ !empty($category) ? $category->title : old('title') }}" required>
    </x-form.input>
  </div>

  <div class="mb-3">
    <x-form.label for="description" :value="__('Description')"></x-form.label>
    <textarea  id="editor" name="description">
      {{ !empty($category) ? $category->description : '' }}
    </textarea>
  </div>

  <input type="submit" id="editorjsSave" class="btn btn-primary" value="Submit">
</form>

@push('js')
    <script src="{{ mix('js/ckeditor.js') }}"></script>
    <script>
      //Define an adapter to upload the files
    class MyUploadAdapter {
       constructor(loader) {
          // The file loader instance to use during the upload. It sounds scary but do not
          // worry — the loader will be passed into the adapter later on in this guide.
          this.loader = loader;

          // URL where to send files.
          this.url = '{{ route('ckeditor.upload') }}';

          //
       }
       // Starts the upload process.
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       // Aborts the upload process.
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       // Initializes the XMLHttpRequest object using the URL passed to the constructor.
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          // Note that your request may look different. It is up to you and your editor
          // integration to choose the right communication channel. This example uses
          // a POST request with JSON as a data structure but your configuration
          // could be different.
          // xhr.open('POST', this.url, true);
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       // Initializes XMLHttpRequest listeners.
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             // This example assumes the XHR server's "response" object will come with
             // an "error" which has its own "message" that can be passed to reject()
             // in the upload promise.
             //
             // Your integration may handle upload errors in a different way so make sure
             // it is done properly. The reject() function must be called when the upload fails.
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }
             // If the upload is successful, resolve the upload promise with an object containing
             // at least the "default" URL, pointing to the image on the server.
             // This URL will be used to display the image in the content. Learn more in the
             // UploadAdapter#upload documentation.
             resolve({
                default: response.url,
             });
          });
          // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
          // properties which are used e.g. to display the upload progress bar in the editor
          // user interface.
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       // Prepares the data and sends the request.
       _sendRequest(file) {
          // Prepare the form data.
          const data = new FormData();
          data.append("upload", file);
          // Important note: This is the right place to implement security mechanisms
          // like authentication and CSRF protection. For instance, you can use
          // XMLHttpRequest.setRequestHeader() to set the request headers containing
          // the CSRF token generated earlier by your application.
          // Send the request.
          this.xhr.send(data);
       }
       // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          // Configure the URL to the upload script in your back-end here!
          return new MyUploadAdapter(loader);
       };
    }

      ClassicEditor.create(document.querySelector('#editor'), {
        extraPlugins: [SimpleUploadAdapterPlugin],
        // removePlugins: ['Table', 'UploadAdapter', 'CKFinder', 'EasyImage', 'Image',
        //  'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageUpload', 'Heading', 'MediaEmbed'],
        placeholder: 'Type content here',
      })
        .catch(error => {
          console.error(error)
        })
    </script>
@endpush
