import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import LinkTool from '@editorjs/link';
import ImageTool from '@editorjs/image';
import Checklist from '@editorjs/checklist';
import List from '@editorjs/list';
import Embed from '@editorjs/embed';
import Quote from '@editorjs/quote';
import RawTool from '@editorjs/raw';
import edjsParser from 'editorjs-parser';

const customParsers = {
  customBlock: (data, config) => {
    // parsing functionality
    // the config arg is user provided config merged with default config
  },
  linkTool: (data, config) => {
    if (data.meta) {
      if (data.meta.html) {
        if (removeNestedAnchorTags) {
          // remove nested anchor tags : some email providers/clients don't support nested anchor tags
          const regex = /<a(.*?)>(.*?)<\/a>/g
          data.meta.html = data.meta.html.replaceAll(
            regex,
            '<span$1>$2</span>'
          )
        }
        return (
          `<a href="${data.link}" target="_blank" rel="noopener noreferrer">` +
          `<div style="margin-top: 1rem; margin-bottom: 1rem; border: solid 1px #aaa; border-radius: 16px; overflow: hidden;">` +
          data.meta.html +
          `</div>` +
          `</a>`
        )
      } else {
        return (
          `<a href="${data.link}" target="_blank" rel="noopener noreferrer">` +
          `<div style="border: solid 1px #aaa; border-radius: 12px; padding: 1.5rem;">` +
          (data.meta.title ? `<h4>${data.meta.title}</h4>` : '') +
          (data.meta.description ? `<p>${data.meta.description}</p>` : '') +
          `</div>` +
          `</a>`
        )
      }
    } else {
      return `<a href="${data.link}" target="_blank" rel="noopener noreferrer">${data.link}</a>`
    }
  },
  image: (data, config) => {
    return `<img src="${data.file.url}" alt="${data.caption}" >`
  },
}



let saveBtn = document.getElementById("save_data");

if (saveBtn) {


  const getConstructorData = async (id) => {
    const { data } = await axios.get( 
      `https://guehakosu.beget.app/api/v1/docs/${id}`,
    )
    return JSON.parse(data.data.text);
  };
  const parser = new edjsParser(undefined, customParsers);
  getConstructorData(DocConfiguratorApp.doc_id).then(response => {

    let imageUploadUrl = saveBtn.dataset.image_upload;
 
    const editor = new EditorJS({
      holder: 'editorjs',
      tools: {
        header: {
          class: Header,
          config: {
            placeholder: 'Enter a header',
            levels: [1, 2, 3],
            defaultLevel: 1
          }
        },
        // linkTool: {
        //   class: LinkTool,
        //   config: {
        //     endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching,
        //   }
        // },
        list: {
          class: List,
          inlineToolbar: true,
          config: {
            defaultStyle: 'unordered'
          }
        },
        checklist: {
          class: Checklist,
          inlineToolbar: true,
        },
        image: {
          class: ImageTool,
          config: {
            endpoints: {
              byFile: `${imageUploadUrl}`, // Your backend file uploader endpoint
              byUrl: `${imageUploadUrl}`, // Your endpoint that provides uploading by Url
            },
            additionalRequestHeaders: {
              'X-CSRF-TOKEN': DocConfiguratorApp.csrfToken
            }
          }
        },
        embed: Embed,
        quote: Quote,
        raw: RawTool,
      },
      data: response,
    });

    // сохраняем 
    saveBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const url = e.target.getAttribute('href');

      editor.save().then((outputData) => {
        console.log('Article data: ', outputData)

        axios({
          method: 'post',
          url: url,
          data: {
            doc_editor_data: outputData,
          }
        });

      }).catch((error) => {
        console.log('Saving failed: ', error)
      });

    }, false);
    const markup = parser.parse(response); 
    editor_result.innerHTML = markup; 

    return markup;
  }).catch(response => { console.log("Error: "); console.log(response) });









}