import EditorJS from "@editorjs/editorjs"
import Header from "@editorjs/header"
import List from "@editorjs/list"
import Embed from "@editorjs/embed"

import Parser from "./editor-parser/parser"

const editor = new EditorJS({
  holder: 'editorjs',
  tools: {
    header: {
      class: Header,
      inlineToolbar: ['link']
    },
    list: {
      class: List,
      inlineToolbar: ['link', 'bold']
    },
    embed: {
      class: Embed,
      inlineToolbar: false,
      config: {
        services: {
          youtube: true
        }
      }
    }
  }
})

const btnSave = document.querySelector('#editorjsSave');

if (btnSave) {
  btnSave.addEventListener('click', (e) => {
    editor.save().then((outputData) => {
      console.log("Output", outputData);

      const parser = new Parser(outputData);
      console.log(parser.parse());
    })
  })
}

