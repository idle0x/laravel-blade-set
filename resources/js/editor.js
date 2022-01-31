import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Embed from "@editorjs/embed";
import ImageTool from "@editorjs/image";

import Parser from "./editor-parser/parser";

window.editor = new EditorJS({
  holder: "editorjs",
  tools: {
    header: {
      class: Header,
      inlineToolbar: ["link"],
    },
    list: {
      class: List,
      inlineToolbar: ["link", "bold"],
    },
    embed: {
      class: Embed,
      inlineToolbar: false,
      config: {
        services: {
          youtube: true,
        },
      },
    },
    image: {
      class: ImageTool,
      config: {
        endpoints: {
          byFile: '/admin/upload/file',
          byUrl: '/admin/upload/url',
        },
        additionalRequestHeaders: {
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
      },
    },
  },
});

