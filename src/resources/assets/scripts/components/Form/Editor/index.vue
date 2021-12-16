<template>
  <form id="new_post" name="new_post" method="post" enctype="multipart/form-data" class="text-[14px]">
    <input type="hidden" name="ispost" value="1" />
    <input type="hidden" name="userid" value="" />
    <input hidden type="text" name="content" :value="editor?.getHTML()">
    <div class="grid grid-cols-[100px,1fr] gap-y-[8px] border-t border-b border-[#333333] py-[14px] mb-[50px]">
      <span class="pt-[14px]">제목</span>
      <div class="pr-[20px]">
        <input type="text" name="title" class="border border-[#9b9b9b] p-[14px] w-full" required />
      </div>
      <div class="col-span-2 h-px bg-[#ebebeb]"></div>
      <span class="pt-[14px]">내용</span>
      <div class="pr-[20px]">
        <div v-if="editor" class="toolbar flex gap-[4px]">
          <button class="w-[28px] h-[28px] p-[6px]" @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path id="_x30_6.Bold" d="m403.321 235.911c16.996-20.761 27.479-46.08 30.134-72.779 8.236-85.157-58.583-157.132-141.82-157.132h-225.424c-8.284 0-15 6.716-15 15v59.286c0 8.284 6.716 15 15 15h38.426v321.429h-38.426c-8.284 0-15 6.716-15 15v59.285c0 8.284 6.716 15 15 15h236.473c79.018 0 149.71-57.757 157.366-136.607 5.291-54.074-18.292-102.746-56.729-133.482zm-209.632-140.625h97.946c29.587 0 53.571 23.985 53.571 53.571s-23.985 53.571-53.571 53.571h-97.946zm97.946 321.428h-97.946v-125h97.946c34.518 0 62.5 27.982 62.5 62.5s-27.982 62.5-62.5 62.5z"/></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[6px]" @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path id="_x34_2.Italic" d="m434.571 23.857v35.714c0 9.862-7.995 17.857-17.857 17.857h-70.044l-89.286 357.143h52.188c9.862 0 17.857 7.995 17.857 17.857v35.714c0 9.862-7.995 17.857-17.857 17.857h-214.286c-9.862 0-17.857-7.995-17.857-17.857v-35.714c0-9.862 7.995-17.857 17.857-17.857h70.045l89.286-357.143h-52.187c-9.862 0-17.857-7.995-17.857-17.857v-35.714c0-9.862 7.995-17.857 17.857-17.857h214.286c9.861 0 17.855 7.995 17.855 17.857z"/></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[4px]" @click="editor.chain().focus().toggleStrike().run()" :class="{ 'is-active': editor.isActive('strike') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x37_5.TextSlash"><path d="m268.497 380.995h-8.727l7.234-21.695-52.414-40.492-20.711 62.187h-25.383c-6.904 0-12.5 5.596-12.5 12.5v25c0 6.904 5.596 12.5 12.5 12.5h99.999c6.904 0 12.5-5.596 12.5-12.5v-25c.002-6.903-5.594-12.5-12.498-12.5z"/><path d="m501.168 413.886-200.64-155.085 38.414-115.304h92.054v25c0 6.904 5.596 12.5 12.5 12.5h25c6.904 0 12.5-5.596 12.5-12.5v-75c0-6.904-5.596-12.5-12.5-12.5h-324.998c-6.904 0-12.5 5.596-12.5 12.5v34.297l-89.484-69.156c-5.448-4.24-13.302-3.26-17.542 2.189-.002.002-.003.004-.005.007l-15.335 19.741c-4.236 5.45-3.254 13.302 2.195 17.539l459.654 355.248c5.448 4.24 13.302 3.26 17.542-2.189.002-.002.003-.004.005-.007l15.344-19.742c4.234-5.451 3.248-13.303-2.204-17.538zm-253.053-195.577-67.117-51.875v-22.937h92.054z"/></g></svg>
          </button>
          <div class="w-[2px] h-[28px] rounded-full bg-current mx-[13px]"></div>
          <button class="w-[32px] h-[28px] px-[4px]" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x33_5.Heading1"><path d="m283.7 352v27.2c-.1 10.1-5.5 15.7-15.6 15.7-26.7.1-53.4.1-80 0-9.8 0-15.3-5.5-15.4-15.4-.1-9.2-.1-18.4 0-27.6.1-8.6 4.1-12.5 12.8-12.6h14.7v-55.3h-110.6v55.4h14.7c8.7.1 12.7 4 12.8 12.6.1 9.2.1 18.4 0 27.6-.1 9.9-5.5 15.4-15.4 15.4-26.7 0-53.4 0-80 0-10.1 0-15.5-5.5-15.6-15.7-.1-9.1-.1-18.2-.1-27.3 0-8.1 4.4-12.6 12.5-12.7 5-.1 10 0 14.9 0v-166.9c-5.5 0-10.6.1-15.7 0-7.3-.1-11.6-4.5-11.7-11.7-.1-9.6-.1-19.2 0-28.8.1-9.3 5.7-14.8 15.1-14.8h83.3c8.4 0 12.5 4 12.6 12.4.1 10.2.1 20.3 0 30.5-.1 8.4-4.1 12.5-12.5 12.5-5 0-9.9 0-14.9 0v55.5h110.4v-55.5c-5 0-9.9 0-14.9 0-8.4-.1-12.4-4.1-12.5-12.5-.1-10.2-.1-20.3 0-30.5.1-8.4 4.2-12.4 12.6-12.4h83.3c9.4 0 15 5.5 15.1 14.8.1 9.6.1 19.2 0 28.8-.1 7.3-4.4 11.6-11.7 11.7-5.1.1-10.3 0-15.7 0v166.9h14.9c8.1.2 12.5 4.6 12.6 12.7z"/><path d="m349.7 395h139c9.6 0 17.4-7.8 17.4-17.4v-34.7c0-9.6-7.8-17.4-17.4-17.4h-34.7v-191.1c0-9.6-7.8-17.4-17.4-17.4h-52.1c-6.6 0-12.6 3.7-15.5 9.6l-17.4 34.7c-4.3 8.6-.8 19 7.8 23.3 2.4 1.2 5.1 1.8 7.7 1.8h17.4v139h-34.7c-9.6 0-17.4 7.8-17.4 17.4v34.7c-.1 9.7 7.7 17.5 17.3 17.5z"/></g></svg>
          </button>
          <button class="w-[32px] h-[28px] px-[4px]" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x33_6.Heading2"><path d="m337.6 394.9h147.4c9.6 0 17.4-7.8 17.4-17.4v-34.7c0-9.6-7.8-17.4-17.4-17.4h-84c7.1-22.3 105-40.6 105-122.5 0-63.1-54.3-85.9-96.6-85.9-46.4 0-73.4 21.7-87.8 40.7-9.5 12.1-6.5 23.5 6.1 33.4l18.6 14.9c12.2 9.9 23.9 5.4 35-5.3 5.5-5.4 12.9-8.4 20.5-8.3 7.2 0 20.1 3.4 20.1 19 .1 27.6-110.7 47.4-110.7 150.1v8.7c.1 16.1 11.2 24.7 26.4 24.7z"/><path d="m283.7 352v27.2c-.1 10.1-5.5 15.7-15.6 15.7-26.7.1-53.4.1-80 0-9.8 0-15.3-5.5-15.4-15.4-.1-9.2-.1-18.4 0-27.6.1-8.6 4.1-12.5 12.8-12.6h14.7v-55.3h-110.6v55.4h14.7c8.7.1 12.7 4 12.8 12.6.1 9.2.1 18.4 0 27.6-.1 9.9-5.5 15.4-15.4 15.4-26.7 0-53.4 0-80 0-10.1 0-15.5-5.5-15.6-15.7-.1-9.1-.1-18.2-.1-27.3 0-8.1 4.4-12.6 12.5-12.7 5-.1 10 0 14.9 0v-166.9c-5.5 0-10.6.1-15.7 0-7.3-.1-11.6-4.5-11.7-11.7-.1-9.6-.1-19.2 0-28.8.1-9.3 5.7-14.8 15.1-14.8h83.3c8.4 0 12.5 4 12.6 12.4.1 10.2.1 20.3 0 30.5-.1 8.4-4.1 12.5-12.5 12.5-5 0-9.9 0-14.9 0v55.5h110.4v-55.5c-5 0-9.9 0-14.9 0-8.4-.1-12.4-4.1-12.5-12.5-.1-10.2-.1-20.3 0-30.5.1-8.4 4.2-12.4 12.6-12.4h83.3c9.4 0 15 5.5 15.1 14.8.1 9.6.1 19.2 0 28.8-.1 7.3-4.4 11.6-11.7 11.7-5.1.1-10.3 0-15.7 0v166.9h14.9c8.1.2 12.5 4.6 12.6 12.7z"/></g></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[6px]" @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
            <svg class="w-full h-full" id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path id="_x35_6.Paragraph" d="m488.143 23.857v35.714c0 9.862-7.995 17.857-17.857 17.857h-53.571v410.714c0 9.862-7.995 17.857-17.857 17.857h-35.714c-9.862 0-17.857-7.995-17.857-17.857v-410.713h-35.714v410.714c0 9.862-7.995 17.857-17.857 17.857h-35.716c-9.862 0-17.857-7.995-17.857-17.857v-125h-35.714c-98.622 0-178.571-79.949-178.571-178.571s79.948-178.572 178.571-178.572h267.857c9.862 0 17.857 7.995 17.857 17.857z"/></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[4px]" @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x34_9.List"><path d="m491 134.75h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/><path d="m491 291h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/><path d="m491 447.25h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/><path d="m52.875 209.125c-25.888 0-46.875 20.987-46.875 46.875 0 25.888 20.987 46.875 46.875 46.875 25.888 0 46.875-20.987 46.875-46.875 0-25.888-20.987-46.875-46.875-46.875z"/><path d="m52.875 365.375c-25.888 0-46.875 20.987-46.875 46.875 0 25.888 20.987 46.875 46.875 46.875 25.888 0 46.875-20.987 46.875-46.875 0-25.888-20.987-46.875-46.875-46.875z"/><path d="m52.875 52.875c-25.888 0-46.875 20.987-46.875 46.875 0 25.888 20.987 46.875 46.875 46.875 25.888 0 46.875-20.987 46.875-46.875 0-25.888-20.987-46.875-46.875-46.875z"/></g></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[4px]" @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x34_8.List"><path d="m66.322 397.602 17.09-19.678c3.401-3.793 5.179-8.768 4.951-13.857v-3.232c0-7.178-3.75-11.084-11.074-11.084h-55.664c-4.315 0-7.812 3.498-7.812 7.812v15.625c0 4.315 3.498 7.812 7.812 7.812h22.295c-3.789 3.817-7.374 7.829-10.742 12.021l-5.479 6.836c-3.906 4.951-5.127 9.893-2.734 14.531l1.025 1.885c2.93 5.625 6.143 7.695 11.963 7.695h4.619c10.088 0 15.566 2.383 15.566 8.877 0 4.609-4.102 8.027-14.023 8.027-5.184-.041-10.313-1.075-15.107-3.047-6.338-3.789-11.465-3.418-15.234 3.047l-5.459 9.092c-3.633 5.986-3.115 11.445 2.568 15.566 7.529 4.58 19.902 9.219 36.133 9.219 33.359 0 47.363-22.217 47.363-43.086-.029-14.042-8.906-29.061-28.057-34.061z"/><path d="m17.807 318.5h66.318c4.315 0 7.812-3.498 7.812-7.812v-15.625c0-4.315-3.498-7.812-7.812-7.812h-37.773c3.213-10.049 47.207-18.242 47.207-55.117 0-28.379-24.414-38.633-43.428-38.633-20.859 0-33.008 9.766-39.512 18.311-4.268 5.459-2.93 10.586 2.734 15.01l8.379 6.719c5.479 4.453 10.742 2.412 15.742-2.383 2.466-2.417 5.785-3.764 9.238-3.75 3.252 0 9.062 1.523 9.062 8.545.031 12.42-49.774 21.326-49.774 67.498v3.906c0 7.237 4.961 11.143 11.807 11.143z"/><path d="m21.625 162.25h62.5c4.315 0 7.812-3.498 7.812-7.812v-15.625c0-4.315-3.498-7.812-7.812-7.812h-15.625v-85.939c0-4.315-3.498-7.812-7.812-7.812h-23.438c-2.953.005-5.651 1.675-6.973 4.316l-7.812 15.625c-1.931 3.859-.368 8.552 3.49 10.483 1.081.541 2.273.824 3.482.826h7.812v62.5h-15.624c-4.315 0-7.812 3.498-7.812 7.812v15.625c-.001 4.315 3.497 7.813 7.812 7.813z"/><path d="m491 134.75h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/><path d="m491 291h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/><path d="m491 447.25h-313.75c-8.284 0-15-6.716-15-15v-40c0-8.284 6.716-15 15-15h313.75c8.284 0 15 6.716 15 15v40c0 8.284-6.716 15-15 15z"/></g></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[4px]" @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
            <svg class="w-full h-full" id="svg6" clip-rule="evenodd" fill-rule="evenodd" height="512" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><path id="path2" d="m5.803 12 .861.574c.835.557 1.336 1.493 1.336 2.496v2.93c0 .265.105.52.293.707.187.188.442.293.707.293h1c.552 0 1 .448 1 1s-.448 1-1 1c-.376 0-.768 0-1 0-.796 0-1.559-.316-2.121-.879-.563-.562-.879-1.325-.879-2.121 0-.979 0-2.118 0-2.93 0-.334-.167-.646-.445-.832-.885-.589-2.11-1.406-2.11-1.406-.278-.185-.445-.498-.445-.832s.167-.647.445-.832c0 0 1.225-.817 2.11-1.406.278-.186.445-.498.445-.832 0-.812 0-1.951 0-2.93 0-.796.316-1.559.879-2.121.562-.563 1.325-.879 2.121-.879h1c.552 0 1 .448 1 1 0 .265-.105.52-.293.707-.187.188-.442.293-.707.293-.376 0-.768 0-1 0-.265 0-.52.105-.707.293-.188.187-.293.442-.293.707v2.93c0 1.003-.501 1.939-1.336 2.496zm12.394 0-.861-.574c-.835-.557-1.336-1.493-1.336-2.496 0-.812 0-1.951 0-2.93 0-.265-.105-.52-.293-.707-.187-.188-.442-.293-.707-.293h-1c-.552 0-1-.448-1-1v-.001c0-.265.105-.519.293-.706.187-.188.441-.293.706-.293h1.001c.796 0 1.559.316 2.121.879.563.562.879 1.325.879 2.121v2.93c0 .334.167.646.445.832.885.589 2.11 1.406 2.11 1.406.278.185.445.498.445.832s-.167.647-.445.832c0 0-1.225.817-2.11 1.406-.278.186-.445.498-.445.832v2.93c0 .796-.316 1.559-.879 2.121-.562.563-1.325.879-2.121.879h-1c-.552 0-1-.448-1-1 0-.265.105-.52.293-.707.187-.188.442-.293.707-.293h1c.265 0 .52-.105.707-.293.188-.187.293-.442.293-.707 0-.979 0-2.118 0-2.93 0-1.003.501-1.939 1.336-2.496z"/></svg>
          </button>
          <button class="w-[28px] h-[28px] p-[6px]" @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x36_6.QuoteRight"><path d="m334.125 256h78.125v62.5c0 34.473-28.027 62.5-62.5 62.5h-7.812c-12.988 0-23.438 10.449-23.438 23.438v46.875c0 12.988 10.449 23.438 23.438 23.438h7.812c86.328 0 156.25-69.922 156.25-156.25v-234.376c0-25.879-20.996-46.875-46.875-46.875h-125c-25.879 0-46.875 20.996-46.875 46.875v125c0 25.879 20.996 46.875 46.875 46.875z"/><path d="m52.875 256h78.125v62.5c0 34.473-28.027 62.5-62.5 62.5h-7.812c-12.988 0-23.438 10.449-23.438 23.438v46.875c0 12.988 10.449 23.438 23.438 23.438h7.812c86.328 0 156.25-69.922 156.25-156.25v-234.376c0-25.879-20.996-46.875-46.875-46.875h-125c-25.879 0-46.875 20.996-46.875 46.875v125c0 25.879 20.996 46.875 46.875 46.875z"/></g></svg>
          </button>
        </div>
        <editor-content :editor="editor" />
      </div>
      <div class="col-span-2 h-px bg-[#ebebeb]"></div>
      <span class="pt-[14px]">첨부파일</span>
      <div class="pr-[20px]">
        <button type="button" @click="add()" class="flex w-full items-center mb-[14px]">
          <div class="h-[45px] bg-white border border-[#9b9b9b] w-full"></div>
          <div class="whitespace-nowrap flex items-center justify-center w-[150px] text-white font-bold bg-[#9b9b9b] h-[45px]">파일열기</div>
        </button>
        <div class="text-[#a7a7a7] mb-[26px]">
          * 전체 파일의 총 용량은 50MB 이내여야 합니다. 파일은 최대 5개까지 첨부 가능합니다.
        </div>
        <div class="p-[24px] bg-[#f5f5f5] grid gap-y-[18px] relative min-h-[100px]">
          <component
            v-for="(component, index) in components"
            :key="index"
            :is="component"
            v-bind="{remove, index, loaded}"
          />
          <div v-if="uploading" class="loading absolute left-0 right-0 bottom-0 top-0 flex items-center justify-center">
            <div class="loader loader--style2 relative z-10" title="1">
              <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                  <animateTransform attributeType="xml"
                    attributeName="transform"
                    type="rotate"
                    from="0 25 25"
                    to="360 25 25"
                    dur="0.6s"
                    repeatCount="indefinite"/>
                </path>
              </svg>
            </div>
            <div class="bg-black opacity-10 absolute left-0 top-0 right-0 bottom-0"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-center gap-x-[5px] text-[16px]">
      <input type="submit" class="btn-lochmara w-[140px] py-[15px]" value="등록" name="submitpost" />
      <a href="/report" class="btn w-[140px] py-[15px]">취소</a>
    </div>
  </form>
</template>

<script>
import { markRaw } from 'vue'
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import fileUpload from './fileUpload.vue'

export default {
  name: 'Editor',
  components: {
    EditorContent,
    fileUpload
  },

  data() {
    return {
      editor: null,
      components: [],
      uploading: false,
    }
  },

  mounted() {
    this.editor = new Editor({
      extensions: [
        StarterKit,
      ],
      content: `
        <h2>
          Hi there,
        </h2>
        <p>
          this is a <em>basic</em> example of <strong>tiptap</strong>. Sure, there are all kind of basic text styles you’d probably expect from a text editor. But wait until you see the lists:
        </p>
        <ul>
          <li>
            That’s a bullet list with one …
          </li>
          <li>
            … or two list items.
          </li>
        </ul>
        <p>
          Isn’t that great? And all of that is editable. But wait, there’s more. Let’s try a code block:
        </p>
        <pre><code class="language-css">body {
  display: none;
}</code></pre>
        <p>
          I know, I know, this is impressive. It’s only the tip of the iceberg though. Give it a try and click a little bit around. Don’t forget to check the other examples too.
        </p>
        <blockquote>
          Wow, that’s amazing. Good work, boy! 👏
          <br />
          — Mom
        </blockquote>
      `,
    });
  },

  beforeUnmount() {
    this.editor.destroy()
  },

  methods: {
  	add () {
      if (this.components.length < 5) {
        this.components.push(markRaw(fileUpload));
        this.uploading = true;
      }
    },
    loaded() {
      this.uploading = false;
    },
    remove (index) {
      this.components.splice(index, 1);
    }
  },
}
</script>

<style lang="scss">
.toolbar {
  display: flex;
  padding: 6px calc(var(--container-px) / 2);
  border: 1px solid #9b9b9b;

  svg {
    width: 100%;
    height: 100%;
  }
}
/* Basic editor styles */
.ProseMirror {
  outline: none;
  border-bottom: 1px solid #9b9b9b;
  border-left: 1px solid #9b9b9b;
  border-right: 1px solid #9b9b9b;
  padding-top: calc(var(--container-px) / 2);
  padding-bottom: calc(var(--container-px) / 2);
  padding-left: calc(var(--container-px) / 2);
  padding-right: calc(var(--container-px) / 2);
  min-height: 14em;
  max-height: 100em;
  overflow-y: auto;

  > * + * {
    margin-top: 0.75em;
  }

  > *:first-child {
    margin-top: 0;
  }

  ul,
  ol {
    padding: 0 1rem;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    line-height: 1.1;
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0D0D0D;
    color: #FFF;
    font-family: 'JetBrainsMono', monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;

    code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }
  }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid rgba(#0D0D0D, 0.1);
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0D0D0D, 0.1);
    margin: 2rem 0;
  }
}
</style>