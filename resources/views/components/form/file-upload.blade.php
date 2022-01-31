<div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile">
  <div id="preview" class="border border-round" style="width: 100%; min-height: 150px; border: 2px gray dashed;">
    image preview
  </div>
</div>

<script>
  const formFile = document.querySelector('#formFile');

  if (formFile) {
    formFile.addEventListener('change', function (e) {
      console.log(e);
      if (e.target.value) {
        let file = e.target.files[0];
        if (file) {
          const fileReader = new FileReader();
          fileReader.addEventListener("load", function () {
            debugger;
            let preview = document.querySelector('#preview');
            preview.innerHTML = `<img src="${this.result}">`
            console.log(this);
          });
          fileReader.readAsDataURL(file);
        }
      } else {
        let preview = document.querySelector('#preview');
        preview.innerHtml = "No file!";
      }
    })
  }
</script>
