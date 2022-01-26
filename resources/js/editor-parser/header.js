export default class Header {
  static toHtml(data) {
    return `<h${data.level}>${data.text}</h${data.level}>`;
  }
}
