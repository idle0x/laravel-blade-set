import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
// import SimpleUploadAdapter from "@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter";

ClassicEditor.create(document.querySelector('#editor'), {

})
  .then(editor => {
    console.log("editor", editor)
  })
  .catch(error => {
    console.error(error)
  })
