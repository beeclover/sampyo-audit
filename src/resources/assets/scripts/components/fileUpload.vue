<template>
  <div :id="'file-' + this.index">
    <div class="opacity-0 inputWrap flex items-center gap-x-[13px]">
      <input hidden type="file" :name="'file-' + this.index" accept=".png, .jpg, .jpge, .zip, .pdf, .pptx, .ppt, .xlsx, .webp">
      <div>{{ label }}</div>
      <button  @click.prevent="this.remove" aria-label="remove" class="w-[24px] h-[24px] border border-[#707070] rounded-[2px] bg-white">
        <svg class="w-full h-full fill-[#707070]" id="Layer_3" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m17.414 16 6.293-6.293a1 1 0 0 0 -1.414-1.414l-6.293 6.293-6.293-6.293a1 1 0 0 0 -1.414 1.414l6.293 6.293-6.293 6.293a1 1 0 1 0 1.414 1.414l6.293-6.293 6.293 6.293a1 1 0 0 0 1.414-1.414z"/></svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    remove: Function,
    index: Number,
    loaded: Function,
  },
  data() {
    return {
      label: null
    }
  },
  mounted () {
    const el = this.$el;
    const input = el.querySelector('input');
    document.body.onfocus = () => {
      const target = document.querySelector(`#file-${this.index}`);
      setTimeout(() => {
        const file = target.querySelector('input');
        const inputWrap = file.parentElement;

        if (file.value.length) {
          inputWrap.classList.remove('opacity-0');
          file.files[0] && (this.label = file.files[0].name);
          this.loaded();
        } else {
          this.loaded();
          target.remove();
        }
      }, 1000);
      // reset
      document.body.onfocus = null;
    }
    input.click();
  },
}
</script>