import Paragraph from "./paragraph.js";
import Header from "./header.js";



export default class Parser {
  handlers = {
    paragraph: Paragraph,
    header: Header
  }
  data = null
  output = '';

  constructor (data) {
    this.data = data;
  }
  parse () {
    this.data.blocks.forEach(block => {
      if (this.handlers[block.type]) {
        this.attach(this.handlers[block.type].toHtml(block.data));
      } else {
        console.error(`Block type ${block.type} not exist`);
      }
    })

    return this.output;
  }

  attach (str) {
    this.output = this.output.concat(str);
  }
}
