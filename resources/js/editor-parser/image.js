export default class Image {
  static toHtml(data) {
    return `<figure class="figure">
    <img src="${data.file.url}" class="figure-img img-fluid rounded" alt="img">
    <figcaption class="figure-caption">${data.caption}</figcaption>
  </figure>`;
  }
}
